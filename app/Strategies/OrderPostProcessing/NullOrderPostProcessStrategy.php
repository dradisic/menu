<?php

namespace App\Strategies\OrderPostProcessing;

use App\Models\Order;

class NullOrderPostProcessStrategy implements OrderPostProcessStrategyInterface
{
    public function execute(Order $order): void
    {
    }
}
