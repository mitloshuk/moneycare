<?php

namespace MoneyCare\Tests\Unit\Models;

use Codeception\PHPUnit\TestCase;
use MoneyCare\Exceptions\ModelRequiredFieldException;
use MoneyCare\Models\Good;
use MoneyCare\Models\OrderCreation;
use MoneyCare\Models\Passport;
use DateTime;

class PassportTest extends TestCase
{
    public function testRequireIssueDateField()
    {
        $this->expectException(ModelRequiredFieldException::class);

        (new Passport())->setSeries(123)
            ->setNumber(123)
            ->getData();
    }

    public function testRequireSeriesField()
    {
        $this->expectException(ModelRequiredFieldException::class);

        (new Passport())->setIssueDate(new DateTime('now'))
            ->setNumber(123)
            ->getData();
    }

    public function testRequireNumberField()
    {
        $this->expectException(ModelRequiredFieldException::class);

        (new Passport())->setSeries(123)
            ->setIssueDate(new DateTime('now'))
            ->getData();
    }
}