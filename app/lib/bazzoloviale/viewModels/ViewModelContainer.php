<?php
namespace Bazzoloviale\viewModels;

/**
*   Class in charge of loading viewModels form different resources
*/
class ViewModelContainer
{
    protected $mappedViewModels;
    protected $loader;

    public function __construct(ViewModelsLoaderInterface $loader) {
        $this->loader = $loader;
        $this->init($loader->loadViewModels());
    }

    public function init($viewModels) {
        foreach ($viewModels as $viewModelClass) {
            $key = $this->getMethodName($viewModelClass);
            //Key is the method name, this will be managed by the __call mehod
            $this->mappedViewModels[$key] = $viewModelClass;
        }
    }

    protected function getMethodName($className) {
        $classNameWithoutNamespace = $this->getClassName($className);
        return lcfirst($classNameWithoutNamespace);
    }

    /**
    * Obtains an object class name without namespaces
    */
    protected function getClassName($className) {
        if (preg_match('@\\\\([\w]+)$@', $className, $matches)) {
            $className = $matches[1];
        }
        return $className;
    }

    public function __call($method, $args) {
        if (array_key_exists($method, $this->mappedViewModels)) {
            //instance a new class, call its method
            $className = $this->mappedViewModels[$method];
            $classInstance = new $className;
            if(method_exists($classInstance, $method)) {
                return call_user_func_array(array($classInstance, $method), $args);
            }
        }
    }
}