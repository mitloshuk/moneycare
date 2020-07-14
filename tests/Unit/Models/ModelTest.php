<?php

namespace MoneyCare\Tests\Unit\Models;

use Codeception\PHPUnit\TestCase;
use MoneyCare\Exceptions\ModelRequiredFieldException;
use MoneyCare\Models\Good;
use ReflectionClass;
use ReflectionProperty;
use ReflectionException;

/**
 * Class ModelTest
 *
 * @package MoneyCare\Tests\Unit\Models
 */
abstract class ModelTest extends TestCase
{
    /**
     * @return ?string
     */
    abstract protected function getClassForSettersTest(): ?string;

    /**
     * @return string[]
     */
    protected function getSpecificMethodsForSettersTest(): array
    {
        return [];
    }

    /**
     * @throws ReflectionException
     */
    public function testAllSettersAreExists(): void
    {
        $testModelClass = $this->getClassForSettersTest();

        if ($testModelClass !== null) {
            $model = (new $testModelClass());
            $reflect = new ReflectionClass($model);
            $props = $reflect->getProperties(ReflectionProperty::IS_PROTECTED);

            $except = $this->getSpecificMethodsForSettersTest();

            foreach ($props as $prop) {
                if (array_key_exists($prop->getName(), $except)) {
                    $method = $except[$prop->getName()];
                } else {
                    $method = 'set' . ucfirst($prop->getName());
                }

                self::assertTrue(method_exists($model, $method));
            }
        } else {
            self::assertNull($testModelClass);
        }


    }

    /**
     * @return void
     * @throws ModelRequiredFieldException
     */
    public function testRequirePriceField(): void
    {
        $this->expectException(ModelRequiredFieldException::class);

        (new Good())->getData();
    }

    /**
     * @return void
     * @throws ModelRequiredFieldException
     */
    public function testValidGood(): void
    {
        $data = (new Good())->setPrice(100)->setTitle('test')->getData();

        self::assertEquals(100, $data['price']);
        self::assertEquals('test', $data['title']);
    }
}