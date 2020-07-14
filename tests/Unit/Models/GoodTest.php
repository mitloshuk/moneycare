<?php

namespace MoneyCare\Tests\Unit\Models;

use MoneyCare\Exceptions\ModelRequiredFieldException;
use MoneyCare\Models\Good;

/**
 * Class GoodTest
 *
 * @package MoneyCare\Tests\Unit\Models
 */
class GoodTest extends ModelTest
{
    /**
     * {@inheritDoc}
     */
    protected function getClassForSettersTest(): ?string
    {
        return Good::class;
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