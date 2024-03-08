<?php


use App\Models\Currency;

it('provides a quote for currency purchase', function ($currencyCode) {
    $queryParams = [
        'currency_code' => $currencyCode,
        'amount'        => 100,
    ];

    // Perform the test request
    $response = $this->getJson('/quote?' . http_build_query($queryParams));

    // Assert the response status and structure
    $response->assertStatus(200)
             ->assertJsonStructure([
                 'data' => [
                     'from_currency',
                     'to_currency',
                     'amount_foreign_currency',
                     'exchange_rate',
                     'surcharge_percentage',
                     'amount_surcharge',
                     'amount_paid',
                     'discount_percentage',
                     'discount_amount',
                 ],
             ]);
})->with([
    Currency::AVAILABLE_CURRENCIES,
]);
