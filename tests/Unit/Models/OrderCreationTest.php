<?php

namespace MoneyCare\Tests\Unit\Models;

use MoneyCare\Exceptions\ModelRequiredFieldException;
use MoneyCare\Models\Good;
use MoneyCare\Models\OrderCreation;
use MoneyCare\Models\Passport;
use DateTime;

/**
 * Class OrderCreationTest
 *
 * @package MoneyCare\Tests\Unit\Models
 */
class OrderCreationTest extends ModelTest
{
    /**
     * {@inheritDoc}
     */
    protected function getClassForSettersTest(): ?string
    {
        return OrderCreation::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getSpecificMethodsForSettersTest(): array
    {
        return [
            'goods'              => 'addGood',
            'offers'             => 'addOffer',
            'creditTypes'        => 'addCreditType',
            'installmentPeriods' => 'addInstallmentPeriod',
        ];
    }

    /**
     * @throws ModelRequiredFieldException
     */
    public function testRequirePointIdField(): void
    {
        $this->expectException(ModelRequiredFieldException::class);

        $good = (new Good())->setPrice(10000);

        (new OrderCreation())->addGood($good)->getData();
    }

    /**
     * @throws ModelRequiredFieldException
     */
    public function testRequireGoodsField(): void
    {
        $this->expectException(ModelRequiredFieldException::class);

        (new OrderCreation())->setPointId(123)->getData();
    }

    /**
     * @throws ModelRequiredFieldException
     */
    public function testRequirePassportFieldWhenForceScoring(): void
    {
        $this->expectException(ModelRequiredFieldException::class);

        $good = (new Good())->setPrice(10000);
        (new OrderCreation())->addGood($good)
            ->setPointId(123)
            ->setFirstName('test')
            ->setSecondName('test')
            ->setLastName('test')
            ->setBirthDay(new DateTime('now'))
            ->setForceScore(true)
            ->getData();
    }

    /**
     * @throws ModelRequiredFieldException
     */
    public function testRequireFirstNameFieldWhenForceScoring(): void
    {
        $this->expectException(ModelRequiredFieldException::class);

        $passport = (new Passport())->setNumber(123)
            ->setSeries(123)
            ->setIssueDate((new DateTime('now')));

        $good = (new Good())->setPrice(10000);
        (new OrderCreation())->addGood($good)
            ->setPointId(123)
            ->setPassport($passport)
            ->setSecondName('test')
            ->setLastName('test')
            ->setBirthDay(new DateTime('now'))
            ->setForceScore(true)
            ->getData();
    }

    /**
     * @throws ModelRequiredFieldException
     */
    public function testRequireSecondNameFieldWhenForceScoring(): void
    {
        $this->expectException(ModelRequiredFieldException::class);

        $passport = (new Passport())->setNumber(123)
            ->setSeries(123)
            ->setIssueDate((new DateTime('now')));

        $good = (new Good())->setPrice(10000);
        (new OrderCreation())->addGood($good)
            ->setPointId(123)
            ->setPassport($passport)
            ->setFirstName('test')
            ->setLastName('test')
            ->setBirthDay(new DateTime('now'))
            ->setForceScore(true)
            ->getData();
    }

    /**
     * @throws ModelRequiredFieldException
     */
    public function testRequireLastNameFieldWhenForceScoring(): void
    {
        $this->expectException(ModelRequiredFieldException::class);

        $passport = (new Passport())->setNumber(123)
            ->setSeries(123)
            ->setIssueDate((new DateTime('now')));

        $good = (new Good())->setPrice(10000);
        (new OrderCreation())->addGood($good)
            ->setPointId(123)
            ->setPassport($passport)
            ->setFirstName('test')
            ->setSecondName('test')
            ->setBirthDay(new DateTime('now'))
            ->setForceScore(true)
            ->getData();
    }

    /**
     * @throws ModelRequiredFieldException
     */
    public function testRequireBirthDayFieldWhenForceScoring(): void
    {
        $this->expectException(ModelRequiredFieldException::class);

        $passport = (new Passport())->setNumber(123)
            ->setSeries(123)
            ->setIssueDate((new DateTime('now')));

        $good = (new Good())->setPrice(10000);
        (new OrderCreation())->addGood($good)
            ->setPointId(123)
            ->setPassport($passport)
            ->setFirstName('test')
            ->setSecondName('test')
            ->setLastName('test')
            ->setForceScore(true)
            ->getData();
    }
}