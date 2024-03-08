<?php

namespace Database\Factories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'currency_code'           => $this->faker->unique()->randomElement(Currency::AVAILABLE_CURRENCIES),
            'exchange_rate'           => $this->faker->randomFloat(2, 0.5, 1.5),
            'surcharge_percentage'    => $this->faker->randomElement([7.5, 5]),
            'amount_surcharge'        => $this->faker->randomNumber(2),
            'amount_foreign_currency' => $this->faker->randomNumber(2),
            'amount_paid'             => $this->faker->randomNumber(2),
            'discount_percentage'     => $this->faker->numberBetween(0, 5),
            'discount_amount'         => $this->faker->randomNumber(2),
        ];
    }
}
