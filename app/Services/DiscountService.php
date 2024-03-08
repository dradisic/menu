<?php

namespace App\Services;

class DiscountService implements DiscountServiceInterface
{
    public function applyDiscount(array $data): array
    {
        $amountForeignCurrency = $data['amount_foreign_currency'] ?? 0;
        $discountPercentage = config('app.discount_percentage');

        // Calculate discount_amount only if amount_foreign_currency is set, otherwise default to 0
        $discountAmount = ($amountForeignCurrency * $discountPercentage) / 100;
        return [
                'discount_percentage' => $discountPercentage,
                'discount_amount' => $discountAmount,
            ] + $data;
    }
}
