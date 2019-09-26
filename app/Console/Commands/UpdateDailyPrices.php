<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Stock;
use App\DailyStockPrice;

class UpdateDailyPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:dailyprices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update daily prices (Stocks and Forex)';

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
        //
        $API = 'S672N57EU2CP2L0I'; 
        $stocks = Stock::all();
        foreach($stocks as $stock){
            $url = 'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol='.$stock->symbol.'&apikey='.$API;
            $data = json_decode( file_get_contents($url), true );
            
            $lastWeeklyPrice = Stock::find($stock->id)->dailyPrices()->orderBy('date', 'DESC')->get()->last();
            $lastWeeklyPrice->delete();
            //DATA Daily
            foreach(array_keys($data["Time Series (Daily)"]) as $item=>$key){
                $price = new DailyStockPrice();
                $price->date = $key;
                $price->open = $data["Time Series (Daily)"][$key]["1. open"];
                $price->close = $data["Time Series (Daily)"][$key]["4. close"];
                
                $price->stock_id = $stock->id;
                $price->save();
                break;
            }
        }
    }
}
