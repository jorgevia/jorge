<?php
namespace ViewModels;
use \Bazzoloviale\viewModels\ViewModel;
/*
*   Class in charge of loading viewModels form different resources
*/
class TestViewModel implements ViewModel
{
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function render() {
        return "El view Model se ha creado satisfactoriamente, gracias {$this->name}";
    }
}