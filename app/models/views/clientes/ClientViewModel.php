<?php
namespace ViewModels\clientes;
use \Bazzoloviale\viewModels\ViewModelBase;
/**
*   Class in charge of loading viewModels form different resources
*/
class ClientViewModel extends ViewModelBase
{
    public function render() {
        return "Hola clientes";
    }
}