<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Http\Resources\Order\QuoteResource;
use App\Services\QuoteServiceInterface;

class QuoteController extends Controller
{
    public function __construct(
        private QuoteServiceInterface $quoteService
    )
    {
    }


    public function quote(QuoteRequest $request): QuoteResource
    {
        $validated = $request->validated();

        $quote     = $this->quoteService->calculateQuote($validated['currency_code'], $validated['amount']);
        return new QuoteResource($quote);
    }
}
