<?php
/**
 * Created by PhpStorm.
 * User: JorgeLuis
 * Date: 8/29/2014
 * Time: 11:13 PM
 */

namespace Bazzoloviale\viewModels;


class ViewModelBase implements ViewModelInterface {
    //Allows to use views models inside a view model
    use ViewModelsTrait;
} 