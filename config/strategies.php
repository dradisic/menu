<?php

use App\Models\Currency;

return [
    'order_post_process' => [
        Currency::CURRENCY_CODE_GBP => App\Strategies\OrderPostProcessing\GbpOrderPostProcessStrategy::class,
    ],
    'order_pre_process' => [
        Currency::CURRENCY_CODE_EUR => App\Strategies\OrderPreProcessing\EurOrderPreProcessStrategy::class,
    ],
];
