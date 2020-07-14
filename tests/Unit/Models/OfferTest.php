<?php

namespace MoneyCare\Tests\Unit\Models;

use MoneyCare\Exceptions\ModelRequiredFieldException;
use MoneyCare\Models\Offer;

/**
 * Class OfferTest
 *
 * @package MoneyCare\Tests\Unit\Models
 */
class OfferTest extends ModelTest
{
    /**
     * {@inheritDoc}
     */
    protected function getClassForSettersTest(): ?string
    {
        return Offer::class;
    }

    /**
     * @throws ModelRequiredFieldException
     *
     * @return void
     */
    public function testRequireIdField(): void
    {
        $this->expectException(ModelRequiredFieldException::class);

        (new Offer())->setBankId('asd')->getData();
    }

    /**
     * @throws ModelRequiredFieldException
     *
     * @return void
     */
    public function testRequireOfferIdField(): void
    {
        $this->expectException(ModelRequiredFieldException::class);

        (new Offer())->setId('qwe')->getData();
    }

    /**
     * @throws ModelRequiredFieldException
     *
     * @return void
     */
    public function testValidOffer(): void
    {
        $data = (new Offer())->setId('qwe')->setBankId('asd')->getData();

        self::assertEquals('qwe', $data['id']);
        self::assertEquals('asd', $data['bankId']);
    }
}