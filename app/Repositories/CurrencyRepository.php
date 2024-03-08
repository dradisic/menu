<?php

namespace App\Repositories;

use App\Exceptions\CurrencyNotFoundException;
use App\Models\Currency;
use Illuminate\Support\Collection;

class CurrencyRepository extends BaseRepository implements CurrencyRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(Currency::class);
    }

    public function findByCode(string $code): ?Currency
    {
        return $this->findBy([
            'equals' => [
                'code' => $code,
            ],
        ]);
    }

    public function findByCodeOrFail(string $currencyCode): Currency
    {
        $currency = $this->findByCode($currencyCode);
        if (!$currency) {
            throw new CurrencyNotFoundException($currencyCode);
        }
        return $currency;
    }

    public function allExcludingUSD(): Collection
    {
        return $this->newQuery()->where('code', '!=', Currency::CURRENCY_CODE_USD)->get();
    }

}
