<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Mail;

class bookingController extends Controller
{   
	public function bookingHistoryCustomer(Request $request, $id) {
		return view('booking_history_list',[ 'id' => $id ]);
	}

	public function checkAvailablity(Request $request) {
		$adult = $request->input('adult');
        $checkIn = $request->input('checkInDate');
        $checkOut = $request->input('checkOutDate');
        $child = $request->input('child');
        $room_count = $request->input('room');

        $adult_tot = 0;
        $child_tot = 0;
        $room_count = count($room_count);
        foreach ($adult as $key => $value) {
            $adult_tot += $value;
        }
        foreach ($child as $key2 => $chld) {
            $child_tot += $chld;
        }
      	//echo $checkOut.'<br>';
        $date1=date_create($checkIn);
		$date2=date_create($checkOut);
		$diff=date_diff($date1,$date2);
		$days = $diff->format("%a");
		//echo $days;
        $check = 0;
        $rooms = [];
        for($i=0;$i<=$days;$i++) {
            $checkdate = date('Y-m-d', strtotime($checkIn. ' +'.$i.'  days'));
            //echo $checkdate;
            $avail = DB::select('select * from booking_dates where full_date="'.$checkdate.'"');
            $roomtbl = DB::select('select * from rooms');
            if(count($avail) == 0) {
                $check = 1;
        	} else {
            	$check = 0;
        	}
        	foreach ($avail as $key => $valuer) {
            	$arr = array();

            	foreach($roomtbl as $key => $rm) {
            		$rid = $rm->room_id;
            		$roomname = explode('r', $rid);
            		$roomname = $roomname[0];
            		$arr[$roomname] = $valuer->$rid;
            	}
          		array_push($rooms,$arr);
        	}
      	}
      	//$arr = array('rooms'=> $rooms);
      	//echo json_encode($arr);
      	// echo $check;
      	if($check != 0) {
        	return redirect('room_booking')->with('error', 'No available Rooms. Please select other date.');
      	} else {
        	return view('booking_review',['input'=>$request->all(),'rooms'=>$rooms, 'adult_tot'=> $adult_tot, 'child_tot'=>$child_tot, 'room_count' =>$room_count]);
      	}
	}

	public function checkAvailablityAjax(Request $request) {
	    $checkIn = $request->input('checkIn');
	    $checkOut = $request->input('checkOut');
	    $room_type = $request->input('room_type');
	    $notInRooms = $request->input('notInRooms');
	    //Days calculation
	    $date1=date_create($checkIn);
		$date2=date_create($checkOut);
		$diff=date_diff($date1,$date2);
		$days = $diff->format("%a");

	    $roomsDb = DB::select("SELECT * FROM rooms");
	    //echo 'days'.$days;
	    $check = 0;
	    $rooms = [];
	    for($i=0;$i<=$days;$i++) {
	      $checkdate = date('Y-m-d', strtotime($checkIn. ' +'.$i.'  days'));
	      $avail = DB::select('select * from booking_dates where full_date="'.$checkdate.'"');
	      foreach ($avail as $key => $valuer) {
	        $arr = array();
	        foreach ($roomsDb as $roomkey => $room_id) {
	          //rooms r1,r2
	          $roomId = $room_id->room_id;
	          $arr[$roomId] = $valuer->$roomId;
	        }
	        array_push($rooms,$arr);
	      }
	    }
	    //echo json_encode($rooms);
	    $roomArr = array();
	    $arr = array();
	    foreach ($rooms as $key => $room) {
	      foreach ($roomsDb as $roomkey => $room_id) {
	        if($room[$room_id->room_id] != null) {
	          array_push($arr, $room_id->room_id);
	        }
	      }
	    }
	    //$notinId =  implode(",",$arr);
	    if($notInRooms != '') {
	    	$notInRooms = explode(',', $notInRooms);
	    	foreach ($notInRooms as $key => $value) {
	    		array_push($arr, $value);
	    	}
	    }
	    $notinId = "'" . implode ( "', '", $arr ) . "'";
	    $sql = DB::select("SELECT RM.type_name,RM.room_price,R.room_id FROM rooms AS R LEFT JOIN room_types AS RM ON RM.id= R.room_type WHERE RM.type_name='".$room_type."' AND R.room_id NOT IN (".$notinId.")");
	    $inArr = array();
	    if(count($sql) != 0){
	    	$inArr['room_id'] = $sql[0]->room_id;
	    	$inArr['room_type'] = $sql[0]->type_name;
	    	$inArr['room_price'] = $sql[0]->room_price;
	    }
	    array_push($roomArr,$inArr);
	    $finalArr = array("rooms"=> $roomArr);
	    if(count($inArr) != 0) {
	    	echo json_encode($finalArr);
	    } else {
	    	echo 'Room not Available';
	    }
	    
	}

	public function confirm(Request $request) {
      $adult = $request->input('adult');
      $adult_tot = $request->input('adult_tot');
      $child_tot = $request->input('child_tot');
      $checkIn = $request->input('checkIn');
      $checkOut = $request->input('checkOut');
      $child = $request->input('child');
      $room_count = $request->input('room');
      //echo ($request->input('room_count'));
      $room_code = $request->input('room_code');
      $room_ids = $request->input('room_id');
      $roomFinalArr = array();
      $total = 0;
      $tax = 0;
      foreach ($room_code as $key => $value) {
        $name = strtolower($value);
        $sql = DB::select("SELECT RM.type_name,RM.room_price,RM.extraPrice,RM.maxAdult,RM.room_tax FROM room_types AS RM WHERE RM.type_name='".$name."'");
        $arr = array();
        $extra = 0;
        $price = $sql[0]->room_price;
        if($adult[$key] > $sql[0]->maxAdult) {
          $extra = $sql[0]->extraPrice;
        } 
        $arr['room_price'] = $price;
        $arr['extra'] = $extra;
        $arr['room_code'] = $value;
        $arr['room_id'] = $room_ids[$key];
        $arr['adult'] = $adult[$key];
        $arr['child'] = $child[$key];
        $total += $price+$extra;
        $tax = $sql[0]->room_tax;
        array_push($roomFinalArr, $arr);
      }
      $taxamt = $total/100*$tax;
      $grand_total = $total+$taxamt;

      //echo json_encode($roomFinalArr);
      //var_dump($request->all());
      return view('confirm-booking',['request_data'=>$request->all(),'rooms'=>$roomFinalArr, 'grand_total' =>$grand_total, 'tax_amt' => $taxamt, 'total_amt' => $total ]);
    }

    public function payment(Request $request) {
	    $name = $request->input('name');
	    $email = $request->input('email');
	    $phone = $request->input('phone');
	    $address = $request->input('address');
	    $city =  $request->input('city');
	    $zip = $request->input('zip');
	    $room_codes = $request->input('room_code');
	    $room_ids = $request->input('room_id');
	    $room_price = $request->input('room_price');
	    $payment_amt = $request->input('payment_amt');
	    $tax_amt = $request->input('tax_amt');

	    $cust_id = 'admin';
	    $payment_id = $request->input('payment_id');
	    $trans_date = date('Y-m-d');
	    $order_time = date('h:m:s'); //razorpay get time
	    $checkin_date = $request->input('checkIn');
	    $checkout_date = $request->input('checkOut');
	    $adult_tot = $request->input('adult_tot');
	    $child_tot = $request->input('child_tot');
	    $adult = $request->input('adult');
	    $child = $request->input('child');
	    $booking_mode = $request->input('pay');

	    $pay_method = $request->input('pay_method');
	    $advance_amount = $request->input('amount');
	    //Days calculation
	    $date1=date_create($checkin_date);
		$date2=date_create($checkout_date);
		$diff=date_diff($date1,$date2);
		$days = $diff->format("%a");

		$total_amt = $payment_amt;
		$db_total = $payment_amt - $tax_amt;
	    $balance = 0;
	    $balance_amt = 0;
	    if($pay_method == 'advance') {
	    	$balance_amt = $total_amt - $advance_amount;
	    	$payment_amt = $advance_amount;
	    	$balance = 1;
	    }


	    //$pVal = array($trans_date,'Online',$cust_id,$checkin_date,$checkout_date, json_encode($room_codes));
	    $noPersons = $adult_tot+$child_tot;
	    $room_id = implode(',', $room_ids);
	    $rcount = count($room_ids);
	    $id = DB::table('booking')->insertGetId(
	            ['booking_date' => $trans_date, 'booking_mode' => $booking_mode, 'customer_id' => $cust_id, 'check_in_date'=> $checkin_date, 'check_out_date' => $checkout_date, 'room_id'=>$room_id,'total_rooms'=> $rcount, 'guest_name' => $name, 'guest_email'=> $email, 'guest_phone' => $phone, 'guest_address' => $address, 'guest_city' =>$city , 'guest_zip' => $zip, 'total_persons' => $noPersons ]);
	    $bill_no = 'B'.$id;
	    $trans_id = DB::table('transactions')->insertGetId(
	            ['booking_id' => $id, 'customer_id' => $cust_id, 'gateway_transaction_id' => $payment_id, 'payment_mode'=> $booking_mode, 'bill_amount' => $payment_amt, 'payment_received'=> $pay_method,'bill_no'=> $bill_no, 'total_amount' => $db_total, 'tax_amount' => $tax_amt ]);

	   	$payment_details = DB::table('payment_details')->insertGetId(
	            ['booking_id' => $id, 'type' => '1', 'pay_amount' => $payment_amt, 'total_amount'=> $total_amt, 'balance' => $balance ]);

	    for($i=0;$i<=$days;$i++) {
	      $checkdate = date('Y-m-d', strtotime($checkin_date. ' +'.$i.'  days'));
	      foreach($room_ids as $key => $rid) {
	        $avail = DB::select('UPDATE booking_dates SET '.$rid.' = "B" where full_date="'.$checkdate.'"');
	      }
	    }

	    $filename = 'proof'.$id.'.jpg';
		$path = 'storage/app/booking_proof/'.$filename;

		if ($request->hasFile('proof')) {
    		$photot = $request->file('proof')->storeAs(
			    'booking_proof', $filename, 'local'
			);
			$data = DB::select("UPDATE booking SET photo_proof = '".$path."' WHERE id= '".$id."'");
		}

	    $roomFinalArr = array();
	    $grand_total = 0;
	    foreach ($room_codes as $key => $value) {
	      $name = strtolower($value);
	      $sql = DB::select("SELECT RM.type_name,RM.room_price, RM.extraPrice,RM.maxAdult FROM room_types AS RM WHERE RM.type_name='".$name."'");
	      $arr = array();
	      $extra = 0;
	      $price = $sql[0]->room_price;
	      if($adult[$key] > $sql[0]->maxAdult) {
	        $extra = $sql[0]->extraPrice;
	      } 
	      $arr['room_price'] = $price;
	      $arr['extra'] = $extra;
	      $arr['room_code'] = $value;
	      $arr['adult'] = $adult[$key];
	      $arr['child'] = $child[$key];
	      $grand_total += $price+$extra;
	      array_push($roomFinalArr, $arr);
	    }

	    $inputarr = array('name' => $request->input('name'), 'phone' => $request->input('phone'), 'address' => $request->input('address'), 'city' => $request->input('city'), 'checkIn' => $request->input('checkIn'), 'checkOut' => $request->input('checkOut'),'payment_id' => $request->input('payment_id'), 'adult_tot' => $request->input('adult_tot'), 'child_tot'=>$request->input('child_tot'), 'pay_method' => $request->input('pay_method'), 'tax_amt' => $request->input('tax_amt'),'net_amt' => $db_total);

	    $ssdata = array('booking_id' => $id, 'input' => $inputarr, 'rooms' => $roomFinalArr, 'payment_amt' =>$payment_amt, 'pay_method' => $pay_method, 'balance_amt' => $balance_amt, 'bill_no'=> $bill_no, 'bill_date' => $trans_date,'total_amt' => $total_amt );

	    Mail::send('emails.invoice',$ssdata,function($message)use($email,$name) {
	        $message->to($email, $name)->subject('Your Booking Invoice');
	        $message->from('renukasan30@gmail.com','Amazing Valley Resort');
	    });


	    //return redirect('dashboard');
	    //echo 'test';
	    $request->session()->push('checkout', $ssdata);
	    return view('bookingconfirmed',['success'=>true,'data' => $ssdata, 'rooms' => $roomFinalArr, 'payment_amt'=>$payment_amt, 'pay_method' => $pay_method, 'bill_no' => $bill_no,'bill_date' => $trans_date, 'total_amt' => $total_amt, 'balance_amt' => $balance_amt ]);
	}

	public function openBooking(Request $request) {
	    $startDate = $request->input('startDate');
	    $endDate = $request->input('endDate');

	    $date = explode("-", $startDate);
            $date2 = explode("-", $endDate);

	    $startDate = $date[0].'-'.$date[1].'-'.$date[2];
        $endDate = $date2[0].'-'.$date2[1].'-'.$date2[2];
        $date1=date_create($startDate);
		$date2=date_create($endDate);
		$diff=date_diff($date1,$date2);
		$days = $diff->format("%a");

	    $roomsDb = DB::select("SELECT * FROM rooms");
	    $check = 0;
	    $rooms = [];
	    for($i=0;$i<=$days;$i++) {
	        $checkdate = date('Y-m-d', strtotime($startDate. ' +'.$i.'  days'));
	        $avail = DB::select('select * from booking_dates where full_date="'.$checkdate.'"');
	        if(count($avail) == 0 ) {
	        	$weekDay = date('w', strtotime($checkdate));
	        	$weekend =  ($weekDay >= 6) ? 1 : 0;
	        	$date = explode("-",$checkdate);
	        	$quarter = 4;
			    if ($date[1] <= 3) {
			    	$quarter = 1;	
			    } else if ($date[1] <= 6) {
			    	$quarter = 2;
			    } else if ($date[1] <= 9) { 
			    	$quarter =  3; 
			    }
	        	$iddate = implode('', $date);
	        	$id = DB::table('booking_dates')->insertGetId(['id_date' => $iddate, 'full_date' => $checkdate, 'year'=> $date[0], 'month' =>$date[1], 'day' => $date[2], 'quarter' => $quarter, 'day_of_week'=> $weekDay, 'weekend' => $weekend ]);
	        }
	    }
        return redirect('open_booking')->with('success', 'Booking Opened for given dates.');
	}

	public function invoice(Request $request) {
	    $sdata = $request->session()->get('checkout');
	    //echo json_encode($sdata);
	    $data = [
	        'data' => $sdata
	    ];
	    $pdf = PDF::loadView('invoice', $data);
	    $request->session()->forget('checkout');
	    return $pdf->stream('invoice.pdf');
	}

	public function bookinghistoryAjax(Request $request) {
		$id = $request->input('user_id');
		$start = $request->input('start');
		$length = $request->input('length');
		$draw = $request->input('draw');

		$booking = DB::select("SELECT * FROM booking WHERE MONTH(check_in_date) = MONTH(CURRENT_DATE()) LIMIT ".$start.",".$length."");
		$cnt = DB::select("SELECT count(*) AS cnt FROM booking WHERE MONTH(check_in_date) = MONTH(CURRENT_DATE())");
		if($id != '') {
			$booking = DB::select("SELECT * FROM booking WHERE customer_id = '".$id."' LIMIT ".$start.",".$length."");
			$cnt = DB::select("SELECT count(*) AS cnt FROM booking WHERE customer_id = '".$id."' ");
		}
		
        $finalArr = array();
        foreach ($booking as $key => $data) {
	        $arr = array( $data->id , $data->check_in_date , $data->check_out_date, $data->booking_date );
	        array_push($finalArr,$arr);
	    }
		$tableArr =  array('draw'=>$draw,'recordsTotal'=>$cnt[0]->cnt, 'recordsFiltered'=>$cnt[0]->cnt, 'data'=>$finalArr);
		echo json_encode($tableArr);
	}

	public function recentBookinghistoryAjax(Request $request) {
		$start = $request->input('start');
		$length = $request->input('length');
		$draw = $request->input('draw');

		$booking = DB::select("SELECT * FROM booking WHERE CURRENT_DATE() >= check_in_date AND CURRENT_DATE() <= check_out_date LIMIT ".$start.",".$length."");
		$cnt = DB::select("SELECT count(*) AS cnt FROM booking");
        $finalArr = array();
        foreach ($booking as $key => $data) {
	        $arr = array( $data->id , $data->check_in_date , $data->check_out_date, $data->booking_date );
	        array_push($finalArr,$arr);
	    }
		$tableArr =  array('draw'=>1,'recordsTotal'=>$cnt[0]->cnt, 'recordsFiltered'=>$cnt[0]->cnt, 'data'=>$finalArr);
		echo json_encode($tableArr);
	}

	public function singleBookingView(Request $request, $booking_id) {
		$data = DB::select("SELECT  B.*,C.name AS customer_name, T.payment_mode, T.bill_amount FROM booking AS B LEFT JOIN customers AS C ON C.id= B.customer_id JOIN transactions AS T ON T.booking_id = B.id WHERE B.id='".$booking_id."'");
		$payment_det = DB::select("SELECT * FROM payment_details WHERE booking_id = '".$booking_id."' ");
		$paymentArr = array();
		$balancePay = 'Yes';
		$total_paid = 0;
		foreach ($payment_det as $key => $pty) {
			$innerarr = array();
			$innerarr['id'] = $pty->id;
			$innerarr['total_amount'] = $pty->total_amount;
			$innerarr['paid_amount'] = $pty->pay_amount;
			$total_paid = $total_paid+$pty->pay_amount;
			$innerarr['balance'] = $pty->balance;
			$innerarr['created_at'] = $pty->created_at;
			array_push($paymentArr, $innerarr);
			if($pty->balance == 0) {
				$balancePay = 'No';
			}
		}
		$finalArr = array();
		foreach ($data as $key => $value) {
			$arr = array();
			$arr['booking_id'] = $value->id;
			$arr['booking_date'] = $value->booking_date;
			$arr['check_in_date'] = $value->check_in_date;
			$arr['check_out_date'] = $value->check_out_date;
			$arr['customer_name'] = $value->customer_name;
			$arr['guest_name'] = $value->guest_name;
			$arr['guest_phone'] = $value->guest_phone;
			$arr['room_id'] = $value->room_id;
			$arr['payment_mode'] = $value->payment_mode;
			$arr['total_amount'] = $payment_det[0]->total_amount;
			$arr['proof'] = $value->photo_proof;
			$arr['bill_amount'] = $total_paid;
			$arr['balance_amt'] = $payment_det[0]->total_amount-$total_paid;
			$arr['balance'] = $balancePay;
			array_push($finalArr, $arr);
		}
		return view('single_booking_view',['data'=> $finalArr, 'payment' => $paymentArr ]);
	}

	public function recentsingleBooking(Request $request, $booking_id) {
		$data = DB::select("SELECT  B.*,C.name AS customer_name, T.payment_mode, T.bill_amount FROM booking AS B LEFT JOIN customers AS C ON C.id= B.customer_id JOIN transactions AS T ON T.booking_id = B.id WHERE B.id='".$booking_id."'");
		$payment_det = DB::select("SELECT * FROM payment_details WHERE booking_id = '".$booking_id."' ");
		$balancePay = 'Yes';
		$paymentArr = array();
		$balance_amt = 0;
		$total_paid = 0;
		foreach ($payment_det as $key => $pty) {
			$innerarr = array();
			$innerarr['id'] = $pty->id;
			$innerarr['total_amount'] = $pty->total_amount;
			$innerarr['paid_amount'] = $pty->pay_amount;
			$total_paid = $total_paid+$pty->pay_amount;
			$innerarr['balance'] = $pty->balance;
			$innerarr['created_at'] = $pty->created_at;
			//$balance_amt = $balance_amt+$pty->pay_amount;
			array_push($paymentArr, $innerarr);
			if($pty->balance == 0) {
				$balancePay = 'No';
			}
		}
		$finalArr = array();
		foreach ($data as $key => $value) {
			$arr = array();
			$arr['booking_id'] = $value->id;
			$arr['booking_date'] = $value->booking_date;
			$arr['check_in_date'] = $value->check_in_date;
			$arr['check_out_date'] = $value->check_out_date;
			$arr['customer_name'] = $value->customer_name;
			$arr['guest_name'] = $value->guest_name;
			$arr['guest_phone'] = $value->guest_phone;
			$arr['room_id'] = $value->room_id;
			$arr['payment_mode'] = $value->payment_mode;
			$arr['bill_amount'] = $total_paid;
			$arr['balance_amt'] = $payment_det[0]->total_amount-$total_paid;
			$arr['balance'] = $balancePay;
			$arr['total_amount'] = $payment_det[0]->total_amount;
			$arr['total_persons'] = $value->total_persons;
			$arr['proof'] = $value->photo_proof;
			array_push($finalArr, $arr);
		}
		return view('recent_single_booking',['data'=> $finalArr, 'payment' => $paymentArr ]);
	}

	public function balancePay(Request $request) {
		$booking_id = $request->input('booking_id');
		$amount = $request->input('amount');
		$payment_type = $request->input('pay');
		$total_amount = $request->input('total_amount');
		//check_in_date, check_out_date
		
		$bill_no = 'B'.$booking_id.'T'.$amount;
		$paidamt = DB::select("SELECT SUM(pay_amount) as amt FROM payment_details WHERE booking_id = '".$booking_id."'" );
		$balas =  $total_amount - $paidamt[0]->amt - $amount;
		$balance = ($balas == 0) ? '0' : '1';
	    $trans_id = DB::table('transactions')->insertGetId(['booking_id' => $booking_id, 'customer_id' => 'admin', 'gateway_transaction_id' => 'null', 'payment_mode'=> $payment_type, 'bill_amount' => $amount, 'payment_received'=> 'balance','bill_no'=> $bill_no ]);
	   	$payment_details = DB::table('payment_details')->insertGetId(['booking_id' => $booking_id, 'type' => '1', 'pay_amount' => $amount, 'total_amount'=> $total_amount, 'balance' => $balance ]);
	   	$ssdata = array('input' => $request->all(), 'previous_paid' => $paidamt[0]->amt);
	   	$request->session()->push('balanceCheckout', $ssdata);

	   	return view('balance-payment',['input'=> $request->all(), 'previous_paid' => $paidamt[0]->amt ]);
	}

	public function balanceInvoice(Request $request) {
	    $sdata = $request->session()->get('balanceCheckout');
	    //echo $sdata['previous_paid'];
	    $data = [
	        'data' => $sdata
	    ];
	    $pdf = PDF::loadView('balance-invoice', $data);
	    $request->session()->forget('balanceCheckout');
	    return $pdf->stream('invoice.pdf');
	}

	public function extendDate(Request $request) {
		$days = $request->input('days');
		$check_out_date = $request->input('check_out_date');
		$check_in_date = $request->input('check_in_date');
		$total_amount = $request->input('total_amount');
		$room_ids = $request->input('room_ids');
		$booking_id = $request->input('booking_id');
		$arr = array($room_ids);
		$ids = "'" . implode ( "', '", $arr ) . "'";
		$amt = DB::select("SELECT SUM(room_price) AS price FROM room_types AS RT JOIN rooms AS R ON R.room_type = RT.id WHERE R.room_id IN (".$ids.") ");

		$updttotal = $amt[0]->price*$days+$total_amount;
		$updtCheckout = date('Y-m-d', strtotime($check_out_date . ' +'.$days.' day'));
		$rs_id = explode(',', $room_ids);
		foreach ($rs_id as $key => $rid) {
			$avail = DB::select('UPDATE booking_dates SET '.$rid.' = "B" where full_date="'.$updtCheckout.'"');
		}
		$payment_update = DB::select("UPDATE payment_details SET total_amount = ".$updttotal." WHERE booking_id = '".$booking_id."'");
		$booking_detail = DB::select("UPDATE booking SET check_out_date = '".$updtCheckout."', old_check_out_date = '".$check_out_date."' WHERE id = '".$booking_id."'");

		return redirect('recent_booking_history');

	}

	public function addReserved(Request $request) {
		$date = $request->input('date');
		$room = $request->input('room');
		$data = DB::select("SELECT * FROM booking_dates WHERE full_date= '".$date."' ");
		if(count($data) != 0 ) {
			$value = '';
			if($data[0]->$room == null) {
				$value = 'R';
			} else if($data[0]->$room == 'R') {
				$value = NULL;
			}
			$data = DB::select("UPDATE booking_dates SET ".$room." = '".$value."'  WHERE full_date= '".$date."' ");
		}
	}

	public function bookingHistory(Request $request) {
		$requestDta = $request->all();
		return view('booking_history_search',[ 'requestData' => $requestDta ]);
	}

	public function bookingHistorySearch(Request $request) {
		$startDate = $request->input('startDate');
		$endDate = $request->input('endDate');
		$start = $request->input('start');
		$length = $request->input('length');
		$draw = $request->input('draw');

		$booking = DB::select("SELECT * FROM booking WHERE booking_date BETWEEN '".$startDate."' AND '".$endDate."' LIMIT ".$start.",".$length."");
		$cnt = DB::select("SELECT count(*) AS cnt FROM booking WHERE booking_date BETWEEN '".$startDate."' AND '".$endDate."'");
				
        $finalArr = array();
        foreach ($booking as $key => $data) {
	        $arr = array( $data->id , $data->check_in_date , $data->check_out_date, $data->booking_date );
	        array_push($finalArr,$arr);
	    }
		$tableArr =  array('draw'=>$draw,'recordsTotal'=>$cnt[0]->cnt, 'recordsFiltered'=>$cnt[0]->cnt, 'data'=>$finalArr);
		echo json_encode($tableArr);
	}
}
