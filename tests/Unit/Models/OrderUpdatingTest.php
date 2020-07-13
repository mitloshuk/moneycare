<?php

namespace MoneyCare\Tests\Unit\Models;

use Codeception\PHPUnit\TestCase;
use MoneyCare\Models\OrderUpdating;
use ReflectionClass;
use ReflectionProperty;

class OrderUpdatingTest extends TestCase
{
    public function testAllSettersAreExists()
    {
        $creation = (new OrderUpdating());
        $reflect = new ReflectionClass($creation);
        $props = $reflect->getProperties(ReflectionProperty::IS_PROTECTED);

        $except = ['goods'];

        foreach ($props as $prop) {
            if (in_array($prop->getName(), $except)) {
                continue;
            }

            $method = 'set' . ucfirst($prop->getName());

            self::assertTrue(method_exists($creation, $method));
        }
    }
}