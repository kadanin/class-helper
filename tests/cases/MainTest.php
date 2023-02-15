<?php

namespace tests\cases;

use Kadanin\ClassHelper\ClassHelper;
use PHPUnit\Framework\TestCase;
use tests\classes\TestAnother;
use tests\classes\TestClass;
use tests\classes\TestInterface;
use tests\classes\TestSubClass;

class MainTest extends TestCase
{
    public function testIsClassName(): void
    {
        static::assertTrue(ClassHelper::isClassName(TestClass::class));
        static::assertFalse(ClassHelper::isClassName('ass we can'));
        static::assertTrue(ClassHelper::isClassName(null, true));
        static::assertFalse(ClassHelper::isClassName(null));
    }

    public function testIsSubclassOf(): void
    {
        static::assertTrue(ClassHelper::isSubclassOf(new TestClass(), new TestClass()));
        static::assertTrue(ClassHelper::isSubclassOf(new TestClass(), TestClass::class));
        static::assertTrue(ClassHelper::isSubclassOf(TestClass::class, new TestClass()));
        static::assertTrue(ClassHelper::isSubclassOf(TestClass::class, TestClass::class));

        static::assertTrue(ClassHelper::isSubclassOf(new TestSubClass(), new TestClass()));
        static::assertTrue(ClassHelper::isSubclassOf(new TestSubClass(), TestClass::class));
        static::assertTrue(ClassHelper::isSubclassOf(TestSubClass::class, new TestClass()));
        static::assertTrue(ClassHelper::isSubclassOf(TestSubClass::class, TestClass::class));

        static::assertTrue(ClassHelper::isSubclassOf(new TestSubClass(), TestInterface::class));
        static::assertTrue(ClassHelper::isSubclassOf(TestSubClass::class, TestInterface::class));

        static::assertFalse(ClassHelper::isSubclassOf(new TestClass(), TestInterface::class));
        static::assertFalse(ClassHelper::isSubclassOf(TestClass::class, TestInterface::class));

        static::assertFalse(ClassHelper::isSubclassOf(new TestClass(), new TestSubClass()));
        static::assertFalse(ClassHelper::isSubclassOf(new TestClass(), TestSubClass::class));
        static::assertFalse(ClassHelper::isSubclassOf(TestClass::class, new TestSubClass()));
        static::assertFalse(ClassHelper::isSubclassOf(TestClass::class, TestSubClass::class));

        static::assertFalse(ClassHelper::isSubclassOf(new TestClass(), new TestAnother()));
        static::assertFalse(ClassHelper::isSubclassOf(new TestClass(), TestAnother::class));
        static::assertFalse(ClassHelper::isSubclassOf(TestClass::class, new TestAnother()));
        static::assertFalse(ClassHelper::isSubclassOf(TestClass::class, TestAnother::class));

        static::assertTrue(ClassHelper::isSubclassOf(null, TestClass::class, true));
        static::assertFalse(ClassHelper::isSubclassOf(null, TestClass::class));
    }
}