<?php

namespace App\Strategies\OrderPreProcessing;

use App\Services\DiscountServiceInterface;

class EurOrderPreProcessStrategy implements OrderPreProcessStrategyInterface
{
    public function __construct(private DiscountServiceInterface $discountService)
    {

    }

    public function execute(array $data): array
    {
        return $this->discountService->applyDiscount($data);
    }
}
