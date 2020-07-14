<?php

namespace MoneyCare\Models;

use MoneyCare\Dictionaries\GoodTypesDictionary;
use MoneyCare\Exceptions\PredefinedValue\GoodTypeException;

/**
 * Class Good
 *
 * @package MoneyCare\Models
 */
class Good extends Model
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $groupName;

    /**
     * @var string
     */
    protected $groupId;

    /**
     * @var string
     */
    protected $brand;

    /**
     * @var string
     */
    protected $brandId;

    /**
     * @var string
     */
    protected $model;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $serialNumber;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var int
     */
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
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
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
     * @return string
     */
    public function getGroupName(): string
    {
        return $this->groupName;
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
     * @return string
     */
    public function getGroupId(): string
    {
        return $this->groupId;
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
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
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
     * @return string
     */
    public function getBrandId(): string
    {
        return $this->brandId;
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
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
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
     * @return string
     */
    public function getSerialNumber(): string
    {
        return $this->serialNumber;
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
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
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

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }
}