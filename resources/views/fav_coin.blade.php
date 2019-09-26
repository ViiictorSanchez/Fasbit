@extends('Layout.master') @section('title') Cryptocompare dashboard @endsection @section('content')
<br>
<br>
<div class="text-center">
    <h2> welcome {{Session::get( 'user_name' ) }}</h2>
    <h6><strong>Select Your Favorite Coins</strong></h6>
    <p><small>
Choose your favorite coins to follow by clicking on the coins.</small>
    </p>
    <form name="fov_coin" action="{{URL('/')}}/add_fav_coin" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <center>
            <button type="submit" class="btn btn-block" style="width: 80%;background: #8dc647;color: white;font-weight: bold">Save</button>
        </center>
        <br>
</div>
<div class="container pages" style="margin-top: 35px">
    <div class="unobtrusive-flash-container"></div>
    <div class="row">
        @foreach($data as $d)
        <div class="col-12 col-lg-3 col-md-6 col-12 m-t-35 coin-box">
            <input type="checkbox" name="coin_id[]" value="{{$d->id}}" id="check-{{$d->id}}">
            <label for="check-{{$d->id}}">
                <div class="image">
                    <img src="{{$d->image_url}}" alt="Image missing" class="img-fluid rounded-circle" width="100">
                </div>
                <h5 class="name">{{$d->name}}</h5>
            </label>
        </div>
        @endforeach
    </div>
    <br>
    <br>
</div>
</form>
@endsection