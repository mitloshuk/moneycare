<?php

namespace MoneyCare\Tests\Unit\Models;

use MoneyCare\Dictionaries\CreditTypesDictionary;
use MoneyCare\Exceptions\PredefinedValue\CreditTypeException;
use MoneyCare\Exceptions\ModelRequiredFieldException;
use MoneyCare\Models\CreditType;

/**
 * Class CreditTypeTest
 *
 * @package MoneyCare\Tests\Unit\Models
 */
class CreditTypeTest extends ModelTest
{
    /**
     * {@inheritDoc}
     */
    protected function getClassForSettersTest(): ?string
    {
        return CreditType::class;
    }

    /**
     * @return void
     * @throws ModelRequiredFieldException
     */
    public function testRequireCreditTypeField(): void
    {
        $this->expectException(ModelRequiredFieldException::class);

        (new CreditType())->getData();
    }

    /**
     * @return void
     * @throws ModelRequiredFieldException
     * @throws CreditTypeException
     */
    public function testInvalidCreditTypeSet(): void
    {
        $this->expectException(CreditTypeException::class);

        (new CreditType())->setCreditType('invalid')->getData();
    }

    /**
     * @return void
     * @throws ModelRequiredFieldException
     * @throws CreditTypeException
     */
    public function testValidCreditTypeSet(): void
    {
        $data = (new CreditType())->setCreditType(CreditTypesDictionary::CLASSIC)->getData();

        self::assertEquals(CreditTypesDictionary::CLASSIC, $data['creditType']);
    }
}