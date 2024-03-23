<?php

namespace App\Services;

use App\Repositories\CurrencyRepository;
use App\Repositories\CurrencyRepositoryInterface;
use Illuminate\Support\Collection;

class CurrencyService implements CurrencyServiceInterface
{
    public function __construct(
        private CurrencyRepositoryInterface $currencyRepository
    ) {
    }

    public function getSupportedCurrencies(): Collection
    {
        return $this->currencyRepository->allExcludingUSD();
    }
}
