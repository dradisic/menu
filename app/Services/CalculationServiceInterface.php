<?php

namespace App\Services;

interface CalculationServiceInterface
{
    public function calculateAmounts(string $currencyCode, float $amount): array;
}
