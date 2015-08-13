<?php

namespace BetterReflectionTest\Reflection\Adapter;

use ReflectionClass as CoreReflectionClass;
use BetterReflection\Reflection\Adapter\ReflectionClass as ReflectionClassAdapter;

class ReflectionClassTest extends \PHPUnit_Framework_TestCase
{
    public function coreReflectionMethodNamesProvider()
    {
        $methods = get_class_methods(CoreReflectionClass::class);
        $c = array_combine($methods, array_map(function ($i) { return [$i]; }, $methods));
        var_dump($c);
        return $c;
    }

    /**
     * @dataProvider coreReflectionMethodNamesProvider
     */
    public function testCoreReflectionMethods($methodName)
    {
        $reflectionClassAdapterReflection = new CoreReflectionClass(ReflectionClassAdapter::class);
        $this->assertTrue($reflectionClassAdapterReflection->hasMethod($methodName));
    }
}
