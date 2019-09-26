<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;
use DB;
class LoginController extends BaseController
{
    //
    public function sign_up(Request $request)
    {
    	# code...
        $userName=$request->UserName;
        $email=$request->email;
        $password=md5($request->password);

         $check_login = DB::table('user')
                        ->where('email',$email)
                        ->first();   

        if ($check_login == NULL) {
             DB::table('user')->insert(['username'=>$userName,'email'=>$email,'password'=>$password]);
          
              $url='/sign_in';
            
        return redirect($url);
        } else {
           return back()->with('error','User already exists , please make login');
        }
       
       
    }
    public static function login(Request $request)
    {

         $email=$request->email;
        $password=md5($request->password);
        
        $check_login = DB::table('user')
                        ->where('email',$request->email)
                        ->where('password',$password)
                        ->first();
            

        if ($check_login == NULL) {
            echo $email;
            echo $password;
            return back()->with('error','Please check username or password');
        } else {

            $request->session()->put('user_id',$check_login->id);

            $request->session()->put('user_name',$check_login->username);
        
            $data=DB::table('live_data')->where('status','=', 1)->get();
             $url='/fav_coin';
            
        return redirect($url);
      
        }
        
    }
    public function logout(Request $request)
    {
    	$request->session()->forget('user_id');

          $url='/admin/login';
            
        return redirect($url);
    	
    }
    public function logout_user(Request $request){
        $request->session()->forget('user_id');
        $request->session()->forget('user_name');
        $url='/';
            
        return redirect($url);

    }

}
