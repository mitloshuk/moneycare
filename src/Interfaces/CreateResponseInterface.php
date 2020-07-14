<?php

namespace MoneyCare\Interfaces;

interface CreateResponseInterface
{
    /**
     * Get order id if it was accepted
     *
     * @return string
     */
    public function getOrderId(): string;

    /**
     * Get is order accepted
     *
     * @return bool
     */
    public function getIsAccepted(): bool;

    /**
     * Get url to form if no force_score
     *
     * @return string
     */
    public function getFormUrl(): ?string;

    /**
     * Get reason when order is not accepted
     *
     * @return string
     */
    public function getReason(): ?string;
}