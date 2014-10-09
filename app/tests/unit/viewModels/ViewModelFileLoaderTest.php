<?php
/**
 * Created by PhpStorm.
 * User: JorgeLuis
 * Date: 8/31/2014
 * Time: 6:44 PM
 */
use \Mockery as Mockery;
class ViewModelFileLoaderTest extends TestCase {

    protected function tearDown()
    {
        mockery::close();
    }

    public function testLoadViewModelsSavedOnSession() {
        $viewModelsarray = array('namespace/fileOne', 'namespace/fileTwo');
        $sessionStoreMock = mockery::mock('Bazzoloviale\viewModels\ViewModelSessionStorage');
        $sessionStoreMock->shouldReceive('load')->times(1)->andReturn($viewModelsarray);

        $viewModelLoaderMock = mockery::mock('Bazzoloviale\viewModels\ViewModelFileLoader')->makePartial()->shouldAllowMockingProtectedMethods();
        $viewModelLoaderMock->shouldReceive('loadViewModelsFromDirectory')->times(0)->andReturn($viewModelsarray);

        $this->_setPrivateProperty($viewModelLoaderMock, 'sessionStorage', $sessionStoreMock, 'Bazzoloviale\viewModels\ViewModelFileLoader');

        $actual = $viewModelLoaderMock->loadViewModels();
        $this->assertEquals($actual, $viewModelsarray);
    }

    public function testLoadViewModelsNotSavedOnSession() {
        $viewModelsarray = array('namespace/fileOne', 'namespace/fileTwo');
        $sessionStoreMock = mockery::mock('Bazzoloviale\viewModels\ViewModelSessionStorage');
        $sessionStoreMock->shouldReceive('load')->times(1)->andReturn(null);

        $viewModelLoaderMock = mockery::mock('Bazzoloviale\viewModels\ViewModelFileLoader')->makePartial()->shouldAllowMockingProtectedMethods();
        $viewModelLoaderMock->shouldReceive('loadViewModelsFromDirectory')->times(1)->andReturn($viewModelsarray);

        $this->_setPrivateProperty($viewModelLoaderMock, 'sessionStorage', $sessionStoreMock, 'Bazzoloviale\viewModels\ViewModelFileLoader');

        $actual = $viewModelLoaderMock->loadViewModels();
        $this->assertEquals($actual, $viewModelsarray);
    }

    public function testLoadViewModelsFromDirectory() {
        $directoryMock = 'directory';

        $viewModelsFilesMock = array(
            mockery::mock('Symfony\Component\Finder\SplFileInfo'),
            mockery::mock('Symfony\Component\Finder\SplFileInfo')
        );

        $fileSystemMock = mockery::mock('Illuminate\Filesystem\Filesystem');
        $fileSystemMock->shouldReceive('isDirectory')->times(1)->with($directoryMock)->andReturn(true);
        $fileSystemMock->shouldReceive('allFiles')->times(1)->with($directoryMock)->andReturn($viewModelsFilesMock);

        $sessionStoreMock = mockery::mock('Bazzoloviale\viewModels\ViewModelSessionStorage');
        $sessionStoreMock->shouldReceive('store')->times(1)->with(array('namespace/fileOne', 'namespace/fileTwo'));

        //Doesn't call constructor and allows to mock protected methods
        $viewModelLoaderMock = mockery::mock('Bazzoloviale\viewModels\ViewModelFileLoader')->makePartial()->shouldAllowMockingProtectedMethods();
        $viewModelLoaderMock->shouldReceive('_getDirectory')->times(1)->andReturn($directoryMock);
        $viewModelLoaderMock->shouldReceive('_getClassName')->times(1)->andReturn('namespace/fileOne');
        $viewModelLoaderMock->shouldReceive('_getClassName')->times(1)->andReturn('namespace/fileTwo');

        $this->_setPrivateProperty($viewModelLoaderMock, 'fileSystem', $fileSystemMock, 'Bazzoloviale\viewModels\ViewModelFileLoader');
        $this->_setPrivateProperty($viewModelLoaderMock, 'sessionStorage', $sessionStoreMock, 'Bazzoloviale\viewModels\ViewModelFileLoader');

        $actual = $viewModelLoaderMock->loadViewModelsFromDirectory();
        //Assertions
        $this->assertEquals($actual, array('namespace/fileOne', 'namespace/fileTwo'));
    }

    /**
     * Invoke a protected method named $method from $instance object,
     * with an optional arguments set.
     *
     * @param  mixed  $instance The instance to invoke the method from.
     * @param  string $method   The name of the protected/private method.
     * @param  array  $args     An optional array of arguments for the method.
     *
     * @return mixed The return value for the method.
     */
    protected function _invokeProtectedMethod($instance, $method, $args = array())
    {
        $method = new ReflectionMethod($instance, $method);
        $method->setAccessible(true);
        return $method->invokeArgs($instance, $args);
    }


    protected function _setPrivateProperty($mock, $property, $value, $class)
    {
        $reflectionClass = new ReflectionClass($class);
        $mockProperty = $reflectionClass->getProperty($property);
        $mockProperty->setAccessible(true);
        $mockProperty->setValue($mock, $value);
    }
}
 