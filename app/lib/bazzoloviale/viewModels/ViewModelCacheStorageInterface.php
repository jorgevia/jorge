<?php
/**
 * Created by PhpStorm.
 * User: JorgeLuis
 * Date: 9/3/2014
 * Time: 10:20 PM
 */

namespace Bazzoloviale\viewModels;


interface ViewModelCacheStorageInterface {
    public function load();
    public function store(array $viewModels);
} 