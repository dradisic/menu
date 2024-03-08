<?php

namespace App\Repositories;

use App\Models\Currency;
use App\Models\Rate;

interface RateRepositoryInterface
{
    public function create($data): Rate;
    public function createOrUpdate($data = []): void;
    public function findByCode(string $currencyCode): ?Rate;
    public function findByFromTo(Currency $fromCurrency, Currency $toCurrency): ?Rate;
}
