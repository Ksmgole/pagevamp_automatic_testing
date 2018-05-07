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


    public function test_PagevampLogo(AcceptanceTester $I)
    {

        $I->amOnPage('/');
        $I->click(['class' => 'pv-logo']);
        $I->amOnPage('/pricing');
        $I->click(['class' => 'pv-logo']);
        $I->click(['class' => 'pv-footer-logo']);

    }

    public function test_HowItWorks(AcceptanceTester $I)
    {

        $I->amOnPage('/');
        $I->click('How it works');
        $I->click(['class' =>'link']);
    }


    public function test_Pricing(AcceptanceTester $I)
    {

        $I->amOnPage('/');
        $I->click('Pricing');
        $I->click('I have a domain name already. Do I need to pay extra to connect it to my Pagevamp website?');
        $I->wait(5);
        $I->click('connect it');
        $I->switchToPreviousTab(2);
        $I->click('instructions');
        $I->switchToPreviousTab(2);
        $I->click('I want to register my own country\'s domain. Can I do it through Pagevamp?');
        $I->click('Do I need a separate hosting account to use Pagevamp?');
        $I->click('How do I signup?');
        $I->click('Get Pagevamp');
    }

    public function test_Partners(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Partners');
        $I->seeInTitle('Pagevamp Website Reseller Program | Web Design Tools');
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
        $I->scrollTo('pv-banner')
        $I->click('Start for Free','.pv-continue');
        $I->wait(5);

    }


}




