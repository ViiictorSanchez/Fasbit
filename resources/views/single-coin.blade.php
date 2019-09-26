@extends('Layout.master') 

@section('title') {{$data->General->H1Text}} Price, Calculator, Mining details @endsection 

@section('meta')

<meta name="title" content="{{$l_name}} ( {{$name}} ) Price, Calculator, Mining details">
<meta name="description" content="{{$l_name}} ( {{$name}} ) Price, Currency Calculator, Mining Calculator, Charts, Community Discussion, Trade volume, Market Cap and Exchanges traded.">
<meta name="keywords" content=" {{$l_name}} ( {{$name}} ) Price, Calculator, Exchange Trade, Volume, Market Cap
">

@endsection

@section('content')
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/amstock.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<style type="text/css">
th {
    background: #e8ebef;
}

tr {
    height: 50px;
}

#chartdiv {
    width: 100%;
    height: 500px;
}

.nav-item {
    color: ;
}

.poweredByWrapper {
    display: none;
}

.center {
    margin: auto;
    padding: 10px;
}

.tab-pane {
    font-family: arial;
    line-height: 250%;
    text-indent: 10px;
}

table,
tbody {
    min-height: 500px;
}

@media screen and (max-width: 400px) {
    .center {
        width: 100%;
        clear: both;
        margin-left: 0;
        padding: 10px;
    }
}

#show {
    display: none;
}

@media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
    #price_here {
        display: none;
    }
    #show {
        display: block;
        margin-left: 25px;
    }
}

#hig_incre {

    background: #146822;
    font-weight: bold;
    text-align: center;
    color: white;
    border-radius: 10px;
    width: 110px;
    height: 32px;
    height: 25px;
    position: absolute;
}

#hig_decre {
    background: #b51717;
    font-weight: bold;
    text-align: center;
    color: white;
    border-radius: 10px;
    border: 1px solid #e8e8e8;
    width: 110px;
    height: 32px;
    height: 25px;
    position: absolute;
}

td,
th {
    width: 100px;
    position: relative;
}
.ccc-widget.ccc-converter div:nth-child(1) {
    background-color: #eee !important;
}
div.fluid-container {
    padding-left: 50px;
    padding-right: 42px;
}
img.single-img-pro {
    /*margin-top: -560px;*/
        padding-top: 25px;
}
img.single-img-pro {
        padding-top: 50px;
}
.histoTitleConverter {
    display: none !important;
}
</style>
<div id="wrap">
    <div class="wrapper">
        <div id="content" class="container">
            <div class="row">
                @if($ads1->status == 1)
                <div class="col-md-10">   
                @else
            <div class="col-md-12">   
                @endif
            @if($ads->status==1)
            <img class="banner-img" src="{{url('/')}}/public/ad.jpg"> @endif
            <br>
            <br>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-4 col-sm-8 col-xs-12">
                    <div class="coin-section">
                        <div class="left">
                            <img src="{{$data->SEO->BaseUrl}}{{$data->SEO->OgImageUrl}}" alt="Image missing" class="img-fluid   rounded-circle" width="100">
                        </div>
                        <div class="content">
                            <h3>{{$data->General->H1Text}}</h3> @if($markat_cap)
                            <p>MARKET CAPITALIZATION
                                <span class="highlgt"><strong> $ {{number_format($markat_cap,2)}}</strong></span></p>
                            <p>24 HOUR TRADING VOLUME
                                <span class="highlgt"><strong> $ {{number_format($volume_24h,2)}}</strong></span></p>
                            <p>Website : <a href="{{$data->General->WebsiteUrl}}" target="_blank" class="highlgt">{{$data->General->WebsiteUrl}}</a></p> @endif
                            <input id="price" type="hidden" value="{{$price}}">
                            <input id="name_coin" type="hidden" value="{{$data->General->Name}}">
                        </div>
                    </div>
                    <div id="show">
                        <div class="col-md-12 center">
                            
                                <script type=" text/javascript ">
                                baseUrl = "https://widgets.cryptocompare.com/ ";
                                var scripts = document.getElementsByTagName("script");
                                var embedder = scripts[scripts.length - 1];
                                var cccTheme = { "Chart ": { "labelBackground ": "green ", "fillColor ": "#8dc647 ", "borderColor ": "green " }, "Trend ": { "background ": "trans ", "colorUp ": "#8dc647 ", "colorUnchanged ": "#8dc647 " } };
                                (function() {
                                    var appName = encodeURIComponent(window.location.hostname);
                                    if (appName == " ") { appName = "local "; }
                                    var s = document.createElement("script");
                                    s.type = "text/javascript ";
                                    s.async = true;
                                    var theUrl = baseUrl + 'serve/v1/coin/header?fsym=BTC&tsyms=USD,CNY,EUR,GBP';
                                    s.src = theUrl + (theUrl.indexOf("? ") >= 0 ? "& " : "? ") + "app=" + appName;
                                    embedder.parentNode.appendChild(s);
                                })();
                                </script>
                            
                        </div>
                    </div>
                </div>
                <div class=" col-md-8 col-sm-6 col-xs-12">
                  <div id="price_here">
                        <br>
                        <div>
                            <script type="text/javascript">
                            baseUrl = "https://widgets.cryptocompare.com/";
                            var scripts = document.getElementsByTagName("script");
                            var embedder = scripts[scripts.length - 1];
                            var cccTheme = { "Chart": { "labelBackground": "green", "fillColor": "#8dc647", "borderColor": "green" }, "Trend": { "background": "trans", "colorUp": "#8dc647", "colorUnchanged": "#8dc647" } };
                            (function() {
                                var appName = encodeURIComponent(window.location.hostname);
                                if (appName == "") { appName = "local"; }
                                var s = document.createElement("script");
                                s.type = "text/javascript";
                                s.async = true;
                                var theUrl = baseUrl + 'serve/v1/coin/header?fsym=BTC&tsyms=USD,CNY,EUR,GBP';
                                s.src = theUrl + (theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
                                embedder.parentNode.appendChild(s);
                            })();
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div id="show">
                <div class="col-md-12 center">
                    <script type="text/javascript">
                    baseUrl = "https://widgets.cryptocompare.com/";
                    var scripts = document.getElementsByTagName("script");
                    var embedder = scripts[scripts.length - 1];
                    var cccTheme = { "Chart": { "labelBackground": "green", "fillColor": "#8dc647", "borderColor": "green" }, "Trend": { "background": "trans", "colorUp": "#8dc647", "colorUnchanged": "#8dc647" } };
                    (function() {
                        var appName = encodeURIComponent(window.location.hostname);
                        if (appName == "") { appName = "local"; }
                        var s = document.createElement("script");
                        s.type = "text/javascript";
                        s.async = true;
                        var theUrl = baseUrl + 'serve/v1/coin/header?fsym=BTC&tsyms=USD,CNY,EUR,GBP';
                        s.src = theUrl + (theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
                        embedder.parentNode.appendChild(s);
                    })();
                    </script>
                </div>
            </div>
            <br>
            <div class="col-md-12 center right">
                <div style="margin-bottom: 15px;">
    <span style="font-weight: 800;">{{$name}}  to Fiat Currency Converter</span></div>
                <script type="text/javascript">
                baseUrl = "https://widgets.cryptocompare.com/";
                var scripts = document.getElementsByTagName("script");
                var embedder = scripts[scripts.length - 1];
                var cccTheme = { "General": { "borderWidth": "1px","background-color": "#bcbfbc", "borderColor": "#bcbfbc" } };
                (function() {
                    var appName = encodeURIComponent(window.location.hostname);
                    if (appName == "") { appName = "local"; }
                    var s = document.createElement("script");
                    s.type = "text/javascript";
                    s.async = true;
                    var urlParams = new URLSearchParams(window.location.search);
                    var name = "<?php echo $name; ?>";
                    var theUrl = baseUrl + 'serve/v1/coin/converter?fsym=' + name + '&tsyms=USD,EUR,CNY,GBP';
                    s.src = theUrl + (theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
                    embedder.parentNode.appendChild(s);
                })();
                </script>
            </div>

            <div class="col-md-12">
                <div class="">
                    <br><br>
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-12">
                           <div style="margin-bottom: 15px;">
                                <span style="font-weight: 800;">Price chart</span></div>

                            <div class="charts-box">

                                <div id="chartdiv" class="row"></div>
                                <br>
                                <br>
                                <br>
                                <script type="text/javascript">
                                baseUrl = "https://widgets.cryptocompare.com/";
                                var scripts = document.getElementsByTagName("script");
                                var embedder = scripts[scripts.length - 1];
                                var cccTheme = { "General": { "borderWidth": "1px", "borderColor": "#eee", "borderRadius": "2 2 2 2" }, "Conversion": { "background": "lightgrey" } };
                                (function() {
                                    var appName = encodeURIComponent(window.location.hostname);
                                    if (appName == "") { appName = "local"; }
                                    var s = document.createElement("script");
                                    s.type = "text/javascript";
                                    s.async = true;
                                    var urlParams = new URLSearchParams(window.location.search);
                                    var name = "<?php echo $name; ?>";
                                    var theUrl = baseUrl + 'serve/v1/coin/histo_week?fsym=' + name + '&tsym=USD';
                                    s.src = theUrl + (theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
                                    embedder.parentNode.appendChild(s);
                                })();
                                </script>
                            </div class="charts-box row">
                            <br>
                            <br>

                            <div class="">
                                <div class="">
                                    <h5><strong>{{$data->General->H1Text}}</strong></h5>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="nav-tabs-custom tabs-single">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                    <a href="#tab_2" class="nav-link active" data-toggle="tab">Description</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#tab_1" class="nav-link" data-toggle="tab">Features</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#tab_3" class="nav-link" data-toggle="tab">Technology</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#tab_4" class="nav-link" data-toggle="tab">Exchanges traded in</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#tab_5" onclick="forum();" class="nav-link" data-toggle="tab">Discussion Forum</a>
                                                </li>
                                                <li class="nav-item" style="text-align: center;">
                                                    <a href="#tab_6" class="nav-link" data-toggle="tab">Mining Calculator</a>
                                                </li>
                                                <li class="nav-item" onclick="create_chart();" style="text-align: center;">
                                                    <a href="#tab_7" class="nav-link" data-toggle="tab">Charts</a>
                                                </li>
                                                <li class="nav-item" onclick="create_chart();" style="text-align: center;">
                                                    <a href="#tab_8" class="nav-link" data-toggle="tab">Community</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_2">
                                                    <div class="row no-gutters">
                                                        <br> {{strip_tags($data->General->Description)}} @if(!$data->General->Description)
                                                        <center>
                                                            <h3 style="margin-top: 10px;">No Data Available</h3>
                                                        </center>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="tab-pane gallery2-padding" id="tab_1">
                                                    <br>{{strip_tags($data->General->Features)}} @if(!$data->General->Features)
                                                    <center>
                                                        <h3 style="margin-top: 10px;">No Data Available</h3>
                                                    </center>
                                                    @endif
                                                </div>
                                                <!-- /standard gallery -->
                                                <div class="tab-pane" id="tab_3">
                                                    <br>{{strip_tags($data->General->Technology)}} @if(!$data->General->Technology)
                                                    <center>
                                                        <h2>No Data Available</h2>
                                                    </center>
                                                    @endif
                                                    <center>
                                                        <div class="">
                                                            <div class="m-t-35 table-responsive">
                                                                <table class="display table table-stripped table-bordered" style="max-width: 800px;margin-top: 35px;">
                                                                    <tr>
                                                                        <td style="font-weight: 800;">TotalCoinSupply</td>
                                                                        <td>{{$data->General->TotalCoinSupply}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-weight: 800;">DifficultyAdjustment</td>
                                                                        <td>{{$data->General->DifficultyAdjustment}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-weight: 800;">BlockRewardReduction</td>
                                                                        <td>{{$data->General->BlockRewardReduction}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-weight: 800;">Algorithm</td>
                                                                        <td>{{$data->General->Algorithm}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-weight: 800;">ProofType</td>
                                                                        <td>{{$data->General->ProofType}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-weight: 800;">StartDate</td>
                                                                        <td>{{$data->General->StartDate}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-weight: 800;">LastBlockExplorerUpdateTS</td>
                                                                        <td>{{$data->General->LastBlockExplorerUpdateTS}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-weight: 800;">BlockNumber</td>
                                                                        <td>{{$data->General->BlockNumber}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-weight: 800;">BlockTime</td>
                                                                        <td>{{$data->General->BlockTime}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-weight: 800;">NetHashesPerSecond</td>
                                                                        <td>{{$data->General->NetHashesPerSecond}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-weight: 800;">TotalCoinsMined</td>
                                                                        <td>{{$data->General->TotalCoinsMined}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-weight: 800;">PreviousTotalCoinsMined</td>
                                                                        <td>{{$data->General->PreviousTotalCoinsMined}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="font-weight: 800;">BlockReward</td>
                                                                        <td>{{$data->General->BlockReward}}</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </center>
                                                </div>
                                                <!-- /button helper gallery -->
                                                <div class="tab-pane" id="tab_4">
                                                    <div class="">
                                                        <div class="">
                                                            <div class="m-t-35 table-responsive">
                                                                <div id="table_body"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab_5">
                                                    <div id="disqus_thread" style="margin-top: 20px;"></div>
                                                    <script>
                                                    /**
                                                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                                                    /*
                                                     */
                                                    function forum() {
                                                         // body...
                                                         var PAGE_URL = "http://cryptocompare.com";
                                                    var PAGE_IDENTIFIER = "12345";
                                                    var disqus_config = function() {
                                                        this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
                                                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                                    };

                                                    (function() { // DON'T EDIT BELOW THIS LINE
                                                        var d = document,
                                                            s = d.createElement('script');
                                                        s.src = 'https://http-18-191-39-172-cryptocompare.disqus.com/embed.js';
                                                        s.setAttribute('data-timestamp', +new Date());
                                                        (d.head || d.body).appendChild(s);
                                                    })();
                                                    } 
                                                    
                                                    </script>
                                                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                                </div>
                                                <div class="tab-pane" id="tab_6">
                                                    <div style="margin-top: 50px;">
                                                        <center>
                                                            <!-- CryptoRival Calculator Widget BEGIN -->
                                                            <script type="text/javascript" src="https://static.cryptorival.com/js/calcwidget.js"></script>
                                                            <a id="cr-copyright" href="https://cryptorival.com/" target="_blank" rel="nofollow"></a>
                                                            <script type="text/javascript">
                                                            showCalc('<?php echo $l_name; ?>', '470', false, '0', 'f93', 'f93', 'f93', '4e9f15', '09c', 'f0ad4e', 'd9534f', 'f5f5f5', 'eee');
                                                            </script>
                                                            <!-- CryptoRival Calculator Widget END -->
                                                        </center>
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="tab_7">
                                                    
                                                    <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 m-t-35">
                                <div class="card">
                                    <div class="card-header bg-white" style="text-align: center;background-color: #eee !important;">
                                        Volume by Market
                                    </div>
                                    <div id="donut2"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 m-t-35">
                                <div class="card">
                                    <div class="card-header bg-white" style="text-align: center;background-color: #eee !important;">
                                        Volume by Price
                                    </div>
                                    <div id="donut1"></div>
                                </div>
                            </div>
                            
                        </div>

                        <div id="exchange_table" style="margin-top: 50px"></div>
                                            
                                                    
						</div>

                        <div class="tab-pane" id="tab_8">
                            <div class="row">
                            <div class="col-lg-6 m-t-35">
                                
                                    
                                    <script type="text/javascript" src="https://ssl.gstatic.com/trends_nrtr/1420_RC05/embed_loader.js"></script> <script type="text/javascript"> trends.embed.renderExploreWidget("TIMESERIES", {"comparisonItem":[{"keyword":"<?php echo $name; ?>","geo":"","time":"today 12-m"}],"category":0,"property":""}, {"exploreQuery":"q=bitcoin&date=today 12-m","guestPath":"https://trends.google.com:443/trends/embed/"}); </script> 

                                
                            </div>
                            {{--  <div class="col-lg-6 m-t-35">
                                <div class="card">
                                    <div class="card-header bg-white" style="text-align: center;">
                                        Volume by Price
                                    </div>
                                    <div>
                                    <a class="twitter-timeline" href="https://twitter.com/btc?ref_src=twsrc%5Etfw">Tweets by btc</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-lg-6 m-t-35">
                                                       
                                                            {{-- <div id="stocktwits-widget-news"></div> --}}<a href='https://stocktwits.com' style='font-size: 0px;'>StockTwits</a>
<script type="text/javascript" src="https://api.stocktwits.com/addon/widget/2/widget-loader.min.js"></script>
<script type="text/javascript">
STWT.Widget({container: 'stocktwits-widget-news', symbol: '<?php echo $name; ?>', width: '400', height: '370', limit: '15', scrollbars: 'true', streaming: 'true', title: 'Crypto News', style: {link_color: '4871a8', link_hover_color: '4871a8', header_text_color: '000000', border_color: 'cecece', divider_color: 'cecece', divider_color: 'cecece', divider_type: 'solid', box_color: 'f5f5f5', stream_color: 'ffffff', text_color: '000000', time_color: '999999'}});
</script>
                                                        
                                                    </div>

                                                   {{--  <div class="col-lg-6 m-t-35">
                                                        <div class="card">
                                                            <div>
                                                                
 

                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            @if($ads1->status == 1)
            <div class="col-md-2">
                
                <img src="{{url('/')}}/public/add-bg.jpg" class="single-img-pro"> 
                <img src="{{url('/')}}/public/add-bg1.jpg" class="single-img-pro"> 
            </div>
            @endif
            
        </div>
        </div>
        <!-- hello -->
    </div>
</div>
<br>
<br>
<br>

<!-- <script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

  google.load("visualization", "1", { packages: ["corechart"] });
  google.setOnLoadCallback(drawChart);

  function drawChart() {

  	var options = {
      title: 'Market Volume'
    };

    $.ajax({
        type: "GET",
        url: api_url1,
        dataType: 'json',
        success: function(data) {
        	// for pie chart
            var arrValues = [['Market', '24H Volume']];
            data.forEach(function(element) {
            	arrValues.push([element.MARKET,element.VOLUME24HOUR]);
            });
            console.log(arrValues);
            console.log(JSON.stringify(arrValues));
            var stringified = JSON.stringify(arrValues);
            var data = google.visualization.arrayToDataTable(arrValues);
            // THE TYPE OF CHART (PieChart IN THIS EXAMPLE).
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options); 
        }
    });

    

    // var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    // chart.draw(data, options);
  }
</script> -->

<script type="text/javascript">

    var api_url1 = window.location.protocol + "//" + window.location.host + "/getItemAjax/exchange/load?name=<?php echo $name; ?>";
    var redirect_ex = window.location.protocol + "//" + window.location.host + "/";
//alert(api_url);
//console.log(chartData);



//var start = '0';

setInterval(function() {
    // Ajax starts
    $.ajax({
        type: "GET",
        url: api_url1,
        dataType: 'json',
        success: function(data) {
            //start = data.start;

            

            var temp = '<table id="" class="display table table-stripped table-bordered"> <thead class="flip-content"> <tr clas="coin"> <th>#</td><th>EXCHANGE</th> <th>CURRENCY</th><th>PRICE</th> <th class="numeric">24H VOLUME</th> <th class="numeric">24H VOLUME HIGH</th> <th class="numeric">24H VOLUME LOW</th></tr></thead> <tbody>';
            //temp += g_data;
            var i = 1;
            data.forEach(function(element) {
                var price_old = $("#id_" + element.MARKET + '_' + i).val();
                //console.log(element);
                // console.log(price_old);
                //  //price_old = parseFloat(price_old);
                price_new = parseFloat(element.PRICE);




                // alert(element.PRICE);
                if (price_old < element.PRICE) {
                    console.log("Value increased : " + i);
                    temp += "<input type='hidden' value='id_" + element.MARKET + '_' + element.PRICE + "' id='id_" + element.MARKET + '_' + i + "'>";

                    temp += '<tr> <td >' + i + '</td><td class="highlgt"> &nbsp;&nbsp' +
                        '<a href="' + redirect_ex + 'exchange/' + element.MARKET + '"><span class="highlgt">' +
                        element.MARKET + '</span></a><td>' + element.CURRENCY + '</td></td><td><div id="hig_incre">$ ' + element.PRICE + '</div></td><td class="numeric">' + element.VOLUME24HOUR + '</td><td class="numeric">' + element.HIGH24HOUR + '</td><td class="numeric">' + element.LOW24HOUR + '</td></tr>';
                } else if (price_old > element.PRICE) {

                    console.log("Value decreased: " + i);
                    temp += "<input type='hidden' value='id_" + element.MARKET + '_' + element.PRICE + "' id='id_" + element.MARKET + '_' + i + "'>";;
                    temp += '<tr> <td>' + i + '</td><td class="highlgt"> &nbsp;&nbsp' +
                        '<a href="' + redirect_ex + 'exchange/' + element.MARKET + '"><span class="highlgt">' +
                        element.MARKET + '</span></a></td><td>' + element.CURRENCY + '</td><td><div id= "hig_decre"> $ ' + element.PRICE + '</div></td><td class="numeric">' + element.VOLUME24HOUR + '</td><td class="numeric">' + element.HIGH24HOUR + '</td><td class="numeric"> ' + element.LOW24HOUR + ' </td></tr>';
                } else {
                    temp += "<input type='hidden' value='" + element.PRICE + "' id='id_" + element.MARKET + '_' + i + "'>";
                    temp += '<tr> <td >' + i + '</td><td class="highlgt">  &nbsp;&nbsp' +
                        '<a href="' + redirect_ex + 'exchange/' + element.MARKET + '"><span class="highlgt">' +
                        element.MARKET + '</span></a></td><td>' + element.CURRENCY + '</td><td>$ ' + element.PRICE + '</td><td class="numeric">' + element.VOLUME24HOUR + '</td><td class="numeric">' + element.HIGH24HOUR + '</td><td class="numeric"> ' + element.LOW24HOUR + ' </td></tr>';
                }
                i++;

            });

            temp += '</tbody></table>';
            document.getElementById("table_body").innerHTML = temp;
            document.getElementById("exchange_table").innerHTML = temp;
        }
    });
    // end of ajax

}, 2000);

$(document).ready(function(){
    forum();
});

var chartData = generateChartData();

function generateChartData() {
    var chartData = [];
    var firstDate = new Date(2012, 0, 1);
    firstDate.setDate(firstDate.getDate() - 1000);
    firstDate.setHours(0, 0, 0, 0);

    var a = 2000;

    for (var i = 0; i < 1000; i++) {
        var newDate = new Date(firstDate);
        newDate.setHours(0, i, 0, 0);

        a += Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
        var b = Math.round(Math.random() * 100000000);

        chartData.push({
            "date": newDate,
            "value": a,
            "volume": b
        });
    }
    return chartData;
}

var n_chart_data = [];
var urlParams = new URLSearchParams(window.location.search);
//var name = urlParams.get('name');
var name = "<?php echo $name; ?>";
var api_url = "https://min-api.cryptocompare.com/data/histominute?fsym=" + name + "&tsym=USD&limit=60&aggregate=3&e=CCCAGG";
//alert(api_url);
$.ajax({
    type: "GET",
    url: api_url,
    dataType: 'json',
    success: function(data) {
        // console.log(data.Data);
        data.Data.forEach(function(element) {
            ///console.log(element);
            var newDate = new Date(element.time * 1000);
            n_chart_data.push({
                "date": newDate,
                "value": element.high,
                "volume": element.volumeto
            });
            //console.log("single Data :"+n_chart_data);
        });
        ///////////////////////////////////

        var chart = AmCharts.makeChart("chartdiv", {
            "type": "stock",
            "theme": "light",
            "categoryAxesSettings": {
                "minPeriod": "mm"
            },

            "dataSets": [{
                "color": "#8dc647",
                "fieldMappings": [{
                    "fromField": "value",
                    "toField": "value"
                }, {
                    "fromField": "volume",
                    "toField": "volume"
                }],

                "dataProvider": n_chart_data,
                "categoryField": "date"
            }],

            "panels": [{
                "showCategoryAxis": false,
                "title": "Value",
                "percentHeight": 70,

                "stockGraphs": [{
                    "id": "g1",
                    "valueField": "value",
                    "type": "smoothedLine",
                    "lineThickness": 2,
                    "bullet": "round"
                }],


                "stockLegend": {
                    "valueTextRegular": " ",
                    "markerType": "none"
                }
            }, {
                "title": "Volume",
                "percentHeight": 30,
                "stockGraphs": [{
                    "valueField": "volume",
                    "type": "column",
                    "cornerRadiusTop": 2,
                    "fillAlphas": 1
                }],

                "stockLegend": {
                    "valueTextRegular": " ",
                    "markerType": "none"
                }
            }],

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
                "periods": [{
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
                }]
            },

            "panelsSettings": {
                "usePrefixes": true
            },

            "export": {
                "enabled": true,
                "position": "bottom-right"
            }
        });
        ////////////////////////////////////
    }
});
</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5afec5426d44f1e2"></script>
@endsection

@section('scripts')
<script type="text/javascript">

    function getRandomColor() {
      var letters = '0123456789ABCDEF';
      var color = '#';
      for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
      }
      return color;
    }

    function create_chart() {
        var datax = [{
        label: "Profile",
        data: 150,
        color: '#00c0ef'
    }, {
        label: "Facebook ",
        data: 130,
        color: '#668cff'
    }, {
        label: "Twitter ",
        data: 190,
        color: '#0fb0c0'
    }, {
        label: "Google+",
        data: 180,
        color: '#ff8080'
    }, {
        label: "Linkedin",
        data: 120,
        color: '#ffb300'
    }];

     $.ajax({
        type: "GET",
        url: api_url1+'&sort=1',
        dataType: 'json',
        success: function(data) {
            // for pie chart
            var arrValues = [];
            data = data.slice(1, 5);
            data.forEach(function(element) {

                if (element.VOLUME24HOUR != 0) {
                    arrValues.push(
                    { label : element.MARKET,
                      data : element.VOLUME24HOUR,
                      color : getRandomColor()
                    }
                    );
                }
                
            });
            $.plot($("#donut2"), arrValues, {
                series: {
                    pie: {
                        innerRadius: 0.5,
                        show: true
                    }
                },
                legend: {
                    show: false
                },
                grid: {
                    hoverable: true
                },
                tooltip: true,
                tooltipOpts: {
                    content: "%p.0%, %s"
                }
            });

             

            }
    });



 $.ajax({
        type: "GET",
        url: api_url1+'&sort=2',
        dataType: 'json',
        success: function(data) {
            // for pie chart
            var arrValues1 = [];
            data = data.slice(1, 5);
            data.forEach(function(element) {

                if (element.PRICE != 0) {
                    arrValues1.push(
                    { label : element.MARKET,
                      data : element.PRICE,
                      color : getRandomColor()
                    }
                    );
                }
                
            });
            $.plot($("#donut1"), arrValues1, {
                series: {
                    pie: {
                        innerRadius: 0.5,
                        show: true
                    }
                },
                legend: {
                    show: false
                },
                grid: {
                    hoverable: true
                },
                tooltip: true,
                tooltipOpts: {
                    content: "%p.0%, %s"
                }
            });

             

            }
    });
         
    
    }
</script>

@endsection

@section('scripts')

<script type="text/javascript">
    $(".histoTitleConverter").hide();
</script>

@endsection