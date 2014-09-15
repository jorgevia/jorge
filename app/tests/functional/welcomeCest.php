<?php
use \FunctionalTester;

class welcomeCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function testing(FunctionalTester $I)
    {
        $I->wantTo('Check database data');
        $I->seeInDatabase('entities', array(
            'first_name' => 'jorge',
            'middle_name' => 'luis',
            'last_name' => 'viale'
        ));
    }



}