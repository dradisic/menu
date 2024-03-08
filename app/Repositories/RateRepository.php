<?php

namespace App\Repositories;

use App\Exceptions\RateNotFoundException;
use App\Models\Currency;
use App\Models\Rate;
use Illuminate\Support\Collection;

class RateRepository extends BaseRepository implements RateRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(Rate::class);
    }

    public function all($columns = ['*']): Collection
    {
        return Rate::query()->get();
    }

    public function create($data): Rate
    {
        /** @var Rate $order */
        $order = Rate::query()->create($data);
        return $order;
    }

    public function createOrUpdate($data = []): void
    {
        Rate::upsert(
            $data,
            ['from_id', 'to_id'],
            ['rate']
        );
    }

    public function findByCode(string $currencyCode): ?Rate
    {
        return $this->findBy([
            'relationship' => [
                'to.code' => $currencyCode,
            ],
        ]);
    }

    public function findByFromTo(Currency $fromCurrency, Currency $toCurrency): ?Rate
    {
        return $this->findBy([
            'equals' => [
                'from_id' => $fromCurrency->id,
                'to_id'   => $toCurrency->id,
            ],
        ]);
    }

    public function findByFromToOrFail(Currency $fromCurrency, Currency $toCurrency): Rate
    {
        $rate = $this->findByFromTo($fromCurrency, $toCurrency);
        if (!$rate) {
            throw new RateNotFoundException();
        }
        return $rate;
    }
}
