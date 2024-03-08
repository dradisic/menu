<?php

namespace App\Repositories;

use App\Models\Currency;

interface CurrencyRepositoryInterface
{
    public function findByCode(string $code): ?Currency;
}
