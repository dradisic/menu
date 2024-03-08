<?php

namespace App\Strategies\OrderPreProcessing;

class NullOrderPreProcessStrategy implements OrderPreProcessStrategyInterface
{
    public function execute(array $data): array
    {
        return $data;
    }
}
