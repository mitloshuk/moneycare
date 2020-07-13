<?php

namespace MoneyCare\Tests\Unit\Models;

use Codeception\PHPUnit\TestCase;
use MoneyCare\Exceptions\ModelRequiredFieldException;
use MoneyCare\Models\Good;
use MoneyCare\Models\OrderCreation;
use MoneyCare\Models\Passport;
use ReflectionClass;
use ReflectionProperty;
use ReflectionException;

/**
 * Class OrderCreationTest
 *
 * @package MoneyCare\Tests\Unit\Models
 */
class OrderCreationTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testAllSettersAreExists()
    {
        $creation = (new OrderCreation());
        $reflect = new ReflectionClass($creation);
        $props = $reflect->getProperties(ReflectionProperty::IS_PROTECTED);

        $except = ['goods', 'offers', 'creditTypes', 'installmentPeriods'];

        foreach ($props as $prop) {
            if (in_array($prop->getName(), $except)) {
                continue;
            }

            $method = 'set' . ucfirst($prop->getName());

            self::assertTrue(method_exists($creation, $method));
        }
    }

    public function testRequirePointIdField()
    {
        $this->expectException(ModelRequiredFieldException::class);

        $good = (new Good())->setPrice(10000);

        (new OrderCreation())->addGood($good)->getData();
    }

    public function testRequireGoodsField()
    {
        $this->expectException(ModelRequiredFieldException::class);

        (new OrderCreation())->setPointId(123)->getData();
    }

    public function testRequirePassportFieldWhenForceScoring()
    {
        $this->expectException(ModelRequiredFieldException::class);

        $good = (new Good())->setPrice(10000);
        $model = (new OrderCreation())->addGood($good)
            ->setPointId(123)
            ->setFirstName('test')
            ->setSecondName('test')
            ->setLastName('test')
            ->setBirthDay(new \DateTime('now'))
            ->setForceScore(true)
            ->getData();
    }

    public function testRequireFirstNameFieldWhenForceScoring()
    {
        $this->expectException(ModelRequiredFieldException::class);

        $passport = (new Passport())->setNumber(123)
            ->setSeries(123)
            ->setIssueDate((new \DateTime('now')));

        $good = (new Good())->setPrice(10000);
        $model = (new OrderCreation())->addGood($good)
            ->setPointId(123)
            ->setPassport($passport)
            ->setSecondName('test')
            ->setLastName('test')
            ->setBirthDay(new \DateTime('now'))
            ->setForceScore(true)
            ->getData();
    }

    public function testRequireSecondNameFieldWhenForceScoring()
    {
        $this->expectException(ModelRequiredFieldException::class);

        $passport = (new Passport())->setNumber(123)
            ->setSeries(123)
            ->setIssueDate((new \DateTime('now')));

        $good = (new Good())->setPrice(10000);
        $model = (new OrderCreation())->addGood($good)
            ->setPointId(123)
            ->setPassport($passport)
            ->setFirstName('test')
            ->setLastName('test')
            ->setBirthDay(new \DateTime('now'))
            ->setForceScore(true)
            ->getData();
    }

    public function testRequireLastNameFieldWhenForceScoring()
    {
        $this->expectException(ModelRequiredFieldException::class);

        $passport = (new Passport())->setNumber(123)
            ->setSeries(123)
            ->setIssueDate((new \DateTime('now')));

        $good = (new Good())->setPrice(10000);
        $model = (new OrderCreation())->addGood($good)
            ->setPointId(123)
            ->setFirstName('test')
            ->setSecondName('test')
            ->setBirthDay(new \DateTime('now'))
            ->setForceScore(true)
            ->getData();
    }

    public function testRequireBirthDayFieldWhenForceScoring()
    {
        $this->expectException(ModelRequiredFieldException::class);

        $passport = (new Passport())->setNumber(123)
            ->setSeries(123)
            ->setIssueDate((new \DateTime('now')));

        $good = (new Good())->setPrice(10000);
        $model = (new OrderCreation())->addGood($good)
            ->setPointId(123)
            ->setFirstName('test')
            ->setSecondName('test')
            ->setLastName('test')
            ->setForceScore(true)
            ->getData();
    }
}