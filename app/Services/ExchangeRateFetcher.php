<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ExchangeRateFetcher implements ExchangeRateFetcherInterface
{
    protected string $baseUrl;

    protected string $apiKey;

    public function __construct(
        string $apiKey,
        string $baseUrl
    ) {
        $this->apiKey  = $apiKey;
        $this->baseUrl = $baseUrl;
    }

    public function fetchExchangeRates(string $fromCurrencyCode): ?array
    {
        try {
            $response = Http::withHeaders(['accept' => 'application/json'])
                            ->get("{$this->baseUrl}fetch-all", [
                                'from'    => $fromCurrencyCode,
                                'api_key' => $this->apiKey,
                            ]);

            if ($response->successful()) {
                return $response->json()['results'];
            }

            Log::error('Failed to fetch currency rates', [
                'status'   => $response->status(),
                'response' => $response->body(),
            ]);

            return null;
        } catch (\Exception $e) {
            Log::error('Exception occurred while fetching currency rates', ['exception' => $e->getMessage()]);
            return null;
        }
    }

}
