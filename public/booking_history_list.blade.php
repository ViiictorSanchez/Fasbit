@extends('Layout.Master')

@section('title','Amazing Valley Resort')

@section('MainContent')
<div class="content-main">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/jquery.dataTables.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/responsive.dataTables.min.css')}}" />
	<script src="{{URL::asset('public/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
	<script>
		 var editor; 
		$(document).ready( function () {
			var id = '<?php if(isset($id)){ echo $id; } else { echo ""; } ?>';
	    	$('#booking_his_list').DataTable( {
	            "scrollX": true,
		        "processing": true,
		        "serverSide": true,
		        "ajax": {
		        	"url": "{{url('/bookinghistoryAjax')}}",
		        	"data": {'user_id': id},
		        },
		        
		        "columnDefs": [{
		            "targets": -1,
		            "data": function ( row, type, val, meta ) {
	                    return row.id;
	                    },
		            "render": function ( data, type, row ) {
	                    return "<a href='{{url('/')}}/single_booking_view/"+row[0]+"' class='btn btn-success'>view</a>";
	                } 
	        	}]
		    } );
		} );
	</script>
	<div class="content-top">
		<div class="banner">
			<h2>
				<a href="{{url('/dashboard')}}">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Booking History</span>
			</h2>
		</div>
		<div class="grid-form">
			<div class="grid-form1">
                <h4 id="forms-example" class="">Booking History</h4>
                {!! Form::open(['url' => url('bookingHistory'),'method' => 'post', 'id' =>'login_form_id']) !!}
            <div class="col-md-12 vali-form">
	            <div class="col-md-4 form-group1">
	              <label class="control-label ">Start Date</label>
	              <input type="date" class="form-control1" id="start" name="startDate" required>
	            </div>
	            <div class="col-md-4 form-group1 last">
	              <label class="control-label">End Date</label>
	              <input type="date" class="form-control1" id="end" name="endDate" required>
	            </div>
	            <div class="col-md-4 form-group1">
	            	<button type="submit" id="submit" class="btn btn-primary mt-30" >Submit</button>
	        	</div>
	           {!! Form::close() !!}
	        </div>
	           	<div class="clearfix"> </div>
            <div class="clearfix"> </div>
            <div class="content-top-1">
				<table id="booking_his_list" class="display" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>Booking Id</th>
		                <th>Check In Date</th>
		                <th>Check Out Date</th>
		                <th>Booking Date</th>
		                <th>Actions</th>
		            </tr>
		        </thead>
		        <tbody>
		            <tr>
		                
		            </tr>
		        </tbody>
		    </table>
		</div>
    
			</div><div class="clearfix"></div>
		</div><div class="clearfix"></div>
	</div>
</div>
@endsection