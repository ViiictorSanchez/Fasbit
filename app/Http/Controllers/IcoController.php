<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class IcoController extends BaseController
{
    //

    public function ico(Request $request)
    {
    	$upcoming = DB::select("SELECT * FROM `ico` WHERE `start_date` > CURDATE()");
    	$current = DB::select("SELECT * FROM `ico` WHERE `start_date` <= CURDATE() AND `end_date` >= CURDATE()");
    	$ended = DB::select("SELECT * FROM `ico` WHERE `end_date` < CURDATE()");
    	$ads = DB::table('ads')->where('id',1)->first();
        $title = DB::table('settings')->where('name','title')->first();      
    	// return view('ico-new',['upcoming'=>$upcoming,'current'=>$current,'ended'=>$ended,'ads'=>$ads,'title'=>$title]);
        return view('ico',['upcoming'=>$upcoming,'current'=>$current,'ended'=>$ended,'ads'=>$ads,'title'=>$title]);
    }
    public function ico_view($id)
    {
    	$data = DB::table('ico')->leftjoin('token','token.ico_id','=','ico.id')->where('ico.id','=',$id)->first();
        /*
        echo $data;
        exit;*/
        $ads = DB::table('ads')->where('id',1)->first();
        $title = DB::table('settings')->where('name','title')->first();
        $team = DB::table('team')->where('ico_id',$id)->get();
        $screenshots = DB::table('screenshot')->where('ico_id',$id)->get();
        $similars = DB::table('ico')->leftjoin('token','token.ico_id','=','ico.id')->where('ico.id','!=',$id)->limit(4)->get();
    		return view('ico_view',['data'=>$data,'ads'=>$ads,'title'=>$title,'teams'=>$team,'screenshots'=>$screenshots,'similars'=>$similars]);
    }
}
