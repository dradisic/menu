<?php

namespace App\Services;

interface QuoteServiceInterface
{
    public function calculateQuote(string $currencyCode, float $amount): array;
}
