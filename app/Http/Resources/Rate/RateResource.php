<?php

namespace App\Http\Resources\Rate;

use App\Http\Resources\Currency\CurrencyResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'from' => new CurrencyResource($this->from),
            'to' => new CurrencyResource($this->to),
            'rate' => $this->rate,
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
