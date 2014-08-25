<?php
namespace Bazzoloviale\viewModels;

/**
*   Class in charge of loading viewModels form different resources
*/
class ViewModelFileLoader implements ViewModelsLoaderInterface
{
    protected $directory;
    protected $ViewModelsClasses;

    public function __construct() {
        $this->directory = $this->getDirectory();
    }

    public function loadViewModels()
    {
        if (\File::isDirectory($this->directory)) {
            $files = \File::allFiles($this->directory);
            foreach($files as $fileInfo) {
                $this->ViewModelsClasses[] = $this->getClassName($fileInfo);
            }
            return $this->ViewModelsClasses;

        } else {
            //Handle exception directory
        }
    }

    public function getDirectory() {
        return app_path() . \Config::get('viewmodel.dir');
    }

    public function getClassName(\Symfony\Component\Finder\SplFileInfo $fileInfo) {
        $namespace = \Config::get('viewmodel.namespace');
        $fileName = preg_match("/(\w+)\.php$/", $fileInfo->getFileName(), $matches);
        return $namespace . $matches[1];
    }
}