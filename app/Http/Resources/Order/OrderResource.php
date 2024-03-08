<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                      => $this->id,
            'currency_code'           => $this->currency_code,
            'exchange_rate'           => $this->exchange_rate,
            'surcharge_percentage'    => $this->surcharge_percentage,
            'amount_surcharge'        => $this->amount_surcharge,
            'amount_foreign_currency' => $this->amount_foreign_currency,
            'amount_paid'             => $this->amount_paid,
            'discount_percentage'     => $this->discount_percentage,
            'discount_amount'         => $this->discount_amount,
            'currency_used'           => $this->currency_used,
        ];
    }
}
