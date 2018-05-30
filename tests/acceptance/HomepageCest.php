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
        $I->closeTab();
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
        $I->dontSee('Become a Partner');

        $I->amOnPage('/?desh=mx');
        $I->click('.navbar-right a[href="https://www.pagevamp.com/mx/partners"]');
        $I->switchToNextTab();
        $I->seeCurrentUrlEquals('/mx/partners');

        $I->amOnPage('/?desh=it');
        $I->click('.navbar-right a[href="https://www.pagevamp.com/it/partners"]');

    }


    public function test_links_to_features_page(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('.navbar-right a[href="https://www.pagevamp.com/np/features"]');

        $I->scrollTo('footer');
        $I->click('.pv-footer-list a[href="https://www.pagevamp.com/np/features"]');

        $I->amOnPage('/');
        $I->scrollTo('.pv-features');
        $I->click('.pv-features a[href="https://www.pagevamp.com/np/features"]');
        $I->seeCurrentUrlEquals('/np/features');
        $I->scrollTo('.p-b-0');
        $I->click('.features-item  a[href="https://pvpartners.zendesk.com"]');

        $I->amOnPage('/pricing');
        $I->scrollTo('.plan-box');
        $I->click('.plan-box a[href="https://www.pagevamp.com/np/features"]');
        $I->seeCurrentUrlEquals('/np/features');

        $I->amOnPage('/?desh=akky');
        $I->scrollTo('.pv-features');
        $I->see('.mx');
        $I->click('.pv-features a[href="https://www.akky.mx/"]');

        $I->amOnPage('/features/?desh=akky');
        $I->scrollTo('.p-b-0');
        $I->see('Tel. es: +52 (81) 8864-2626');
    }


    public function test_login_modal(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('.pv-login-trigger');
        $I->wait(3);
        $I->click('.login-pv-continue');

        $I->amOnPage('/');
        $I->scrollTo('footer');
        $I->click('.pv-login-trigger');
        $I->wait(3);
        $I->click('.login-pv-continue');
    }


    public function test_get_pagevamp_modal(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('.navbar-right .pv-continue');
        $I->wait('3');
        $I->click('#login-fb');

        $I->amOnPage('/');
        $I->scrollTo('footer');
        $I->click('.pv-continue');
        $I->wait('3');
        $I->click('#login-fb');

        $I->amOnPage('/');
        $I->scrollTo('.pv-pricing');
        $I->click('.pv-continue');
        $I->wait('3');
        $I->click('#login-fb');

        $I->amOnPage('/pricing');
        $I->scrollTo('.plan-box');
        $I->click('.pv-continue');
        $I->wait('3');
        $I->click('#login-fb');

        $I->amOnPage('/pricing');
        $I->click('//a[@href="#ques-7"]');
        $I->click('.btn--green');
        $I->wait(5);
        $I->click('#login-fb');
    }

    public function test_landingpage_languages(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('.navbar-right a.dropdown-toggle');
        $I->click('Spanish');
        $I->see('Obtenga más clientes con un hermoso sitio web. Déjanos construirle uno en segundos.');

        $I->click('.navbar-right a.dropdown-toggle');
        $I->click('Indonesian');
        $I->see('Dapatkan pelanggan lebih banyak dengan website yang indah. Biarkan kami membuatkannya untuk anda dalam sekejap.');

        $I->click('.navbar-right a.dropdown-toggle');
        $I->click('Italian');
        $I->see('Ottieni più clienti con un sito web bellissimo. Fattene costruire uno da noi in pochi secondi.');

        $I->click('.navbar-right a.dropdown-toggle');
        $I->click('Vietnamese');
        $I->see('Nhận được nhiều khách hàng với một trang web đẹp. Hãy xây dựng một cho bạn trong vài giây.');

        $I->click('.navbar-right a.dropdown-toggle');
        $I->click('Thai');
        $I->see('ได้ลูกค้ามากขึ้นจากเว็บไซต์ที่สวยงาม ให้เราสร้างเว็บไซต์ให้คุณภายในไม่กี่วินาที');
    }

    public function test_start_for_free_button(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->scrollTo(['css' => '.pv-cta']);
        $I->click('.pv-continue');

        $I->amOnPage('/');
        $I->scrollTo(['css' => '.pv-try']);
        $I->click('.pv-continue');
    }

    public function test_link_to_facebook_page_create_service(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->scrollTo(['css' => '.pv-grow-business']);
        $I->wait('3');
        $I->click('//a[@href="https://www.pagevamp.com/np/facebook-page-creation-service?lang=EN"]');

        $I->amOnPage('/?desh=akky');
        $I->scrollTo(['css' => '.pv-grow-business']);
        $I->wait('3');
        $I->see('Contrate el servicio de Pagevamp de 1 hasta 5 años en');
        $I->click('//a[@href="https://www.akky.mx/"]');

    }

    public function test_demo_sites(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->scrollTo(['css' => '.pv-section--sec']);
        $I->wait(3);
        $I->click('//a[@data-url="https://jdespresso1.pagevamp.com"]');
        $I->click('.modal-header.pv-continue');
        $I->wait(10);
        $I->switchToIFrame('modal-iframe-url');

        $I->amOnPage('/');
        $I->scrollTo(['css' => '.pv-section--sec']);
        $I->wait(3);
        $I->click('//a[@data-url="https://glamourbylr1.pagevamp.com"]');

        $I->amOnPage('/');
        $I->scrollTo(['css' => '.pv-section--sec']);
        $I->wait(3);
        $I->click('//a[@data-url="https://meetsocialgrill1.pagevamp.com"]');
    }

    public function test_testimonials_slider(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->scrollTo(['css' => '.pv-testimonials']);
        $I->wait(3);
        $I->click('.owl-prev');
        $I->click('.owl-next');
    }

}




