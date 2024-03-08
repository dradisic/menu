<?php

namespace App\Services;

interface DiscountServiceInterface
{
    public function applyDiscount(array $data): array;
}
