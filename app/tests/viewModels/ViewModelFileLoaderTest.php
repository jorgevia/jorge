<?php
/**
 * Created by PhpStorm.
 * User: JorgeLuis
 * Date: 8/31/2014
 * Time: 6:44 PM
 */
use \Mockery as Mockery;
class ViewModelFileLoaderTest extends TestCase {

    public function testLoadViewModels() {
        $directoryMock = 'directory';

        $viewModelsFilesMock = array(
            mockery::mock('Symfony\Component\Finder\SplFileInfo'),
            mockery::mock('Symfony\Component\Finder\SplFileInfo')
        );

        $fileSystemMock = mockery::mock('Illuminate\Filesystem\Filesystem');
        $fileSystemMock->shouldReceive('isDirectory')->times(1)->with($directoryMock)->andReturn(true);
        $fileSystemMock->shouldReceive('allFiles')->times(1)->with($directoryMock)->andReturn($viewModelsFilesMock);

        $viewModelLoaderMock = $this->getMockBuilder('Bazzoloviale\viewModels\ViewModelFileLoader')
            ->disableOriginalConstructor()
            ->setMethods(array('_getClassName', '_getDirectory'))
            ->getMock();
        $viewModelLoaderMock->expects($this->exactly(2))
            ->method('_getClassName')
            ->will($this->onConsecutiveCalls('namespace/fileOne', 'namespace/fileTwo'));
        $viewModelLoaderMock->expects($this->once())
            ->method('_getDirectory')
            ->will($this->returnValue($directoryMock));

        $this->_setPrivateProperty($viewModelLoaderMock, 'fileSystem', $fileSystemMock, 'Bazzoloviale\viewModels\ViewModelFileLoader');

        $actual = $viewModelLoaderMock->loadViewModels();

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
 