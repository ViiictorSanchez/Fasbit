<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InsertData;

class insertController extends Controller
{
    //
    public function insert(){

		   	 $final_data = array();

		$api_core_data = file_get_contents("https://www.cryptocompare.com/api/data/coinlist/");
		$decoded = json_decode($api_core_data);
		$i = 0;
		//if ($request->start) {
		//$j = $request->start;
		//}else{
		$j = 500;
		//}

		$m = $j + 10;
		foreach ($decoded->Data as $key => $value) {

				if ($i > $j) {
					$coin_name = $value->Name;
					$chart_image = "https://images.cryptocompare.com/sparkchart/".$value->Name."/USD/latest.png?ts=".microtime(true);
					$coin_image = "https://www.cryptocompare.com".$value->ImageUrl;
					$p_url = "https://min-api.cryptocompare.com/data/pricemultifull?fsyms=".$coin_name."&tsyms=USD";
					$coin_det_api = file_get_contents($p_url);
					$coin_details = json_decode($coin_det_api);

					$new=new InsertData();
					$send=$new->addToTable($api_core_data);

					$final_data[] = array(
						'id' => $value->Id,
						'name' => $coin_name,
						'price' => $coin_details->DISPLAY->$coin_name->USD->PRICE,
						'percent_change_24h' => $coin_details->DISPLAY->$coin_name->USD->CHANGEPCT24HOUR,
						'volume_24h' => $coin_details->DISPLAY->$coin_name->USD->VOLUME24HOUR,
						'market_cap' => $coin_details->DISPLAY->$coin_name->USD->MKTCAP,
						'image_url' => $coin_image,
						'chart_image' => $chart_image
					);
					if ($i >= $m) {
						$j = $j + 6;
						return response()->json(['start'=>$j,'status'=>'SUCCESS','data'=>$final_data]);exit;
					}
				} 

			$i++;
			$i = $i + 1;
		}
}


}
