<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use App\Services\OrderServiceInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderController extends Controller
{
    public function __construct(
        private OrderServiceInterface $orderService,
    ) {
    }

    public function index(): AnonymousResourceCollection
    {
        $orders = $this->orderService->listOrders();
        return OrderResource::collection($orders);
    }

    /**
     * @throws \Exception
     */
    public function store(StoreOrderRequest $request): OrderResource
    {
        $data = $request->validated();

        $order = $this->orderService->createOrder($data);
        return new OrderResource($order);
    }

    public function show(Order $order): OrderResource
    {
        return new OrderResource($order);
    }
}
