<?php
namespace Bazzoloviale\viewModels;
use  \Symfony\Component\Finder\SplFileInfo;
use Illuminate\Filesystem\Filesystem;

/**
*   Class in charge of loading viewModels from different resources
*/
class ViewModelFileLoader implements ViewModelsLoaderInterface
{
    const EXP_REG_NAMESPACE = '/namespace\s+((?:\\\\?\w+)+)\\\\?;$/';
    const EXP_REG_NAME = '/(\w+)\.php$/';

    protected $fileSystem;

    public function __construct(Filesystem $fileSystem) {
        $this->fileSystem = $fileSystem;
    }
    /**
     * Load View Models from a directory
     * @return array
     */
    public function loadViewModels()
    {
        $viewModelClasses = array();
        $directory = $this->_getDirectory();
        if ($this->fileSystem->isDirectory($directory)) {
            $files = $this->fileSystem->allFiles($directory);
            foreach($files as $fileInfo) {
                $viewModelClasses[] = $this->_getClassName($fileInfo);
            }
            return $viewModelClasses;
        } else {
            //@TODO Handle exception not a directory
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