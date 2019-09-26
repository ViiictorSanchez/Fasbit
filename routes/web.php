<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Route::GET('csv', function(){
	if($handle = fopen(public_path().'/forex_currency_list.csv', 'r')){
		fgetcsv($handle, 1000, ',');
		while(($data = fgetcsv($handle, 1000, ','))){
			$c = new App\ForexList();
			$c->currency = $data[0];
			$c->currency_name = $data[1];
			$c->save();
		}
		fclose($handle);
	}
	return \App\ForexList::all();
});*/

//User login group
Route::group(['middleware' => ['auth_user']], function() {
	Route::get('/fav_coin','favCoinController@getFavcoin')->name('fav_coin');
	Route::post('/add_fav_coin','favCoinController@add_fav_coin')->name('add_fav_coin');
	Route::get('/getItemAjax/fav_coin/load/{id}','favCoinController@showFavCoin');
	Route::get('/fav_coin_list',function(){
		$title = DB::table('settings')->where('name','title')->first();
	   return view('fav_coin_list',['title'=>$title]);
	});
});

//Admin group
Route::group(['prefix' => 'admin'] , function() {
	Route::GET('login','AdminController@login')->name('admin_login');
	Route::POST('login','AdminController@check_login');
	Route::GET('logout','LoginController@logout');
	Route::group(['middleware' => ['admin']], function () {
		Route::GET('footer',function(){
			$data = DB::table('settings')->where('name','footer')->first();
			$header = DB::table('settings')->where('name','header')->first();
			return view('Admin.footer',['data'=>$data,'header'=>$header]);
		});
		Route::GET('index','AdminController@index')->name('admin_index');
		Route::POST('index','AdminController@add_ico');
		Route::GET('index/delete/{id}','AdminController@delete_ico');
		Route::GET('coins','AdminController@coins');
		Route::GET('coins/activate/{id}','AdminController@activate_coins');
		Route::GET('coins/deactivate/{id}','AdminController@deactivate_coins');
		Route::GET('coins/delete/{id}', 'AdminController@delete_coin');
		Route::GET('ads','AdminController@ads');
		Route::GET('ads/activate/{id}','AdminController@activate_ads');
		Route::GET('ads/deactivate/{id}','AdminController@deactivate_ads');
		Route::GET('ads/delete/{id}','AdminController@ads_delete');
		Route::POST('ads/script','AdminController@ads_script');
		Route::post('update_basic_settings','AdminController@update_basic_settings');
		Route::GET('basic_settings','AdminController@basic_settings');
		Route::POST('footer-update','DashboardController@footer_update');
		Route::GET('stocks', 'StockController@indexAdmin');
		Route::GET('stocks/delete/{id}', 'StockController@deleteStocks');
		Route::POST('stocks', 'StockController@addStocks');
		Route::POST('forex', 'ForexController@searchForex');
		Route::GET('forex', 'ForexController@indexForexAdmin');
		Route::POST('forex/add', 'ForexController@addForex');
		Route::GET('forex/delete/{id}', 'ForexController@deleteForexes');
		Route::POST('ccoins','CoinController@store');
		Route::GET('ccoins','CoinController@index');
		Route::GET('ccoins/delete/{id}', ['uses' => 'CoinController@destroy', 'as' => 'coin.delete']);
		Route::GET('ccoins/desactivate/{id}','CoinController@desactivate_coin');
		Route::GET('ccoins/activate/{id}','CoinController@activate_coin');
		Route::GET('ccoins/rank','CoinController@rank');
		Route::GET('ccoins/cron','CoinController@cronUpdate');
	});
});

//Public Routes
Route::GET('/logout',function(Request $request)
{
	$request->session()->forget('user_name');
	$request->session()->forget('user_id');
	return redirect('/');
});

Route::GET('/ico/ico-new',function(){
	return view('ico-new');
});

Route::GET('/ads/status-update/{status}/{id}','AdminController@ajax_status_update');
Route::GET('/mining','DashboardController@mining');
Route::get('/disclaimer',function(){
	return view('disclaimer');
});
Route::get('/terms',function(){
	return view('terms');
});
Route::get('/privacy',function(){
	return view('privacy');
});
Route::get('/sign_in',function(){
	 $title = DB::table('settings')->where('name','title')->first();
	return view('sign_in',['title'=>$title]);
});
Route::get('/sign_up',function(){
	$title = DB::table('settings')->where('name','title')->first();
	return view('sign-up',['title'=>$title]);
});

Route::get('/','CryptoController@index');
Route::GET('/dbData', 'CryptoController@dbData');
Route::GET('/coin/{coin}', 'CryptoController@singleCoin');
Route::get('/get-data','DashboardController@get_data');
Route::post('/add_user','LoginController@sign_up');
Route::post('/user_login','LoginController@login');
Route::GET('/ico','IcoController@ico');
Route::GET('/ico_view/{id}','IcoController@ico_view');
Route::GET('/news','DashboardController@news');
Route::GET('/stock', 'StockController@index');
Route::GET('/forex', 'ForexController@index');
Route::GET('/getItemAjax','DashboardController@getItemAjax');
Route::GET('/getItemAjaxCopy','DashboardController@getItemAjaxCopy');
Route::GET('/getItemAjax/{market}','DashboardController@getItemAjax_Exchange');
Route::get('/exchange/{market}','DashboardController@exchange_market');
Route::get('/getItemAjax/exchange/load','DashboardController@exchange_ajax');
Route::get('/admin/new_ico', function(){
		return view('Admin.new_ico');
});	

Route::get('/user/logout','LoginController@logout_user');
/* Route::GET('/{crypto}','DashboardController@single_coin');*/
Route::GET('/coin/{crypto}','DashboardController@single_coin_new');
Route::GET('stock/{symbol}', 'StockController@dataCharts');
Route::GET('forex/{coins}', 'ForexController@dataCharts');

//route for testing
Route::GET('test','CoinController@newAPI');
//route for testing cron
Route::GET('test2','CoinController@cronUpdate2');