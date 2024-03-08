<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(Order::class);
    }

    public function create($data): Order
    {
        /** @var Order $order */
        $order = Order::query()->create($data);
        return $order;
    }
}
