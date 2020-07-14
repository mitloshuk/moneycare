<?php

namespace MoneyCare\Tests\Unit\Models;

use Codeception\PHPUnit\TestCase;
use MoneyCare\Exceptions\ModelRequiredFieldException;
use MoneyCare\Models\Good;
use MoneyCare\Models\OrderCreation;
use MoneyCare\Models\Passport;
use DateTime;

class PassportTest extends ModelTest
{
    /**
     * {@inheritDoc}
     */
    protected function getClassForSettersTest(): ?string
    {
        return Passport::class;
    }

    /**
     * @throws ModelRequiredFieldException
     */
    public function testRequireIssueDateField(): void
    {
        $this->expectException(ModelRequiredFieldException::class);

        (new Passport())->setSeries(123)
            ->setNumber(123)
            ->getData();
    }

    /**
     * @throws ModelRequiredFieldException
     */
    public function testRequireSeriesField(): void
    {
        $this->expectException(ModelRequiredFieldException::class);

        (new Passport())->setIssueDate(new DateTime('now'))
            ->setNumber(123)
            ->getData();
    }

    /**
     * @throws ModelRequiredFieldException
     */
    public function testRequireNumberField(): void
    {
        $this->expectException(ModelRequiredFieldException::class);

        (new Passport())->setSeries(123)
            ->setIssueDate(new DateTime('now'))
            ->getData();
    }
}