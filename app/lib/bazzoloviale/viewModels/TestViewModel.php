<?php
namespace Bazzoloviale\viewModels;

/**
*   Class in charge of loading viewModels form different resources
*/
class TestViewModel
{
    public function testViewModel($name) {
        return "El view Model se ha creado satisfactoriamente, gracias $name";
    }
}