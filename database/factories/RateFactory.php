<?php

namespace Database\Factories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rate>
 */
class RateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'from_id' => Currency::query()->where('code', Currency::CURRENCY_CODE_USD)->first(),
            'to_id' => Currency::query()->where('code', Currency::CURRENCY_CODE_JPY)->first(),
            'rate' => 107.17,
        ];
    }
}
