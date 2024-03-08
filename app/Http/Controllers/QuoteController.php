<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Http\Resources\Order\QuoteResource;
use App\Services\QuoteService;

class QuoteController extends Controller
{
    public function __construct(private QuoteService $quoteService)
    {
    }


    public function quote(QuoteRequest $request): QuoteResource
    {
        $validated = $request->validated();

        $quote     = $this->quoteService->calculateQuote($validated['currency_code'], $validated['amount']);
        return new QuoteResource($quote);
    }
}
