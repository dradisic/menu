<?php

namespace App\Models;

class Rate extends BaseModel
{
    const SURCHARGE_JPY = 7.5;
    const SURCHARGE_GBP = 5;
    const SURCHARGE_EUR = 5;

    const SURCHARGES = [
        Currency::CURRENCY_CODE_JPY => self::SURCHARGE_JPY,
        Currency::CURRENCY_CODE_GBP => self::SURCHARGE_GBP,
        Currency::CURRENCY_CODE_EUR => self::SURCHARGE_EUR,
    ];

    protected $fillable = [
        'from_id',
        'to_id',
        'rate',
    ];

    public function from()
    {
        return $this->belongsTo(Currency::class, 'from_id');
    }

    public function to()
    {
        return $this->belongsTo(Currency::class, 'to_id');
    }
}
