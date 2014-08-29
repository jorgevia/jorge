<?php
namespace Bazzoloviale\viewModels;

/**
*   Class in charge of loading viewModels form different resources
*/
class ViewModelContainer
{
    const REG_EXP_CLASS_NAME = '/(\w+)\\\\?$/';
    protected $viewModelsMap = array();
    protected $loader;

    public function __construct(ViewModelsLoaderInterface $loader) {
        $this->loader = $loader;
        $this->init($loader->loadViewModels());
    }

    protected function init(array $viewModels) {
        foreach ($viewModels as $viewModel) {
            $this->viewModelsMap[$this->getClassNameWithoutNamespace($viewModel)] = $viewModel;
        }
    }

    public function getClassNameWithoutNamespace($className) {
        preg_match(self::REG_EXP_CLASS_NAME, $className, $matches);
        return $matches[1];
    }

    /**
     * @param $method
     * @param $args
     * @return String HTML
     */
    public function __call($method, $args) {
        $viewModelClass = ucfirst($method);
        if (array_key_exists($viewModelClass, $this->viewModelsMap)) {
            //instance a new class, call its method
            $classReflection = new \ReflectionClass($this->viewModelsMap[$viewModelClass]);
            $classInstance = $classReflection->newInstanceArgs($args);
            return $classInstance->render();
        }
    }
}