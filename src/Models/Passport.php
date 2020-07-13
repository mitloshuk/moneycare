<?php

namespace MoneyCare\Models;

use DateTime;

/**
 * Class Passport
 *
 * @package MoneyCare\Models
 */
class Passport extends Model
{
    /**
     * @var string
     */
    protected $series;

    /**
     * @var string
     */
    protected $number;

    /**
     * @var string
     */
    protected $issueDate;

    /**
     * {@inheritDoc}
     */
    protected function getRequired(): array
    {
        return [
            'series',
            'number',
            'issueDate',
        ];
    }

    /**
     * @param string $series
     *
     * @return $this
     */
    public function setSeries(string $series): self
    {
        $this->series = $series;

        return $this;
    }

    /**
     * @param string $number
     *
     * @return $this
     */
    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @param DateTime $dateTime
     *
     * @return $this
     */
    public function setIssueDate(DateTime $dateTime): self
    {
        $this->issueDate = $dateTime->format('d.m.Y');

        return $this;
    }
}