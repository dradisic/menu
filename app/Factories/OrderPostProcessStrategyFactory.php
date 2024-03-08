<?php

namespace App\Factories;

use App\Strategies\OrderPostProcessing\NullOrderPostProcessStrategy;
use App\Strategies\OrderPostProcessing\OrderPostProcessStrategyInterface;

class OrderPostProcessStrategyFactory
{
    public static function make($currencyCode): OrderPostProcessStrategyInterface
    {
        $strategies = config('strategies.order_post_process');

        if (isset($strategies[$currencyCode])) {
            return new $strategies[$currencyCode];
        }


        return new NullOrderPostProcessStrategy();
    }
}
