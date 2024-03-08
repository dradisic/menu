<?php

namespace App\Strategies\OrderPostProcessing;

use App\Models\Order;
use App\Notifications\OrderDetailsNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class GbpOrderPostProcessStrategy implements OrderPostProcessStrategyInterface
{
    public function execute(Order $order): void
    {
        Notification::route('mail', config('app.order_admin_email'))->notify(new OrderDetailsNotification($order));
    }
}
