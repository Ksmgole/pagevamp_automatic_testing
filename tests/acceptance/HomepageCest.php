<?php

use \Codeception\Util\Locator;

class HomepageCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }


    public function test_Logo(AcceptanceTester $I)
    {
        $I->amOnPage('/');

        /*Pagevamp Logo */
        $I->click(['class' => 'pv-logo']);
        $I->amOnPage('/pricing');
        $I->click(['class' => 'pv-logo']);
        $I->click(['class' => 'pv-footer-logo']);

        /*Akky Logo*/
        $I->amOnPage('/?desh=akky');
        $I->click(['class' => 'pv-logo--sponsr']);
        $I->switchToNextTab();
        $I->seeInTitle('Akky :: Inicio minisitio Pagevamp');
    }

    public function test_ItalianBanner(AcceptanceTester $I)
    {
        $I->amOnPage('/?desh=it');
        $I->see('Questo sito utilizza cookie per il funzionamento e la migliore gestione del sito');

    }

    public function test_HowItWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('How it works');
        $I->wait(2);
        $I->click('Watch it in action');
    }


    public function test_Pricing(AcceptanceTester $I)
    {

        $I->amOnPage('/');
        $I->click('Pricing');
        $I->seeCurrentUrlEquals('/np/pricing');
        $I->see('Every plan starts off with a 14-day free trial.');
        $I->see('$ 12');
        $I->see('$ 15');
        $I->click('I have a domain name already. Do I need to pay extra to connect it to my Pagevamp website?');

            $I->wait(5);
            $I->click('connect it');
            $I->switchToNextTab();
            $I->seeCurrentUrlEquals('/hc/en-us/articles/204463719-Connecting-a-Domain-Purchased-Elsewhere');
            $I->closeTab();

        $I->click('I want to register my own country\'s domain. Can I do it through Pagevamp?');

            $I->wait(5);
            $I->click('instructions');
            $I->switchToNextTab();
            $I->seeCurrentUrlEquals('/hc/en-us/articles/204463719-Connecting-a-Domain-Purchased-Elsewhere');
            $I->closeTab();

        $I->click('How do I signup?');
        $I->wait(2);
        $I->click('.btn--green');
        $I->wait(5);
        $I->see('Your website in seconds','.modal-body');
    }

    public function test_Partners(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Partners');
        $I->seeInTitle('Pagevamp Website Reseller Program | Web Design Tools');
        $I->amOnPage('/?desh=akky');
        $I->click('Partners');
        $I->switchToNextTab();
        $I->wait(5);
        $I->seeCurrentUrlEquals('/akky/partners');
        $I->closeTab();

    }

    public function test_Features(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Features');
        $I->scrollTo('footer');
        $I->click('Features', '#footer');

    }

    public function test_GetPagevampButton(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Get Pagevamp');


    }
    public function test_LanguageDropdown(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('a.dropdown-toggle');
        $I->click('Spanish');
        $I->see ('Obtenga más clientes con un hermoso sitio web. Déjanos construirle uno en segundos.');

    }
    public function test_StartForFree(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->scrollTo(['css' => '.pv-cta']);
        $I->click('Start for Free');
    }
    public function test_GetFacebook(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->scrollTo(['css' => '.pv-section']);
        $I->click('Get Facebook');
        $I->seeCurrentUrlEquals('/np/facebook-page-creation-service?lang=EN');

    }
    public function test_DemoSites(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->scrollTo(['css' =>'.pv-section--sec']);
        $I->wait(5);
        $I->click('View Site');
    }

}




