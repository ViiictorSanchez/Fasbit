<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class favCoinController extends BaseController
{
    //
    public function getFavcoin(Request $request){

    	/*$joindata= DB::table('live_data')
    	->leftjoin('fav_coin','fav_coin.coin_id','=','live_data.id','left outer')
    	->whereOr('user_id',$request->session()->get('user_id'))->where('status','=', 1)->select('live_data.*', 'fav_coin.coin_id')->get();
        */
    	//print_r($joindata);
    	//exit;
        $data=DB::table('live_data')->where('status','=', 1)->get();
    	return view ('fav_coin',['data'=>$data]);
    }

    public function add_fav_coin(Request $request)
    {
    	//echo $request->session()->get('user_id');
    
    DB::table('fav_coin')->where('user_id',$request->session()->get('user_id'))->delete();
    
    foreach($request->coin_id as $coin){

    	//DB::table('fav_coin')->where('user_id',$request->session()->get('user_id'))->delete();
    	
    	DB::table('fav_coin')->insert(['coin_id'=>$coin,'user_id'=>$request->session()->get('user_id')]);
    }
    $url='/fav_coin_list';
			
		return redirect($url);


    }

    public function showFavCoin($id){
    	 $data = DB::select("select a.*,b.user_id from live_data a join fav_coin b on a.id= b.coin_id where b.user_id=".$id);
    	
    	  $fullArray = Array();
        foreach ($data as $post)
            {
                $innerArray['image_url'] = $post->image_url;
                $innerArray['id'] = $post->id;
                $innerArray['name'] = $post->name;
                $innerArray['id'] = $post->id;
                $innerArray['price'] = $post->price;
                $innerArray['percent_change_24h'] = $post->percent_change_24h;

				$temp= explode(' ',$post->volume_24h);
                $innerArray['volume_24h'] = $temp[1];

                $innerArray['market_cap'] = $post->market_cap;
                $innerArray['chart_image'] = $post->chart_image; 
                $fullArray[] = $innerArray;

            }
             echo json_encode($fullArray);
    }
}
