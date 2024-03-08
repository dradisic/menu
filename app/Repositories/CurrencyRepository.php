<?php

namespace App\Repositories;

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

    public function allExcludingUSD(): Collection
    {
        return $this->newQuery()->where('code', '!=', Currency::CURRENCY_CODE_USD)->get();
    }

}
