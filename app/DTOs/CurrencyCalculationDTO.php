<?php

namespace App\DTOs;

class CurrencyCalculationDTO
{
    public int $amountForeignCurrency;

    public float $exchangeRate;

    public int $surchargePercentage;

    public function __construct(array $data)
    {
        $this->amountForeignCurrency = $data['amount_foreign_currency'];
        $this->exchangeRate          = $data['exchange_rate'];
        $this->surchargePercentage   = $data['surcharge_percentage'] ?? 0;
    }

    public function calculateAmountSurcharge(): float
    {
        return $this->amountForeignCurrency * $this->surchargePercentage / 100;
    }

    public function calculateTotalAmountInUSD(): float
    {
        $amountSurcharge = $this->calculateAmountSurcharge();
        return ($this->amountForeignCurrency + $amountSurcharge) * $this->exchangeRate;
    }
}
