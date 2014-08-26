<?php
namespace Bazzoloviale\viewModels;
use  \Symfony\Component\Finder\SplFileInfo;

/**
*   Class in charge of loading viewModels from different resources
*/
class ViewModelFileLoader implements ViewModelsLoaderInterface
{
    protected $directory;
    protected $ViewModelsClasses = array();

    public function __construct() {
        $this->directory = $this->_getDirectory();
    }
    /**
     * Load View Models from a directory
     * @return array
     */
    public function loadViewModels()
    {
        if (\File::isDirectory($this->directory )) {
            $files = \File::allFiles($this->directory);
            foreach($files as $fileInfo) {
                $this->ViewModelsClasses[] = $this->_getClassName($fileInfo);
            }
            die;
            return $this->ViewModelsClasses;
        } else {
            //@TODO Handle exception
            //Create a custom Exception
        }
    }

    /**
     * Get View Models directory from Config file
     * @return string
     */
    protected function _getDirectory() {
        return app_path() . \Config::get('viewmodel.dir');
    }

    /**
     * get class name from SplFileInfo object with namespace and without extension
     * @param  \Symfony\Component\Finder\SplFileInfo $fileInfo
     * @return string
     */
    protected function _getClassName(SplFileInfo $fileInfo) {
        $namespace = $this->_getNamespace($fileInfo);
        preg_match("/(\w+)\.php$/", $fileInfo->getFileName(), $matches);
        var_dump($namespace . '\\' . $matches[1]);
        return $namespace . '\\' . $matches[1];
    }

    /**
     * Get namespace from a file
     * @param SplFileInfo $fileInfo
     * @return string
     */
    protected function _getNamespace(SplFileInfo $fileInfo) {
        $file = fopen($fileInfo->getPathname(), 'r');
        $flag = true;
        while (!feof($file) && $flag)
        {
            $line = fgets($file);
            if (stripos($line, 'namespace') !== false) {
                $namespace = preg_replace('/namespace\ +([\w\\]+);/i', '$1', $line);
                $flag = false;
            }
        }
        fclose($file);
        return $namespace ? trim($namespace) : '';
    }
}