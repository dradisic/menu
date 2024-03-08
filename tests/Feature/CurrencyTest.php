<?php

use App\Models\Currency;

it('displays available currencies and rates', function () {
    Currency::factory()->create();

    // Perform the test request
    $response = $this->get('/currencies');

    // Assert the response status and structure
    $response->assertStatus(200)
             ->assertJsonStructure([
                 'data' => [
                     '*' => ['name', 'code'],
                 ],
             ]);
});
