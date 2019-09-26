@extends('Layout.master') 

@section('title') 

{{$title->value}}  | Home 

@endsection

@section('meta')

<meta name="title" content=" Cryptocurrency Price,Volume, Traded Exchanges, Market Capital, ICO Reviews and Bitcoin News">

 <?php echo $meta_description->value; ?>
 <?php echo $meta_keyword->value; ?>


@endsection

 @section('content')

    <div class="container">
        @if($ads->status == 1)
            <img class="banner-img" src="{{url('/')}}/public/ad.jpg">
        @endif    
        <div class="row"> 
            @if($ads1->status == 1)
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 min-add-div" > 
            @else
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 min-add-div" >   
            @endif
        </div>
        <div class="row padding-button-sort">
            <div class="col-lg-4 content-buttons-box">
                <a href="http://cryptocompare.local/?page=1"  class="sort-buttton" > 1st Tier </a>
                <a href="http://cryptocompare.local/?page=2"  class="sort-buttton space-button" >2nd Tier </a> 
                <a href="http://cryptocompare.local/?page=3"  class="sort-buttton space-button" >3rd Tier </a> 
                <a href="http://cryptocompare.local/?page=4"  class="sort-buttton space-button" >4th Tier </a> 
                <a href="http://cryptocompare.local/?page=5"  class="sort-buttton space-button" >5th Tier </a> 
            </div>  
        </div>
        <div class="dark container">
            <div class="tab-content">
                <div class="tab-pane active" id="top" role="tabpanel">  
                    <table id="coin-table" class="table coinlist">
                        <thead>
                            <tr>
                                <th class="tbl-col-sm"></th>
                                <th onclick="sortTable(1,this)" ><span class="d-none d-sm-block">Rank<i class="fa fa-fw fa-sort"></i></span></th>
                                <th colspan="2">Name</th>
                                <th class="text-right">Price</th>
                                <th class="d-none d-lg-table-cell text-right" onclick="sortTable(5,this)"> Market cap<i class="fa fa-fw fa-sort"></i> </th>
                                <th class="d-none d-lg-table-cell text-right" onclick="sortTable(6,this)"> Volume<i class="fa fa-fw fa-sort"></i></th>
                                <th class="d-none d-lg-table-cell text-right">1D</th>
                                <th class="d-none d-lg-table-cell text-right">7D</th>
                                <th class="d-none d-lg-table-cell text-right">14D</th>
                                <th class="d-none d-lg-table-cell text-right">30D</th>
                                <th class="d-none d-lg-table-cell text-right">90D</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($data as $index => $item) 
                                <tr coin_id="{{$item->id}}" coin_href="/coin/{{$item->symbol}}">
                                    <td class="tbl-col-sm"></td>  
                                    <td class="tbl-col-sm">
                                        <span class="tbl-rank">
                                            @if(app('request')->input('page'))
                                                {{ ($index+1)+( (  app('request')->input('page') - 1)*100) /*$item->rank*/ }}
                                            @else
                                            {{ ($index+1) /*$item->rank*/ }}
                                            @endif  
                                        </span>
                                    </td>
                                    <td class="fit clickable-coin-td">
                                        <img class="tbl-icon" src="{{$item->image_url}}?width=30" alt="{{$item->name}} logo">
                                    </td>
                                    <td class="clickable-coin-td">
                                        <div class="tbl-currency">
                                            <a id="name" href="/coin/{{$item->symbol}}">{{$item->name}}</a>
                                            <span id="symbol" class="tbl-coin-abbrev">[{{$item->symbol}}]</span>
                                        </div>
                                        <div class="d-lg-none tbl-mob-info smaller">
                                            <span class="mob-info-title">Mkt Cap:&nbsp;</span>
                                            <span class="mob-info-value marketcap-859" data-market="{{$item->market_cap}}">{{$item->market_cap}}</span>
                                            <span class="mob-info-title">Volume:&nbsp;</span>
                                            <span class="mob-info-value volume-859" data-volume="{{$item->volume_24h}}">{{$item->volume_24h}}</span>
                                            <span class="mob-info-title">Price change percentage: </span>
                                            <br>
                                            <br>
                                            <br>
                                            <span class="mob-info-title">1D:</span>
                                            @if($item->percent_change_24h < 0)
                                                <span id="p_down" class="tbl-price pr-change delta-859 price down mob-info-value volume-859 p-0">{{number_format($item->percent_change_24h, 2, '.', ',')}}%</span>
                                            @else
                                                <span id="p_up" class="tbl-price pr-change delta-859 price up  mob-info-value volume-859 p-0">{{number_format($item->percent_change_24h, 2, '.', ',')}}%</span>
                                            @endif
                                            <span class="mob-info-title">7D:</span>
                                            @if($item->percent_change7d < 0)
                                                <span id="p_down_7" class="tbl-price pr-change delta-859 price down  mob-info-value volume-859 p-0">{{number_format($item->percent_change7d, 2, '.', ',')}}%</span>
                                            @else
                                                <span id="p_up_7" class="tbl-price pr-change delta-859 price up  mob-info-value volume-859 p-0">{{number_format($item->percent_change7d, 2, '.', ',')}}%</span>
                                            @endif
                                            <span class="mob-info-title">14D:</span>
                                            @if($item->percent_change14d < 0)
                                                {{-- <span id="p_up_14" class="tbl-price pr-change delta-859 price down p-0">{{ -- }}</span> --}}
                                                <span id="p_up_14" class="tbl-price pr-change delta-859 price down  mob-info-value volume-859 p-0">{{number_format($item->percent_change14d, 2, '.', ',')}}%</span>
                                            @else
                                                {{-- <span id="p_up_14" class="tbl-price pr-change delta-859 price up p-0">{{ -- }}</span> --}}
                                                <span id="p_up_14" class="tbl-price pr-change delta-859 price up  mob-info-value volume-859 p-0">{{number_format($item->percent_change14d, 2, '.', ',')}}%</span>
                                            @endif         
                                            <span class="mob-info-title">30D: </span>
                                            @if($item->percent_change30d < 0)
                                                <span id="p_down_30" class="tbl-price pr-change delta-859 price  mob-info-value volume-859 down p-0">{{number_format($item->percent_change30d, 2, '.', ',')}}%</span>    
                                            @else
                                                <span id="p_up_30" class="tbl-price pr-change delta-859 price up  mob-info-value volume-859 p-0">{{number_format($item->percent_change30d, 2, '.', ',')}}%</span>
                                            @endif
                                            <span class="mob-info-title">90D: </span>
                                            @if($item->percent_change90d < 0)
                                                {{-- <span id="p_down" class="tbl-price pr-change delta-859 price down">{{number_format($item->percent_change90d, 2, '.', ',')}}%</span> --}}
                                                <span id="p_up_90" class="tbl-price pr-change delta-859 price down  mob-info-value volume-859 p-0">--%</span>
                                            @else
                                                <span id="p_up_90" class="tbl-price pr-change delta-859 price down  mob-info-value volume-859 p-0">--%</span>
                                                {{-- <span id="p_up_90" class="tbl-price pr-change delta-859 price up">{{number_format($item->percent_change90d, 2, '.', ',')}}%</span> --}}
                                            @endif
                                        </div>
                                    </td>
                                    <td class="clickable-coin-td">
                                        <span id="price" class="tbl-price avgprice-859 price">${{number_format($item->price,0,".",",")}}</span>
                                    </td>
                                    <td class="d-none d-lg-table-cell clickable-coin-td">
                                        <span id="market_cap" class="tbl-price price dimmed marketcap-859" data="{{$item->market_cap}}">{{number_format($item->market_cap,0,".",",")}}</span>
                                    </td>
                                    <td class="d-none d-lg-table-cell clickable-coin-td">
                                        <span id="market_cap" class="tbl-price price dimmed marketcap-859" data="{{$item->volume_24h}}">{{number_format($item->volume_24h,0,".",",")}}</span>
                                    </td>
                                    <td class="tbl-col-md change-period clickable-coin-td text-right">
                                        @if($item->percent_change_24h < 0)
                                            <span id="p_down" class="tbl-price pr-change delta-859 price down perc_none p-0">{{number_format($item->percent_change_24h*100,2,".",",")}}%</span>
                                        @else
                                            <span id="p_up" class="tbl-price pr-change delta-859 price up perc_none p-0">@if($item->percent_change_24h*100 < 10)
                                                0{{number_format($item->percent_change_24h*100,2,".",",")}}   
                                            @else
                                                {{number_format($item->percent_change_24h*100,2,".",",")}} 
                                            @endif%</span>
                                        @endif
                                        {{-- Graph
                                        <span class="small-chart-container">
                                            <div class="small-chart small-live-chart">
                                                <div id="highcharts-q6qp1d2-0" class="highcharts-container" style="overflow: hidden; text-align: left;">
                                                                
                                                </div>
                                            </div>
                                        </span> --}}
                                    </td>
                                    <td class="tbl-col-md change-period clickable-coin-td text-right">
                                        @if($item->percent_change7d < 0)
                                            <span id="p_down_7" class="tbl-price pr-change delta-859 price down perc_none p-0">{{number_format($item->percent_change7d*100, 2, '.', ',')}}%</span>
                                        @else
                                            <span id="p_up_7" class="tbl-price pr-change delta-859 price up perc_none p-0">@if($item->percent_change7d*100<10)
                                                0{{number_format($item->percent_change7d*100, 2, '.', ',')}}
                                                @else 
                                                {{number_format($item->percent_change7d*100, 2, '.', ',')}}
                                                @endif %</span>
                                        @endif
                                        {{-- Graph
                                        <span class="small-chart-container">
                                            <div class="small-chart small-live-chart">
                                                <div id="highcharts-q6qp1d2-0" class="highcharts-container align-graph">
                                                                
                                                </div>
                                            </div>
                                        </span> --}}
                                    </td>
                                    <td class="tbl-col-md change-period clickable-coin-td text-right" >
                                        @if($item->percent_change14d < 0)
                                             <span id="p_up_14" class="tbl-price pr-change delta-859 price down perc_none p-0">{{number_format($item->percent_change14d*100, 2, '.', ',')}}%</span>
                                        @else
                                            <span id="p_up_14" class="tbl-price pr-change delta-859 price up perc_none p-0">@if ($item->percent_change14d*100 < 10) 
                                                0{{number_format($item->percent_change14d*100, 2, '.', ',')}}
                                                @else 
                                                {{number_format($item->percent_change14d*100, 2, '.', ',')}}
                                                @endif %</span>
                                        @endif
                                        {{-- Graph 
                                        <span class="small-chart-container">
                                            <div class="small-chart small-live-chart">
                                                <div id="highcharts-q6qp1d2-0" class="highcharts-container align-graph">               
                                                </div>
                                            </div>
                                        </span> --}}
                                    </td>
                                    <td class="tbl-col-md change-period clickable-coin-td text-right" >
                                        @if($item->percent_change30d < 0)
                                            <span id="p_down_30" class="tbl-price pr-change delta-859 price down perc_none p-0">{{number_format($item->percent_change30d*100, 2, '.', ',')}}%</span>    
                                        @else
                                            <span id="p_up_30" class="tbl-price pr-change delta-859 price up perc_none p-0"> @if($item->percent_change30d*100 < 10) 
                                                0{{number_format($item->percent_change30d*100, 2, '.', ',')}}
                                                @else 
                                                {{number_format($item->percent_change30d*100, 2, '.', ',')}}
                                                @endif%</span>
                                        @endif
                                        {{-- Graph 
                                        <span class="small-chart-container">
                                            <div class="small-chart small-live-chart">
                                                <div id="highcharts-q6qp1d2-0" class="highcharts-container align-graph">
                                                                
                                                </div>
                                            </div>
                                        </span> --}}
                                    </td>
                                    <td class="tbl-col-md change-period clickable-coin-td text-right" >
                                        @if($item->percent_change90d < 0)
                                            <span id="p_down" class="tbl-price pr-change delta-859 price down perc_none p-0">{{number_format($item->percent_change90d*100, 2, '.', ',')}}%</span>     
                                        @else
                                            <span id="p_up_90" class="tbl-price pr-change delta-859 price up perc_none p-0">@if($item->percent_change90d*100 < 10) 
                                                0{{number_format($item->percent_change90d*100, 2, '.', ',')}}
                                                @else 
                                                {{number_format($item->percent_change90d*100, 2, '.', ',')}}
                                                @endif %</span>
                                        @endif
                                        {{-- Graph 
                                        <span class="small-chart-container">
                                            <div class="small-chart small-live-chart">
                                                <div id="highcharts-q6qp1d2-0" class="highcharts-container align-graph">
                                                                
                                                </div>
                                            </div>
                                        </span> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
<br>
<br>
<br>
    @if($ads1->status == 1)
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 hide-add-div" style="display: inline-block;width: auto;"> 
            <img src="{{url('/')}}/public/add-bg.jpg" class="single-img-pro"> 
            <img src="{{url('/')}}/public/add-bg1.jpg" class="single-img-pro"> 
        </div>
    @endif
</div>
</div>

</div>
<!-- # right side -->

@endsection


@section('scripts')
<script>
$(document).ready(function(){
    $('table tbody tr').click(function(){
        window.location = $(this).attr('coin_href');
        return false;
    });
});
</script>
<script type="text/javascript" src="{{ URL::asset("public/js/sort_table.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/js/jquery-3.1.1.min.js") }}"></script>
<script type="text/javascript" src='{{ URL::asset("public/js/highcharts.js") }}' ></script>
<script type="text/javascript" src='{{ URL::asset("public/js/chart.1.js") }}' ></script>
<!--<script type="text/javascript" async src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5afec5426d44f1e2"></script>-->
@endsection
