<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\Rate;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rate::factory()->create([
            'from_id' => Currency::query()->where('code', Currency::CURRENCY_CODE_USD)->first(),
            'to_id' => Currency::query()->where('code', Currency::CURRENCY_CODE_JPY)->first(),
            'rate' => 107.17,
        ]);
        Rate::factory()->create([
            'from_id' => Currency::query()->where('code', Currency::CURRENCY_CODE_USD)->first(),
            'to_id' => Currency::query()->where('code', Currency::CURRENCY_CODE_GBP)->first(),
            'rate' => 0.711178,
        ]);
        Rate::factory()->create([
            'from_id' => Currency::query()->where('code', Currency::CURRENCY_CODE_USD)->first(),
            'to_id' => Currency::query()->where('code', Currency::CURRENCY_CODE_EUR)->first(),
            'rate' => 0.884872,
        ]);
    }
}
