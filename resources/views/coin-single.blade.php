@extends('Layout.master') 

@section('title') {{ $title->value }} | {{ $data->symbol }}@endsection 

@section('meta')

@endsection

@section('content')


<div class="container coin-single">

        <div class="first-section-single-coin">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="name-details-coin">
                        <img src="{{ $data->image_url }}" class="logo-32x32" width="32" height="32" alt="Nano">
                        {{ $data->name }}
                        <span>({{ $data->symbol }})</span>
                    </h1>       
                </div>

                <div class="col-md-8 prices-details-coin" style=" display: flex; flex-direction: row;">
   
                
                    <div class="price-usd" style="  display: flex;    flex-direction: column;">
                        <span class="font-size-price" style="flex-shrink: 2;">
                            <span>{{ $data->price }}</span>
                            <span class="text-large">USD</span>
                        </span>
                        <span class="price-btc">
                            <span class="text-large">{{ $data->btc_price }}</span>
                            <span class="text-large">BTC</span>
                        </span>
                    </div>
                    <div class="price-btc" style=" display: flex;flex-direction: column; justify-content: flex-end;    padding-left: 1em;">
                        @if($data->percent_change_24h >= 0)
                        <span class="font-size-price price up"style="font-size: 25px;">
                            (<span>{{ $data->percent_change_24h }}</span>%)
                        </span>
                        <span class="font-size-price price up">Last 24 Hour</span>
                        @else
                        <span class="font-size-price price down" style="font-size: 25px;">
                            (<span>{{ $data->percent_change_24h }}</span>%)
                        </span>
                        <span class="font-size-price price down">Last 24 Hour</span>
                        @endif        
                   
                    </div>

                </div>

               <!-- <div class="col-md-8 prices-details-coin">

                
                
                    <div class="price-usd">
                        <span class="font-size-price">
                            <span>{{ $data->f_price }}</span>
                            <span class="text-large">USD</span>
                        </span>
                        <span  class="text-large">
                            <span>{{ $data->btc_price }}</span>
                            BTC
                        </span>
                    </div>
                    <div class="price-btc">
                    @if($data->percent_change_24h >= 0)
                        <span class="font-size-price price up">
                            (<span>{{ $data->percent_change_24h }}</span>%)
                        </span>
                        @else
                        <span class="font-size-price price down">
                            (<span>{{ $data->percent_change_24h }}</span>%)
                        </span>
                        @endif
                      
                        <span>Last 24 Hour</span>
                    </div>

                </div>-->
            </div>
        </div>

        <div class="second-section-single-coin">
            <div class="row">
                <div class="col-md-4">
                    <p class="text-span-single-coin">
                        <span class="badge badge-primary span-single-coin">Rank {{ $data->rank }}</span>
                        <span class="badge badge-info span-single-coin-2">{!! $data->website !!}</span>
                    </p>
                </div>


                <div class="col-md-8 prices-details-coin-2">
                    <div class="row">
                        <div class="col-lg-6  col-md-6 col-sm-6 col-xs-12 data-coin-table">
                            <h5 class="data-coin-table-header">Market Cap</h5>
                            <div class="data-coin-table-detail">
                                <span>
                                    <span>{{ $data->market_cap }}</span>
                                </span>
                            </div>
                        </div>

                        <div class="col-lg-6  col-md-6 col-sm-6 col-xs-12 data-coin-table">
                            <h5 class="data-coin-table-header">Volume (24h)</h5>
                            <div class="data-coin-table-detail">
                                <span>
                                    <span>{{ $data->volume_24h }}</span>
                                </span>
                            </div>
                        </div>


                        @if($data->algorithm)
                            <div class="col-lg-6  col-md-6 col-sm-6 col-xs-12 data-coin-table">
                                <h5 class="data-coin-table-header">algorithm</h5>
                                <div class="data-coin-table-detail">
                                    <span>
                                        <span>{{ $data->algorithm }}</span>
                                    </span>
                                </div>
                            </div>
                        @endif
                        
                        @if($data->prooftype)
                            <div class="col-lg-6  col-md-6 col-sm-6 col-xs-12 data-coin-table">
                                <h5 class="data-coin-table-header">Proof Type</h5>
                                <div class="data-coin-table-detail">
                                    <span>
                                        <span>{{ $data->prooftype }}</span>
                                    </span>
                                </div>
                            </div>
                        @endif

                        @if($data->total_supply!=0)
                            @if(($data->algorithm && $data->prooftype) || (!$data->algorithm && !$data->prooftype))
                                <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12 data-coin-table">
                            @else
                                <div class="col-lg-6  col-md-6 col-sm-6 col-xs-12 data-coin-table"> 
                            @endif
                                <h5 class="data-coin-table-header">Total Coin Supply</h5>
                                    <div class="data-coin-table-detail">
                                        <span>
                                            <span> {{ round($data->total_supply,2) }}</span>
                                        </span>
                                    </div>
                                </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        <div class="loading-chart">
            <div class="lds-facebook"><div></div><div></div><div></div></div>
        </div>
        <div id="container-chart"></div>


        <div class="third-section-single-coin">
            <h2>About {{ $data->name }}</h2>
            @if($data->description)
                {!! $data->description !!}
            @endif
        </div>
        <div class="third-section-single-coin row">
            @if($data->features && $data->technology) 
                <div class="col-md-6">
                    <h2>features</h2>
                    <div>{!! $data->features !!}</div>
                </div>

                <div class="col-md-6">
                    <h2>technology</h2>
                    <div>{!! $data->technology !!}</div>
                </div>
            @elseif($data->features)
                <div class="col-md-12">
                    <h2>features</h2>
                    <div>{!! $data->features !!}</div>
                </div>
            @elseif($data->technology)
                <div class="col-md-12">
                    <h2>technology</h2>
                    <div>{!! $data->technology !!}</div>
                </div>
            @endif
        </div>

</div>

@endsection

@section('scripts')
    <script src="https://code.highcharts.com/stock/highstock.js"></script>

    <script src="https://code.highcharts.com/stock/indicators/indicators-all.js"></script>
    <script src="https://code.highcharts.com/stock/modules/drag-panes.js"></script>

    <script src="https://code.highcharts.com/modules/annotations-advanced.js"></script>
    <script src="https://code.highcharts.com/modules/price-indicator.js"></script>
    <script src="https://code.highcharts.com/modules/full-screen.js"></script>
    <script async type="text/javascript" src="{{ URL::asset("public/js/charts/graphic.js") }}"></script>
@endsection