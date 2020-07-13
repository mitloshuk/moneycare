<?php

namespace MoneyCare\Tests\Unit\Models;

use Codeception\PHPUnit\TestCase;
use MoneyCare\Exceptions\ModelRequiredFieldException;
use MoneyCare\Models\Good;
use MoneyCare\Models\OrderCreation;
use MoneyCare\Models\Passport;
use DateTime;

class GoodTest extends TestCase
{
    public function testRequirePriceField()
    {
        $this->expectException(ModelRequiredFieldException::class);

        (new Passport())->getData();
    }
}