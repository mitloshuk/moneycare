<?php

namespace MoneyCare\Models;

use MoneyCare\Dictionaries\GoodTypesDictionary;
use MoneyCare\Exceptions\GoodTypeException;

/**
 * Class Good
 *
 * @package MoneyCare\Models
 */
class Good extends Model
{
    protected $type;
    protected $groupName;
    protected $groupId;
    protected $brand;
    protected $brandId;
    protected $model;
    protected $title;
    protected $serialNumber;
    protected $price;
    protected $count;

    /**
     * {@inheritDoc}
     */
    protected function getRequired(): array
    {
        return [
            'price',
        ];
    }

    /**
     * @param string $type
     *
     * @return Good
     * @throws GoodTypeException
     */
    public function setType(string $type): self
    {
        if (!GoodTypesDictionary::exists($type)) {
            throw new GoodTypeException();
        }

        $this->type = $type;

        return $this;
    }

    /**
     * @param string $groupName
     *
     * @return Good
     */
    public function setGroupName(string $groupName): self
    {
        $this->groupName = $groupName;

        return $this;
    }

    /**
     * @param string $groupId
     *
     * @return Good
     */
    public function setGroupId(string $groupId): self
    {
        $this->groupId = $groupId;

        return $this;
    }

    /**
     * @param string $brand
     *
     * @return Good
     */
    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @param string $brandId
     *
     * @return Good
     */
    public function setBrandId(string $brandId): self
    {
        $this->brandId = $brandId;

        return $this;
    }

    /**
     * @param string $model
     *
     * @return Good
     */
    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @param string $title
     *
     * @return Good
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $serialNumber
     *
     * @return Good
     */
    public function setSerialNumber(string $serialNumber): self
    {
        $this->serialNumber = $serialNumber;

        return $this;
    }

    /**
     * @param float $price
     *
     * @return Good
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @param int $count
     *
     * @return Good
     */
    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }
}