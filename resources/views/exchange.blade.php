@extends('Layout.master')

@section('title')

Exchange
@endsection


@section('meta')

<meta name="title" content="{{$market}} Exchange Trading Price, Market Cap, Volum">
<meta name="description" content="{{$market}} Exchange Trading Price, Market Cap, Trade volume, Charts, Community Discussion, Market Cap.">
<meta name="keywords" content="{{$market}} Price, Calculator, Exchange Trade, Volume, Market Cap
">

@endsection

@section('content')
<style>
body,html{
  font-family: arial;
}
  th{
    background: #e8ebef;
  }
  tr,th{
    height:50px;
  }
  #table_body,tbody{
    min-height: 500px;
  }
  
 
  #hig_incre{
   
    background:#146822;
    font-weight: bold;
    text-align: center;
    color:white;
    border-radius: 10px;
    width: 110px;
    height: 32px;  
    height: 25px;  position: absolute;

  }
   #hig_decre{
   background:#b51717;
    font-weight: bold;
    text-align: center;
    color:white;
    border-radius: 10px;
    border: 1px solid #e8e8e8;
    width: 110px;
    height: 32px;  
    height: 25px;  position: absolute;
  }

  td,th{
    text-align: center;
    
    position: relative;
  }
  .card-block {
    padding-bottom: 10px !important;
}
 div#table_body {
    min-height: 0px;
}
</style>

@if($ads->status==1)
<img src="{{url('/')}}/public/ad.jpg" style="margin-top: 25px;max-width: 950px;margin-left: 186px;">
@endif
<br>
                <div class="outer">

                    <div  class="inner bg-light lter bg-container" style="margin-top: 30px;">

                        <div class="row justify-content-center align-items-center">
                         
                            <div class="col-lg-10">
                            
                                <div class="card">

                                    <div class="card-header bg-white ">
                                        <input type="hidden" value="{{$market}}" id="market_id">
                                        <h3 class="color_class">{{$market}}</h3>
                                        <p>{{$desc}}
                                          @if($market == "BitBay")
                                            BitBay is one of the biggest cryptocurrency exchange in Europe. Powered by Unbreakable Smart Contracts and a Proof of Stake 3.0 cryptocurrency, BitBay enables you to buy and sell goods and services securely and anonymously, without the need for middlemen.
                                          @endif
                                        </p>
                                    </div>
                                    <div class="card-block">
                                      <h3 class="color_class" style="font-size: 24px;">Price Chart</h3>
                                        <center><div id="chartdiv"></div> </center>
                                        <div class="card-block flip-scroll">
                                          <div class="card-block flip-scroll">
                                            <h4 style="font-size: 24px;margin-left: -40px;">Cryptocurrencies traded in {{$market}}</h4>
                                            <div class="m-t-35 table-responsive">
                                              <div id="table_body"></div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div style="padding: 1.25rem;">
                                      <h4 style="font-size: 24px;">Discussion forum</h4>
                                        <div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: 

https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://http-18-191-39-172-cryptocompare.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<script type="text/javascript">
 
    var getMarket_name=$('#market_id').val();

    var api_url = window.location.protocol + "//" + window.location.host + "/getItemAjax";
    var api_url1 = window.location.protocol + "//" + window.location.host + "/coin/";
    var tst = window.location.protocol + "//" + window.location.host + "/getItemAjax/"+getMarket_name;


    //var start = '0';
    var g_data;
    setInterval(function(){ 
        // Ajax starts
        $.ajax({
            type: "GET",
            url: tst,
            dataType:'json',
            success: function(data){
                //start = data.start;
                               //alert(data);

                var temp = '<table id="example1" class="display table table-stripped table-bordered"> <thead class="flip-content"> <tr clas="coin"> <th>#</td><th>PAIR</th> <th>PRICE</th> <th class="numeric">24H VOLUME</th> <th class="numeric">24H VOLUME HIGH</th> <th class="numeric">24H VOLUME LOW</th></tr></thead> <tbody>';
                //temp += g_data;
                var i=1;
                data.forEach(function(element) {

                    var price_old = $("#id_"+element.PAIR_ID).val();
                    
                    //alert(price_old);
                    //price_old = parseFloat(price_old);
                    price_new = parseFloat(element.PRICE);

                   // price_old = price_old.replace('$','');
                    element.PRICE = element.PRICE;
                    
                    // alert(element.PRICE);
                    if (price_old < element.PRICE) { 
                        console.log("Value increased");
                       temp+="<input type='hidden' value='"+element.PRICE+"' id='id_"+element.PAIR_ID+"'>";

                        temp += '<tr> <td >'+i+'</td><td class="highlgt"><a href="'+api_url1+element.COIN+'"> &nbsp;&nbsp;'+element.PAIR+'</a></td><td id="'+element.PAIR_ID+'" ><div id="hig_incre">$ '+element.PRICE+'</div></td><td class="numeric">'+element.VOLUME24HOUR+'</td><td class="numeric">'+element.HIGH24HOUR+'</td><td class="numeric">'+element.LOW24HOUR+'</td></tr>';
                    }else if (price_old > element.PRICE){

                       console.log("Value decreased");
                       temp+="<input type='hidden' value='"+element.PRICE+"' id='id_"+element.PAIR_ID+"'>";
;
                        temp += '<tr> <td>'+i+'</td><td class="highlgt"><a href="'+api_url1+element.COIN+'"> &nbsp;&nbsp;'+element.PAIR+'</a></td><td id="'+element.PAIR_ID+'" ><div id= "hig_decre"> $ '+element.PRICE+'</div></td><td class="numeric">'+element.VOLUME24HOUR+'</td><td class="numeric">'+element.HIGH24HOUR+'</td><td class="numeric"> '+element.LOW24HOUR+' </td></tr>';
                    }else{
                         temp+="<input type='hidden' value='"+element.PRICE+"' id='id_"+element.PAIR_ID+"'>";
                        temp += '<tr> <td >'+i+'</td><td class="highlgt"><a href="'+api_url1+element.COIN+'"> &nbsp;&nbsp;'+element.PAIR+'</a></td><td id="'+element.PAIR_ID+'" >$ '+element.PRICE+'</td><td class="numeric">'+element.VOLUME24HOUR+'</td><td class="numeric">'+element.HIGH24HOUR+'</td><td class="numeric"> '+element.LOW24HOUR+' </td></tr>';
                    }
                   i++; 
                  
                });

                temp += '</tbody></table>';
                document.getElementById("table_body").innerHTML = temp;
            }
        });
        // end of ajax

    }, 2000);
   
</script>
<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 450px;
}
</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/amstock.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<script type="text/javascript">
    var chartData = generateChartData();

function generateChartData() {
  var chartData = [];
  var firstDate = new Date( 2012, 0, 1 );
  firstDate.setDate( firstDate.getDate() - 1000 );
  firstDate.setHours( 0, 0, 0, 0 );

  var a = 2000;
 
  for ( var i = 0; i < 1000; i++ ) {
    var newDate = new Date( firstDate );
    newDate.setHours( 0, i, 0, 0 );

    a += Math.round((Math.random()<0.5?1:-1)*Math.random()*10);
    var b = Math.round( Math.random() * 100000000 );

    chartData.push( {
      "date": newDate,
      "value": a,
      "volume": b
    } );
  }
  return chartData;
}

var n_chart_data = [];
   var getMarket_name=$('#market_id').val();
   var api_url="";
if(getMarket_name=="Binance"|| getMarket_name=="kucoin"||getMarket_name=="Cryptopia"||getMarket_name=="HitBTC"){

   api_url = "https://min-api.cryptocompare.com/data/histominute?fsym=LTC&tsym=BTC&limit=60&aggregate=3&e="+getMarket_name;
}else{
api_url = "https://min-api.cryptocompare.com/data/histominute?fsym=BTC&tsym=USD&limit=60&aggregate=3&e="+getMarket_name;
}


$.ajax({
            type: "GET",
            url: api_url,
            dataType:'json',
            success: function(data){
             
              data.Data.forEach(function(element) {
               
                var newDate = new Date(element.time*1000);
                n_chart_data.push( {
                  "date": newDate,
                  "value": element.high,
                  "volume": element.volumeto
                } );
              
              });
             

              var chart = AmCharts.makeChart( "chartdiv", {
  "type": "stock",
  "theme": "light",
  "categoryAxesSettings": {
    "minPeriod": "mm"
  },

  "dataSets": [ {
    "color": "#b0de09",
    "fieldMappings": [ {
      "fromField": "value",
      "toField": "value"
    }, {
      "fromField": "volume",
      "toField": "volume"
    } ],

    "dataProvider": n_chart_data,
    "categoryField": "date"
  } ],

  "panels": [ {
    "showCategoryAxis": false,
    "title": "Value",
    "percentHeight": 70,

    "stockGraphs": [ {
      "id": "g1",
      "valueField": "value",
      "type": "smoothedLine",
      "lineThickness": 2,
      "bullet": "round"
    } ],


    "stockLegend": {
      "valueTextRegular": " ",
      "markerType": "none"
    }
  }, {
    "title": "Volume",
    "percentHeight": 30,
    "stockGraphs": [ {
      "valueField": "volume",
      "type": "column",
      "cornerRadiusTop": 2,
      "fillAlphas": 1
    } ],

    "stockLegend": {
      "valueTextRegular": " ",
      "markerType": "none"
    }
  } ],

  "chartScrollbarSettings": {
    "graph": "g1",
    "usePeriod": "10mm",
    "position": "top"
  },

  "chartCursorSettings": {
    "valueBalloonsEnabled": true
  },

  "periodSelector": {
    "position": "top",
    "dateFormat": "YYYY-MM-DD JJ:NN",
    "inputFieldWidth": 150,
    "periods": [ {
      "period": "hh",
      "count": 1,
      "label": "1 hour"
    }, {
      "period": "hh",
      "count": 2,
      "label": "2 hours"
    }, {
      "period": "hh",
      "count": 5,
      "selected": true,
      "label": "5 hour"
    }, {
      "period": "hh",
      "count": 12,
      "label": "12 hours"
    }, {
      "period": "MAX",
      "label": "MAX"
    } ]
  },

  "panelsSettings": {
    "usePrefixes": true
  },

  "export": {
    "enabled": true,
    "position": "bottom-right"
  }
} );
              ////////////////////////////////////
            }
        });




</script>

<!-- HTML -->


@endsection('content')