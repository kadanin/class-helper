<?php

namespace Kadanin\ClassHelper;

/**
 * Help to work with classes and subclasses types.
 * Union `of is_a()` and `is_subclass_of()`.
 * Also detects if string is a class name.
 */
class ClassHelper
{
    /**
     * Union `of is_a()` and `is_subclass_of()`.
     *
     * @param object|string|null $object            Object or string to tests
     * @param object|string      $className         Class name or object, to tests against
     * @param bool               $nullReturnsResult Behavior if $object is null
     *
     * @return bool
     */
    public static function isSubclassOf($object, $className, bool $nullReturnsResult = false): bool
    {
        if (null === $object) {
            return $nullReturnsResult;
        }

        if (\is_object($className)) {
            $className = \get_class($className);
        }

        return \is_a($object, $className, true) || \is_subclass_of($object, $className);
    }

    /**
     * Detects if string is a class name
     *
     * @param string|null $className         String to test
     * @param bool        $nullReturnsResult Behavior if $className empty
     *
     * @return bool
     */
    public static function isClassName(string $className = null, bool $nullReturnsResult = false): bool
    {
        if (null === $className) {
            return $nullReturnsResult;
        }

        return \class_exists($className) || \interface_exists($className);
    }
}