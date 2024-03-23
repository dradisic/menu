<?php

namespace App\Services;

use App\Models\Rate;

interface RateServiceInterface
{
    public function updateCurrencyRates(): void;
    public function getByCurrencyCode(string $code): ?Rate;

    public function all();
}
