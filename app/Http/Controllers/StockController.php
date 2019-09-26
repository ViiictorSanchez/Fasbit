<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Stock;
use App\WeeklyStockPrice;
use App\DailyStockPrice;

class StockController extends Controller
{
    public function index(){
        $data = Stock::all();
        $title = DB::table('settings')->where('name','title')->first();
        return view('stocks', ['data'=>$data, 'title'=>$title]);
    }

    public function indexAdmin(){
        $data = Stock::paginate(10);
        return view('Admin.stocks', compact("data"));
    }

    public function dataCharts($symbol){
        $stock  = DB::table('stocks')->where('symbol', $symbol)->first();

        $pricesWeekly = Stock::find($stock->id)->weeklyPrices()->get();
        $pricesDaily = Stock::find($stock->id)->dailyPrices()->get();
        $title = DB::table('settings')->where('name','title')->first();

        $API = 'S672N57EU2CP2L0I';    
        return view('stock', ['pricesWeekly' => $pricesWeekly, 'pricesDaily' => $pricesDaily, 'stock' => $stock, 'title'=>$title, 'API' => $API]);
    }

    public function addStocks(Request $request){
        $stock = new Stock();
        $stock->symbol = $request->symbol;
        $stock->name = $request->name;
        $stock->region = $request->region;

        $verify = Stock::where('symbol','=',$stock->symbol)->first();
        if($verify) return 'error';
        else{
            $stock->save(); 

            $_stock = Stock::all()->last();
            $API = 'S672N57EU2CP2L0I';     
            $url = 'https://www.alphavantage.co/query?function=TIME_SERIES_WEEKLY&symbol='.$_stock->symbol.'&apikey='.$API;
            $data = json_decode( file_get_contents($url), true );
            
            //ALL DATA
            foreach(array_keys($data["Weekly Time Series"]) as $item=>$key){
                $price = new WeeklyStockPrice();
                $price->date = $key;
                $price->open = $data["Weekly Time Series"][$key]["1. open"];
                $price->close = $data["Weekly Time Series"][$key]["4. close"];
                
                $price->stock_id = $_stock->id;
                $price->save();
                if($key == '2014-03-21') break;
            }

            
            $url = 'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol='.$_stock->symbol.'&apikey='.$API;
            $data = json_decode( file_get_contents($url), true );
            //DAILY DATA (max = 6 Months)
            foreach(array_keys($data["Time Series (Daily)"]) as $item=>$key){
                $price = new DailyStockPrice();
                $price->date = $key;
                $price->open = $data["Time Series (Daily)"][$key]["1. open"];
                $price->close = $data["Time Series (Daily)"][$key]["4. close"];

                $price->stock_id = $_stock->id;
                $price->save();
            }

            return 'success';   
        } 
    }


    public function deleteStocks($id){
        Stock::find($id)->delete();
        return redirect('/admin/stocks');
    }
}
