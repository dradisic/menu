<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Collection;

interface OrderServiceInterface
{
    public function listOrders(): Collection;
    public function createOrder(array $data): Order;
}
