<?php
namespace Bazzoloviale\viewModels;

/**
*   Class in charge of loading viewModels form different resources
*/
class ViewModelsFactoryInterface
{
    public function instanciateViewModels(ViewModelsLoaderInterface $loader);
}