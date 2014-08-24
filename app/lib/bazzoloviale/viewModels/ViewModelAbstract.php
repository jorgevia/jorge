<?php
namespace Bazzoloviale\viewModels;

/**
*   Class in charge of loading viewModels form different resources
*/
abstract class ViewModelAbstract
{
    protected $className;

    public function __construct() {
        $this->init();
    }

    protected function init() {
        $methodName = lcfirst($this->getClassName());
        $this->$methodName();
    }
}