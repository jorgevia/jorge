<?php
/**
 * Created by PhpStorm.
 * User: JorgeLuis
 * Date: 9/5/2014
 * Time: 10:43 PM
 */
$I = new AcceptanceTester($scenario);
$I->wantTo('Check the home page for a welcome message');
$I->amOnPage('/');
$I->seeResponseCodeIs(200);
$I->see('Welcome to BaTango');
