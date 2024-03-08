<?php

namespace App\Models;

class Order extends BaseModel
{
    protected $fillable = [
        'currency_code',
        'exchange_rate',
        'surcharge_percentage',
        'amount_surcharge',
        'amount_foreign_currency',
        'amount_paid',
        'discount_percentage',
        'discount_amount',
    ];

    public function getCurrencyUsedAttribute()
    {
        return Currency::CURRENCY_CODE_USD;
    }
}
