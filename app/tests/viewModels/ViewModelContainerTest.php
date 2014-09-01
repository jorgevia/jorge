<?php
/**
 * Created by PhpStorm.
 * User: JorgeLuis
 * Date: 8/31/2014
 * Time: 8:51 PM
 */
use \Mockery as Mockery;
class ViewModelContainerTest extends TestCase {
    /**
     * @param $className
     * @param $expected
     * @dataProvider getClassNameWithoutNamespaceProvider
     */
    public function testGetClassNameWithoutNamespace($className, $expected) {
        $ViewModelContainerInstance = $this->getMockBuilder('\Bazzoloviale\viewModels\ViewModelContainer')
            ->disableOriginalConstructor()
            ->setMethods(null)
            ->getMock();
        $actual = $ViewModelContainerInstance->getClassNameWithoutNamespace($className);
        $this->assertEquals($expected, $actual);
    }

    public function getClassNameWithoutNamespaceProvider() {
        return array(
            array('\SpaceOne\SpaceTwo\class', 'class'),
            array('class', 'class'),
            array('\SpaceOne\SpaceTwo\SpaceThree\class\\', 'class'),
            array('\class', 'class'),
        );
    }
}
 