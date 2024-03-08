<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class QuoteResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'from_currency' => $this->resource['from_currency'],
            'to_currency' => $this->resource['to_currency'],
            'amount_surcharge' => $this->resource['amount_surcharge'],
            'amount_paid' => $this->resource['amount_paid'],
            'exchange_rate' => $this->resource['exchange_rate'],
            'amount_foreign_currency' => $this->resource['amount_foreign_currency'],
            'surcharge_percentage' => $this->resource['surcharge_percentage'],
            'discount_percentage' => $this->resource['discount_percentage'] ?? 0,
            'discount_amount' => $this->resource['discount_amount'] ?? 0,
        ];
    }
}
