<?php

namespace App\Models;

class Currency extends BaseModel
{
    const CURRENCY_CODE_USD = 'USD';
    const CURRENCY_CODE_GBP = 'GBP';
    const CURRENCY_CODE_JPY = 'JPY';
    const CURRENCY_CODE_EUR = 'EUR';

    public const AVAILABLE_CURRENCIES = [
        self::CURRENCY_CODE_GBP,
        self::CURRENCY_CODE_JPY,
        self::CURRENCY_CODE_EUR,
    ];

    protected $fillable = [
        'code',
        'name'
    ];
}
