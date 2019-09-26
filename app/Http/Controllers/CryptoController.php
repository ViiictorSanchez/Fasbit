<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coin;
use DB;

class CryptoController extends Controller
{
    public function index(Request $request){    
        $data = Coin::Where('status','=',1)->orderBy('market_cap', 'DESC')->paginate(100);     
        $title = DB::table('settings')->where('name','title')->first();
        $settings = DB::table('settings')->where('name','logo')->first();      
        $ads = DB::table('ads')->where('id',6)->first();
        $ads1 = DB::table('ads')->where('id',7)->first();
        $meta_description = DB::table('settings')->where('name','meta_description')->first();
        $meta_keyword = DB::table('settings')->where('name','meta_keyword')->first();

        return view('new_index',['data'=>$data,'ads'=>$ads,'ads1'=>$ads1,'title'=>$title,'meta_description'=>$meta_description,'meta_keyword'=>$meta_keyword]);
    }

    public function dbData(){
        $data = Coin::Where('status','=',1)->orderBy('market_cap', 'DESC')->get();
        //var_dump($data->toArray()); //die();
        return $data->toArray();
    }

    public function singleCoin($name){
        $title = DB::table('settings')->where('name','title')->first();
        $coin = Coin::where('symbol',$name)->first();
        $ads = DB::table('ads')->where('id',3)->first();
        $ads1 = DB::table('ads')->where('id',10)->first();

        return view('coin-single')
                ->with('title', $title)
                ->with('data',$coin)
                ->with('ads',$ads)
                ->with('ads1',$ads1);
    }
}
