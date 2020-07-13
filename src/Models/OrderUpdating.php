<?php

namespace MoneyCare\Models;

use MoneyCare\Exceptions\ModelRequiredFieldException;

class OrderUpdating extends Model
{
    /**
     * @var string
     */
    protected $pointId;

    /**
     * @var string
     */
    protected $extId;

    /**
     * @var string
     */
    protected $operatorId;

    /**
     * @var Good[]
     */
    protected $goods;

    /**
     * @param string $pointId
     *
     * @return $this
     */
    public function setPointId(string $pointId): self
    {
        $this->pointId = $pointId;

        return $this;
    }

    /**
     * @param string $extId
     *
     * @return $this
     */
    public function setExtId(string $extId): self
    {
        $this->extId = $extId;

        return $this;
    }

    /**
     * @param string $operatorId
     *
     * @return $this
     */
    public function setOperatorId(string $operatorId): self
    {
        $this->operatorId = $operatorId;

        return $this;
    }

    /**
     * @param Good $good
     *
     * @return $this
     * @throws ModelRequiredFieldException
     */
    public function addGood(Good $good): self
    {
        if ($this->goods === null) {
            $this->goods = [];
        }

        $this->goods[] = $good->getData();

        return $this;
    }
}