<?php

namespace App\Http\Controllers;

use App\Http\Resources\Rate\RateResource;
use App\Models\Rate;
use App\Services\RateServiceInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RateController extends Controller
{
    public function __construct(private RateServiceInterface $rateService)
    {
    }

    public function index(): AnonymousResourceCollection
    {
        return RateResource::collection($this->rateService->all());
    }

    public function show(Rate $rate): RateResource
    {
        return new RateResource($rate);
    }
}

