<?php

namespace App\Console\Commands;
use App\Http\Controllers\CoinController;
use Illuminate\Support\Facades\Log;

use Illuminate\Console\Command;

class UpdateTopCoins extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coins:top';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update coins top';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        CoinController::rank();
        Log::info('Top updated');
    }
}
