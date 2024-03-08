<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currency::factory()->create([
            'code' => Currency::CURRENCY_CODE_USD,
            'name' => 'US Dollars'
        ]);
        Currency::factory()->create([
            'code' => Currency::CURRENCY_CODE_JPY,
            'name' => 'Japanese Yen'
        ]);
        Currency::factory()->create([
            'code' => Currency::CURRENCY_CODE_GBP,
            'name' => 'British Pound'
        ]);
        Currency::factory()->create([
            'code' => Currency::CURRENCY_CODE_EUR,
            'name' => 'Euro'
        ]);
    }
}
