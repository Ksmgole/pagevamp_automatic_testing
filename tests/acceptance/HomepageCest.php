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


    public function test_logo_click_redirects_to_homepage(AcceptanceTester $I)
    {
        $I->amOnPage('/');

        $I->click(['class' => 'pv-logo']);
        $I->amOnPage('/pricing');
        $I->click(['class' => 'pv-logo']);
        $I->click(['class' => 'pv-footer-logo']);

        $I->amOnPage('/?desh=akky');
        $I->click(['class' => 'pv-logo--sponsr']);
        $I->switchToNextTab();
        $I->seeInTitle('Akky :: Inicio minisitio Pagevamp');
    }


    public function test_italian_policy_links_open_italian_cookie_policy_page(AcceptanceTester $I)
    {
        $I->amOnPage('/?desh=it');
        $I->scrollTo('footer');
        $I->click('//a[@href="https://www.pagevamp.com/it/cookie-policy"]');
        $I->amOnUrl('https://www.pagevamp.com/it/cookie-policy');


        $I->amOnPage('/?desh=it');
        $I->see('Questo sito utilizza cookie per il funzionamento e la migliore gestione del sito');
        $I->click('Cookie Policy');
        $I->wait(5);
        $I->amOnUrl('https://www.pagevamp.com/it/cookie-policy');

        $I->amOnPage('/?desh=it');
        $I->click('Accetto');
    }


    public function test_scroll_to_how_it_works_and_youtube_video_link(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('#how-it-works-link');
        $I->wait(2);
        $I->click('//a[@data-target="#how-it-works-video"]');
        $I->wait(5);
        $I->click('#how-it-works-yt-video');

        $I->amOnPage('/?desh=it');
        $I->scrollTo(['css'=>'.pv-how-it-works']);
        $I->dontSee('Watch it in action');
    }


    public function test_prices_and_links_on_pricing_page(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('.navbar-right a[href="https://www.pagevamp.com/np/pricing"]');

        $I->scrollTo('footer');
        $I->click('.pv-footer-list a[href="https://www.pagevamp.com/np/pricing"]');

        $I->amOnPage('/');
        $I->scrollTo('.pv-pricing');
        $I->see('$ 12');
        $I->see('$ 15');
        $I->click('.pv-pricing a[href="https://www.pagevamp.com/np/pricing"]');

        $I->see('Every plan starts off with a 14-day free trial.');
        $I->see('$ 12');
        $I->see('$ 15');
        $I->click('//a[@href="#ques-2"]');
        $I->wait(2);
        $I->click('//a[@href="https://pagevamp.zendesk.com/hc/en-us/articles/204463719-Connecting-a-Domain-Purchased-Elsewhere"]');
        $I->wait(3);
        $I->click('//a[@href="#ques-3"]');
        $I->click('//a[@href="https://pagevamp.zendesk.com/hc/en-us/articles/204463719-Connecting-a-Domain-Purchased-Elsewhere"]');
        $I->wait(5);

        $I->click('//a[@href="#ques-7"]');
        $I->click('.btn--green');
        $I->wait(5);
        $I->click('#login-fb');
    }


    public function test_countrywise_partners_typeform(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('.navbar-right a[href="https://reseller.pagevamp.com"]');
        $I->seeInTitle('Pagevamp Website Reseller Program | Web Design Tools');

        $I->amOnPage('/');
        $I->scrollTo('footer');
        $I->click('.pv-footer-list a[href="https://reseller.pagevamp.com"]');

        $I->amOnPage('/');
        $I->scrollTo('.pv-partners');
        $I->click('.pv-partners a[href="https://reseller.pagevamp.com"]');


        $I->amOnPage('/?desh=akky');
        $I->scrollTo('.pv-partners');
        $I->dontSee('Become a Partner');
        $I->click('.navbar-right a[href="https://www.pagevamp.com/akky/partners"]');
        $I->switchToNextTab();
        $I->seeCurrentUrlEquals('/akky/partners');
        $I->closeTab();

        $I->amOnPage('/?desh=mx');
        $I->click('.navbar-right a[href="https://www.pagevamp.com/mx/partners"]');
        $I->switchToNextTab();
        $I->seeCurrentUrlEquals('/mx/partners');
        $I->closeTab();

        $I->amOnPage('/?desh=it');
        $I->click('.navbar-right a[href="https://www.pagevamp.com/it/partners"]');
        $I->switchToNextTab();
        $I->seeCurrentUrlEquals('/it/partners');
    }


//    public function Links_to_Features_Page(AcceptanceTester $I)
//    {
//        $I->amOnPage('/');
//        $I->click('Features');
//        $I->seeCurrentUrlEquals('/np/features');
//
//        $I->scrollTo('footer');
//        $I->click('Features', '.pv-footer-list');
//        $I->seeCurrentUrlEquals('/np/features');
//
//        $I->amOnPage('/');
//        $I->scrollTo(['css'=>'.pv-features']);
//        $I->click('View all features');
//        $I->seeCurrentUrlEquals('/np/features');
//
//        $I->amOnPage('/pricing');
//        $I->scrollTo(['css'=>'.plan-box']);
//        $I->click('more');
//        $I->seeCurrentUrlEquals('/np/features');
//
//        $I->amOnPage('/?desh=akky');
//        $I->scrollTo(['css'=>'.pv-features']);
//        $I->see('.mx');
//        $I->click('Claim your business’s web address');
//        $I->switchToNextTab();
//        $I->wait(5);
//        $I->seeInTitle('Akky :: Registra hoy tu dominio en internet');
//    }


//    public function Login(AcceptanceTester $I)
//    {
//        $I->amOnPage('/');
//        $I->click('Login');
//        $I->see('Log in with Facebook');
//
//    }
//
//
//    public function Get_pagevamp(AcceptanceTester $I)
//    {
//        $I->amOnPage('/');
//        $I->click('Get Pagevamp');
//
//    }
//
//    public function test_LanguageDropdown(AcceptanceTester $I)
//    {
//        $I->amOnPage('/');
//        $I->click('a.dropdown-toggle');
//        $I->click('Spanish');
//        $I->see('Obtenga más clientes con un hermoso sitio web. Déjanos construirle uno en segundos.');
//
//    }
//
//    public function test_StartForFree(AcceptanceTester $I)
//    {
//        $I->amOnPage('/');
//        $I->scrollTo(['css' => '.pv-cta']);
//        $I->click('Start for Free');
//    }
//
//    public function test_GetFacebook(AcceptanceTester $I)
//    {
//        $I->amOnPage('/');
//        $I->scrollTo(['css' => '.pv-section']);
//        $I->click('Get Facebook');
//        $I->seeCurrentUrlEquals('/np/facebook-page-creation-service?lang=EN');
//
//    }
//
//    public function test_DemoSites(AcceptanceTester $I)
//    {
//        $I->amOnPage('/');
//        $I->scrollTo(['css' => '.pv-section--sec']);
//        $I->wait(5);
//        $I->click('View Site');
//    }

}




