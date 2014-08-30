<?php
namespace ViewModels;
use \Bazzoloviale\viewModels\ViewModelBase;
/*
*   Class in charge of loading viewModels form different resources
*/
class TestViewModel extends ViewModelBase
{
    public function render() {
        return \View::make('pages.home');
    }
}