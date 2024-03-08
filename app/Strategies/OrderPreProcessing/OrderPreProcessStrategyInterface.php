<?php

namespace App\Strategies\OrderPreProcessing;

interface OrderPreProcessStrategyInterface
{
    public function execute(array $data): array;
}
