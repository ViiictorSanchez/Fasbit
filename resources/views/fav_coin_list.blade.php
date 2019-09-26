@extends('Layout.master') @section('title') {{$title->value}} | User Dashboard @endsection @section('content')
<input type="hidden" id="user" value="{{Session::get( 'user_id' )}}">
<div class="container pages" style="margin-top: 35px">
    <div class="unobtrusive-flash-container"></div>
    <div class="card-block flip-scroll">
        <div class="m-t-35 table-responsive">
            <center><span style="display:none" id="no_coin"> No Favourite Coins Addded , Click Manage to Start Adding your coins </span> </center>
            </span>
            <a href="{{URL('/')}}/fav_coin">
                <input type="button" class="btn btn-large  mr-1" style="float:right;background: #8dc647; font-weight: bold;color:white" value="Manage Coins">
            </a>
            <br>
            <br>
            <div class="home-table">
                <div id="table_body"></div>
            </div>
        </div>
    </div>
</div>
<script>
var user = $('#user').val();
var api_url = window.location.protocol + "//" + window.location.host + "/getItemAjax/fav_coin/load/" + user;
var api_url1 = window.location.protocol + "//" + window.location.host + "/";

var start = '0';
var g_data;
setInterval(function() {
    // Ajax starts
    console.log(api_url);
    $.ajax({
        type: "GET",
        url: api_url,
        dataType: 'json',
        success: function(data) {
            //  start = data.start;
            console.log(data);
            //alert(data);
            if (data.length == 0) {
                $('#no_coin').show();
                temp = "";
            } else {
                var temp = '<table id="example1" class="table "> <thead class="flip-content"> <tr> <th>Cryptocurrency</th> <th>Price</th> <th class="numeric">24h % change</th> <th class="numeric">Volume</th> <th class="numeric">Market cap</th> <th class="numeric">24h performence</th> </tr></thead> <tbody>';
                //temp += g_data;
                //alert();

                data.forEach(function(element) {


                    var price_old = $("#id_" + element.id).val();
                    //price_old = parseFloat(price_old);
                    price_new = parseFloat(element.price);

                    //price_old = price_old.replace('$','');
                    element.price = element.price.replace('$', '');
                    console.log(price_old);
                    // alert(element.price);
                    var t_url = '"' + api_url1 + element.id + '?name=' + element.name + '"';
                    if (price_old < element.price) {
                        temp += "<input type='hidden' value='" + element.price + "' id='id_" + element.id + "''>";
                        console.log("Value increased");


                        temp += '<tr onclick="test(' + element.id + ');" style="background-color: #8acc8a;"> <td> <img src="' + element.image_url + '" height="16" width="16"><a href="' + api_url1 + element.id + '?name=' + element.name + '">&nbsp;&nbsp;' + element.name + '</a></td><td id="' + element.id + '">' + element.price + '</td><td class="numeric">' + element.percent_change_24h + '</td><td class="numeric">' + element.volume_24h + '</td><td class="numeric">' + element.market_cap + '</td><td class="numeric"> <img height="50" style="border: 1px solid #eee;" width="150" src="' + element.chart_image + '"> </td></tr>';
                    } else if (price_old > element.price) {
                        temp += "<input type='hidden' value='" + element.price + "' id='id_" + element.id + "''>";
                        console.log("Value decreased");
                        temp += '<tr onclick="test(' + element.id + ');" style="background-color: #e46565;"> <td> <img src="' + element.image_url + '" height="16" width="16"><a href="' + api_url1 + element.id + '?name=' + element.name + '">&nbsp;&nbsp;' + element.name + '</a></td><td id="' + element.id + '">' + element.price + '</td><td class="numeric">' + element.percent_change_24h + '</td><td class="numeric">' + element.volume_24h + '</td><td class="numeric">' + element.market_cap + '</td><td class="numeric"> <img height="50" style="border: 1px solid #eee;" width="150" src="' + element.chart_image + '"> </td></tr>';
                    } else {
                        temp += "<input type='hidden' value='" + element.price + "' id='id_" + element.id + "''>";

                        temp += '<tr onclick="test(' + element.id + ');"> <td> <img src="' + element.image_url + '" height="16" width="16"><a href="' + api_url1 + element.id + '?name=' + element.name + '">&nbsp;&nbsp;' + element.name + '</a></td><td id="' + element.id + '">' + element.price + '</td><td class="numeric">' + element.percent_change_24h + '</td><td class="numeric">' + element.volume_24h + '</td><td class="numeric">' + element.market_cap + '</td><td class="numeric"> <img height="50" style="border: 1px solid #eee;" width="150" src="' + element.chart_image + '"> </td></tr>';
                    }


                });
            }

            temp += '</tbody></table><div id="pagination"></div>';

            document.getElementById("table_body").innerHTML = temp;

        }

    });
}, 3000);
</script>
@endsection