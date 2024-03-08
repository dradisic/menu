<?php

namespace App\Strategies\OrderPostProcessing;

use App\Models\Order;

interface OrderPostProcessStrategyInterface
{
    public function execute(Order $order):void;
}
