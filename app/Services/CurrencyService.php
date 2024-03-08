<?php

namespace App\Services;

use App\Repositories\CurrencyRepository;
use Illuminate\Support\Collection;

class CurrencyService implements CurrencyServiceInterface
{
    public function __construct(
        private CurrencyRepository $currencyRepository
    ) {
    }

    public function getSupportedCurrencies(): Collection
    {
        return $this->currencyRepository->allExcludingUSD();
    }
}
