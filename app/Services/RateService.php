<?php

namespace App\Services;

use App\Models\Currency;
use App\Models\Rate;
use App\Repositories\CurrencyRepository;
use App\Repositories\CurrencyRepositoryInterface;
use App\Repositories\RateRepository;
use App\Repositories\RateRepositoryInterface;

class RateService implements RateServiceInterface
{

    public function __construct(
        private ExchangeRateFetcherInterface $currencyLayerService,
        private RateRepositoryInterface      $rateRepository,
        private CurrencyRepositoryInterface  $currencyRepository
    ) {
    }

    public function updateCurrencyRates(): void
    {
        $rates = $this->currencyLayerService->fetchExchangeRates(Currency::CURRENCY_CODE_USD);
        $from  = $this->currencyRepository->findByCode(Currency::CURRENCY_CODE_USD);

        $dataToUpdate = collect($rates)
            ->except(Currency::CURRENCY_CODE_USD)
            ->only(Currency::AVAILABLE_CURRENCIES)
            ->mapWithKeys(function ($rate, $code) use ($from) {
                /** @var Currency $to */
                $to = $this->currencyRepository->findByCode($code);
                return [
                    $code => [
                        'from_id' => $from->id,
                        'to_id'   => $to->id,
                        'rate'    => $rate,
                    ],
                ];
            });

        $this->rateRepository->createOrUpdate($dataToUpdate->values()->all());
    }

    public function getByCurrencyCode(string $code): ?Rate
    {
        return $this->rateRepository->findByCode($code);
    }

    public function all()
    {
        return $this->rateRepository->all();
    }
}
