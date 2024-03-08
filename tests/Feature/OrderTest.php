<?php

use App\Models\Currency;
use App\Models\Order;

it('creates an order', function ($currencyCode) {
    $data = [
        'currency_code' => $currencyCode,
        'amount'        => 100,
    ];

    // Perform the test request
    $response = $this->postJson('/orders', $data);

    // Assert the response status and structure
    $response->assertStatus(201)
             ->assertJsonStructure([
                 'data' => [
                     'id',
                     'currency_code',
                     'exchange_rate',
                     'surcharge_percentage',
                     'amount_surcharge',
                     'amount_foreign_currency',
                     'amount_paid',
                     'discount_percentage',
                     'discount_amount',
                 ],
             ]);

    // Assert the data was saved
    $this->assertDatabaseHas('orders', [
        'currency_code' => $currencyCode,
    ]);
})->with([
    Currency::AVAILABLE_CURRENCIES,
]);

it('retrieves an order details', function ($currencyCode) {
    // Create an order
    $order = Order::factory()->create([
        'currency_code' => $currencyCode,
    ]);

    $response = $this->getJson('/orders/' . $order->id);

    // Assert the response status and data
    $response->assertStatus(200)
             ->assertJson([
                 'data' => [
                     'id'            => $order->id,
                     'currency_code' => $currencyCode,
                 ],
             ]);
})->with([
    Currency::AVAILABLE_CURRENCIES,
]);
it('lists all orders', function () {
    // Create a set of orders using the Order factory
    $count = 3;
    Order::factory()->count($count)->create();

    // Perform the test request to retrieve all orders
    $response = $this->getJson('/orders');

    // Assert the response status is OK
    $response->assertStatus(200);

    // Assert the response has a list structure and at least the minimal details
    $response->assertJsonStructure([
        'data' => [
            '*' => [
                     'id',
                     'currency_code',
                     'exchange_rate',
                     'surcharge_percentage',
                     'amount_surcharge',
                     'amount_foreign_currency',
                     'amount_paid',
                     'discount_percentage',
                     'discount_amount',
            ],
        ],
    ]);

    $this->assertCount($count, $response->json('data'));
});
