<?php

namespace App\Http\Controllers;

use App\Http\Resources\Rate\RateResource;
use App\Models\Rate;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RateController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $rates = Rate::all();
        return RateResource::collection($rates);
    }

    public function show(Rate $rate): RateResource
    {
        return new RateResource($rate);
    }
}

