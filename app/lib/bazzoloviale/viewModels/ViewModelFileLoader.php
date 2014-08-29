<?php
namespace Bazzoloviale\viewModels;
use  \Symfony\Component\Finder\SplFileInfo;

/**
*   Class in charge of loading viewModels from different resources
*/
class ViewModelFileLoader implements ViewModelsLoaderInterface
{
    const EXP_REG_NAMESPACE = '/namespace\s+((?:\\\\?\w+)+)\\\\?;$/';
    const EXP_REG_NAME = '/(\w+)\.php$/';

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
        preg_match(self::EXP_REG_NAME, $fileInfo->getFileName(), $matches);
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
                preg_match(self::EXP_REG_NAMESPACE, trim($line), $matches);
                $namespace = $matches[1];
                $flag = false;
            }
        }
        fclose($file);
        return $namespace ? $namespace : '';
    }
}