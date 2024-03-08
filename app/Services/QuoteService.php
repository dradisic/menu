<?php

namespace App\Services;

use App\Models\Currency;

class QuoteService implements QuoteServiceInterface
{
    public function __construct(
        private DiscountService    $discountService,
        private CalculationService $calculationService

    ) {
    }

    public function calculateQuote(string $currencyCode, float $amount): array
    {
        $data = $this->calculationService->calculateAmounts($currencyCode, $amount);
        if ($currencyCode === Currency::CURRENCY_CODE_GBP) {
            $data = $this->discountService->applyDiscount($data);
        }
        return array_merge($data, [
            'from_currency' => Currency::CURRENCY_CODE_USD,
            'to_currency'   => $currencyCode,
        ]);
    }
}
