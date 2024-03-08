<?php

namespace App\Factories;

use App\Strategies\OrderPreProcessing\NullOrderPreProcessStrategy;
use App\Strategies\OrderPreProcessing\OrderPreProcessStrategyInterface;

class OrderPreProcessStrategyFactory
{
    public static function make($currencyCode): OrderPreProcessStrategyInterface
    {
        $strategies = config('strategies.order_pre_process');

        if (isset($strategies[$currencyCode])) {
            return new $strategies[$currencyCode];
        }

        return new NullOrderPreProcessStrategy();
    }
}
