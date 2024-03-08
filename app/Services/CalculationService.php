<?php

namespace App\Services;

use App\DTOs\CurrencyCalculationDTO;
use App\Models\Rate;
use App\Repositories\RateRepositoryInterface;

class CalculationService implements CalculationServiceInterface
{
    public function __construct(private RateRepositoryInterface $rateRepository) {}

    public function calculateAmounts(string $currencyCode, float $amount): array
    {
        /** @var Rate $rate */
        $rate = $this->rateRepository->findByCode($currencyCode);

        $data = [
            'amount_foreign_currency' => $amount,
            'exchange_rate' => $rate->rate,
            'surcharge_percentage' => Rate::SURCHARGES[$currencyCode] ?? 0,
        ];

        $calculationDTO = new CurrencyCalculationDTO($data);
        $data['amount_surcharge'] = $calculationDTO->calculateAmountSurcharge();
        $data['amount_paid'] = round($calculationDTO->calculateTotalAmountInUSD(), 2);

        return $data;
    }
}
