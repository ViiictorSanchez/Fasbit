<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\ForexList;
use App\Forex;
use App\WeeklyForexPrice;
use App\DailyForexPrice;


class ForexController extends Controller
{
    public function index(){
        $data = Forex::all();
        $title = DB::table('settings')->where('name','title')->first();
        return view('forexes', ['data' => $data, 'title'=>$title]);
    }

	public function indexForexAdmin(){
        $data = Forex::all();
        $title = DB::table('settings')->where('name','title')->first();
        return view('Admin.forex', ['data'=>$data, 'title'=>$title]);
    }

    public function searchForex(Request $request){
        $from = $request->from;
    	$data = DB::table('forex_list')->where('currency','like','%'.$from.'%')->get();
    	if (empty($data))
    		return "empty";
    	return $data;
    } 

    public function dataCharts($coins){
        $coin = explode('_', $coins);
        $forex  = DB::table('forexes')->where('from', $coin[0])
                                      ->where('to', $coin[1])
                                      ->first();

        $pricesWeekly = Forex::find($forex->id)->weeklyPrices()->get();
        $pricesDaily = Forex::find($forex->id)->dailyPrices()->get();
        $title = DB::table('settings')->where('name','title')->first();

        return view('forex', ['forex'=>$forex, 'pricesWeekly' => $pricesWeekly, 'pricesDaily' => $pricesDaily, 'title' => $title]);
    }

    public function addForex(Request $request){
        
        $forex = new Forex();
        $forex->from = $request->from;
        $forex->to = $request->to;


        $verify_from = Forex::where('from','=',$forex->from)->first();
        $verify_to = Forex::where('to','=',$forex->to)->first();
        if($verify_from && $verify_to) return redirect('/admin/forex');
        else{   
            $forex->save();
            $_forex = Forex::all()->last();
            $API = 'S672N57EU2CP2L0I';
            $url = 'https://www.alphavantage.co/query?function=FX_WEEKLY&from_symbol='.$forex->from.'&to_symbol='.$forex->to.'&apikey='.$API;
            $data = json_decode( file_get_contents($url), true );

            foreach(array_keys($data["Time Series FX (Weekly)"]) as $item=>$key){
                $price = new WeeklyForexPrice();
                $price->date = $key;
                $price->open = $data["Time Series FX (Weekly)"][$key]["1. open"];
                $price->close = $data["Time Series FX (Weekly)"][$key]["4. close"];
                $price->forex_id = $_forex->id;
                $price->save();
                if($key == '2014-03-21') break;
            }
            
            $url = 'https://www.alphavantage.co/query?function=FX_DAILY&from_symbol='.$forex->from.'&to_symbol='.$forex->to.'&apikey=demo'.$API;
            $data2 = json_decode( file_get_contents($url), true );
            foreach(array_keys($data2["Time Series FX (Daily)"]) as $item=>$key){
                $price = new DailyForexPrice();
                $price->date = $key;
                $price->open = $data2["Time Series FX (Daily)"][$key]["1. open"];
                $price->close = $data2["Time Series FX (Daily)"][$key]["4. close"];
                $price->forex_id = $_forex->id;
                $price->save();
                if($key == '2014-03-21') break;
            }
            return redirect('/admin/forex');        
        }
    }

    public function deleteForexes($id){
        Forex::find($id)->delete();
        return redirect('/admin/forex');
    }
}
