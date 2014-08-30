<?php
/**
 * Created by PhpStorm.
 * User: JorgeLuis
 * Date: 8/30/2014
 * Time: 2:26 PM
 */

namespace Bazzoloviale\viewModels;

trait ViewModelsTrait {

    /**
     * @param $name
     * @return ViewModelContainer
     */
    public function __get($name)
    {
        if (strcmp($name, 'viewModel') === 0) {
            return $this->loadViewModelContainer();
        }
    }

    /**
     * @return mixed
     */
    public function loadViewModelContainer() {
        return \App::make('Bazzoloviale\viewModels\ViewModelContainer');
    }
}