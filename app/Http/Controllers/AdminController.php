<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LiveData;
use App\Stock;
use Hash;
use App\Admin;
use DB;

class AdminController extends BaseController
{
    //

    public static function ajax_status_update($status,$id)
    {
        DB::table('ads')->where('id',$id)->update(['status'=>$status]);
        return back();
    }

    public static function logout(Request $request)
    {
        $request->session()->forget('user_id');
        return redirect()->route('admin_login');
    }

    public static function basic_settings()
    {
        $title = DB::table('settings')->where('name','title')->first();
        $logo = DB::table('settings')->where('name','logo')->first();
        $meta_description = DB::table('settings')->where('name','meta_description')->first();
        $meta_keyword = DB::table('settings')->where('name','meta_keyword')->first();
        $disqus_url = DB::table('settings')->where('name','disqus_url')->first();
        return view('Admin.basic_settings',['title'=>$title,'logo'=>$logo,'meta_description'=>$meta_description,'meta_keyword'=>$meta_keyword,'disqus_url'=>$disqus_url]);

    }

    public static function update_basic_settings(Request $request)
    {

          if ($request->file('logo'))
         {
            $custom_file_name = time() . '.' . $request->file('logo')->getClientOriginalExtension();
            $completePath = url('/public/ico') . '/' . $custom_file_name;
            $request->file('logo')->move(base_path() . '/public/ico/', $custom_file_name);
            DB::table('settings')->where('name','=','logo')->update(['value' => $completePath]);
           
          }

          if($request->title)
          {
            $title = $request->title;
             DB::table('settings')->where('name','=','title')->update(['value' => $title]);
          }     

          if($request->meta_description)
          {
            $meta_description = $request->meta_description;
             DB::table('settings')->where('name','=','meta_description')->update(['value' => $meta_description]);
          }   

          if($request->meta_keyword)
          {
            $meta_keyword = $request->meta_keyword;
             DB::table('settings')->where('name','=','meta_keyword')->update(['value' => $meta_keyword]);
          }  

          if($request->disqus_url)
          {
             DB::table('settings')->where('name','=','disqus_url')->update(['value' => $request->disqus_url]);
          }           

          return redirect('/admin/basic_settings');
    }

    public static function add_ico(Request $request)
    {
        $custom_file_name = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $completePath = url('/public/ico') . '/' . $custom_file_name;
            $request->file('image')->move(base_path() . '/public/ico/', $custom_file_name);

        // $photoName2 = time().'.'.$request->images->getClientOriginalExtension();
        // $request->images->move(public_path('ico'), $photoName2);
        
        $ins_data = array();
        $insert_data = array();
        $ins_data['title'] = $request->title;
        $ins_data['category'] = $request->category;
        $ins_data['image_url'] = $completePath;
        $ins_data['description'] = $request->description;
        $ins_data['short_description'] = $request->short_description;
        $ins_data['start_date'] = $request->start_date;
        $ins_data['end_date'] = $request->end_date;

        $ins_data['website'] = $request->website;
        $ins_data['whitepaper'] = $request->whitepaper;
        $ins_data['twitter'] = $request->twitter;
        $ins_data['youtube'] = $request->youtube;
        $ins_data['facebook'] = $request->facebook;
        $ins_data['slack'] = $request->slack;
        $ins_data['linkedin'] = $request->linkedin;
        $ins_data['github'] = $request->github;
        $ins_data['telegram'] = $request->telegram;
        $ins_data['reddit'] = $request->reddit;
        $ins_data['linkedin_follow'] = $request->linkedin_follow;
        $ins_data['youtube_follow'] = $request->youtube_follow;
        $ins_data['telegram_follow'] = $request->telegram_follow;
        $ins_data['reddit_follow'] = $request->reddit_follow;
        $ins_data['twitter_follow'] = $request->twitter_follow;
        $ins_data['rating'] = $request->rating;

        $ins_data['meta_title'] = $request->meta_title;
        $ins_data['meta_desc'] = $request->meta_desc;
        $ins_data['meta_keyword'] = $request->meta_keyword;

        /*echo '<pre>';
        var_dump($ins_data);
        echo '</pre>';
        die();*/
        $insert = DB::table('ico')->insert($ins_data);

        $last_id=DB::table('ico')->orderBy('id','desc')->first();

        $insert_data['white_list'] = $request->white_list;
        $insert_data['pre_sale'] = $request->pre_sale;
        $insert_data['public_sale'] = $request->public_sale;
        $insert_data['ticker'] = $request->ticker;
        $insert_data['platform'] = $request->platform;
        $insert_data['country'] = $request->country;
        $insert_data['accepting'] = $request->accepting;
        $insert_data['soft_cap'] = $request->soft_cap;
        $insert_data['hard_cap'] = $request->hard_cap;
        $insert_data['total_token'] = $request->total_token;
        $insert_data['available_sale'] = $request->available_sale;
        $insert_data['bounty'] = $request->bounty;
        $insert_data['kyc'] = $request->kyc;
        $insert_data['images'] = "";
        $insert_data['ico_id'] = $last_id->id;
        $insert = DB::table('token')->insert($insert_data);

        return back()->with('success','New ico added successfully');
    }

    public function delete_ico($id){
        DB::table('token')->where('ico_id','=',$id)->delete();
        DB::table('ico')->where('id','=',$id)->delete();
        return redirect('/admin/index');
    }

    public function login($value='')
    {
    	# code...
        $title = DB::table('settings')->where('name','title')->first();
    	return view('Admin.login',['title'=>$title]);
    }

    public static function index(Request $request)
    {
        if (!$request->session()->get('user_id')) {
            return redirect()->route('admin_login');
        }
    	$ico = DB::table('ico')->get();

        $title = DB::table('settings')->where('name','title')->first();
    	return view('Admin.index',['ico'=>$ico,'title'=>$title]);
    }

    public static function check_login(Request $request)
    {   
        # code...
        $verify = " ";   
        if ($verify = Admin::where('email','=',$request->username)->first()){
            if(Hash::check($request->password, $verify->password)){
                $request->session()->put('user_id',$verify->id); 
                return redirect()->route('admin_index');
            } 
        }else{
            return back()->with('error','Wrong username or password');
        }
    }

    public static function coins(Request $request)
    {
        //$data = DB::table('live_data')->get();
        $data = LiveData::all();
        return view('Admin.coins',['data'=>$data]);
    }
    public function delete_coin($id){
        LiveData::find($id)->delete();
        $data = LiveData::all();
        return redirect('/admin/coins');
    }

     public static function activate_coins($id)
    {
        $data = DB::table('live_data')->where('id','=',$id)->update([
            'status'=>1
        ]);

       return redirect('/admin/coins');
    }

     public static function deactivate_coins($id)
    {
        $data = DB::table('live_data')->where('id','=',$id)->update([
            'status'=>0
        ]);

        return redirect('/admin/coins');
    }

        public static function ads(Request $request)
    {
        $data = DB::table('ads')->get();

        return view('Admin.ads',['data'=>$data]);
    }

     public static function activate_ads($id)
    {
        $data = DB::table('ads')->where('id','=',$id)->update([
            'status'=>1
        ]);

       return redirect('/admin/ads');
    }

     public static function deactivate_ads($id)
    {
        $data = DB::table('ads')->where('id','=',$id)->update([
            'status'=>0
        ]);

        return redirect('/admin/ads');
    }

       public static function ads_script(Request $request)
    {
        // print_r($request);exit;
        $data = DB::table('ads')->get();
        $data = DB::table('ads')->where('id','=',$request->id)->update([
            'script'=>$request->script
        ]);

        return redirect('/admin/ads');
    }

     public static function ads_delete($id)
    {
        $data = DB::table('ads')->where('id','=',$id)->delete();

        return redirect('/admin/ads');
    }

    
}
