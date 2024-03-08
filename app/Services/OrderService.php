<?php

namespace App\Services;

use App\Factories\OrderPostProcessStrategyFactory;
use App\Factories\OrderPreProcessStrategyFactory;
use App\Models\Order;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderService implements OrderServiceInterface
{

    public function __construct(
        private OrderRepositoryInterface $orderRepository,
        private CalculationService       $calculationService
    ) {
    }

    /**
     * @return mixed
     */
    public function listOrders()
    {
        return $this->orderRepository->all();
    }

    /**
     * @throws \Exception
     */
    public function createOrder(array $data): Order
    {
        return $this->handleDatabaseTransaction(function () use ($data) {
            $code = $data['currency_code'];

            // Calculate order amounts and merge with additional data
            $calculatedData = $this->calculationService->calculateAmounts($code, $data['amount']);
            $data           = array_merge($data, $calculatedData);

            // Get additional data to be merged
            $preOrderData = $this->preOrderActions($code, $data);
            $data         = array_merge($data, $preOrderData);

            $order = Order::create($data);
            $this->postOrderActions($order);

            return $order;
        });
    }

    /**
     * @throws \Exception
     */
    private function handleDatabaseTransaction(callable $dbOperations): Order
    {
        DB::beginTransaction();
        try {
            $order = $dbOperations();
            DB::commit();
            return $order;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    private function preOrderActions(string $code, array $data): array
    {
        return OrderPreProcessStrategyFactory::make($code)->execute($data);
    }

    public function postOrderActions(Order $order): void
    {
        try {
            $strategy = OrderPostProcessStrategyFactory::make($order->currency_code);
            $strategy->execute($order);
        } catch (\InvalidArgumentException $e) {
            Log::warning("Post order action strategy not found for currency code: {$order->currency_code}", [
                'order_id'  => $order->id,
                'exception' => $e->getMessage(),
            ]);
        }
    }
}
