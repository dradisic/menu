<?php

namespace App\Console\Commands;

use App\Services\RateService;
use App\Services\RateServiceInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdateCurrencyRatesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:update-rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates currency exchange rates using the CurrencyLayer API';

    public function __construct(private RateServiceInterface $rateService)
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->rateService->updateCurrencyRates();

        Log::debug('Currency rates have been updated');
        $this->info('Currency exchange rates have been updated.');
    }
}
