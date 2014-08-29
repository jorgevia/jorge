<?php
namespace ViewModels\clientes;
use \Bazzoloviale\viewModels\ViewModel;
/**
*   Class in charge of loading viewModels form different resources
*/
class ClientViewModel implements ViewModel
{
    public function render() {
        return "<h1>Hola clientes</h1>";
    }
}