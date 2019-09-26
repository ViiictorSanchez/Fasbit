@extends('Layout.master')

@section('title')

 Latest Mining details, Volume, Traded Exchanges, Market Capital, ICO Reviews and Bitcoin News

@endsection

@section('meta')

<meta name="title" content=" Latest Mining details, Volume, Traded Exchanges, Market Capital, ICO Reviews and Bitcoin News">
<meta name="description" content=" All Live Prices of Cryptocurrency, mining details, Volume, Charts, Market capitalisation, ICO Reviews, News present in one place. With Forum and community discussion, advice">
{{-- <meta name="keywords" content=" ICO list, Initial Coin Offering, Details, Upcoming, Invest"> --}}

@endsection

@section('content')
  
<!--link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"-->
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("public/css/pages/icon.css")}}" />
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/vendors/themify/css/themify-icons.css")}}" />
    <!-- Plugin styles-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("public/vendors/ionicons/css/ionicons.min.css")}}" />
             
<style type="text/css">
    #chartdiv {
      width: 80%;
      height: 500px;
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
@media only screen and (max-width: 766px) {
.hide-add-div {
    display: none !important;
}
div.fluid-container {
    padding-left: 30px;
    padding-right: 30px;
}
div.min-add-div {
    width: 100% !important;
}
}
</style>                       

<div id="" class="container">
 <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 min-add-div" style="display: inline-block;width: auto;">   

@if($ads->status == 1)
<img class="banner-img" src="{{url('/')}}/public/ad.jpg">
@endif

<div class="outer">
                <div class="r">
                    <div class="row">

                        <div class="col-lg-12">

                            <div class="">
                                <div class="">
                                    <h5><strong>Mining</strong></h5>
                                    <br>
                                </div>
                                <div class="">
                                    <div class="table-responsive mining-table">
                                        <table class="table" id="sample_1">
                                                              <thead class="flip-content" style="background-color: #eeeeee;">
                                                            <tr> 
                                                              <th>Image</th> 
                                                              <th>Name</th> 
                                                              <th>Company</th> 
                                                              <th>Recommended</th> 
                                                              <th>Algorithm</th>  
                                                              <th>HashesPerSecond</th> 
                                                              <th>Cost</th> 
                                                              <th>Currency</th> 
                                                              
                                                            </tr>
                                                          </thead> 
                                                          <tbody>
                                                            @foreach($data as $d)
                                                            <tr>
                                                              <td>
                                                                <img src="https://www.cryptocompare.com{{$d->LogoUrl}}" height="50" width="50">
                                                              </td>
                                                              <td>{{$d->Name}}</td>
                                                              <td>{{$d->Company}}</td>
                                                              <td>
                                                                @if($d->Recommended)
                                                                <div style="width: 55px;max-width: 55px;background-color:#57bd0f!important;color: #fff;border-radius: 30px; font-size: 0.8em;padding:5px 5px;display: inline-block;text-align:center;padding-bottom:3px;"><span>Yes</span></div>
                                                                @else
                                                                <div style="width: 55px;max-width: 55px;background-color:#ed5565!important;color: #fff;border-radius: 30px; font-size: 0.8em;padding:5px 5px;display: inline-block;text-align:center;padding-bottom:3px;"><span>No</span></div>
                                                                @endif
       
                                                              </td>
                                                              
                                                              <td>{{$d->Algorithm}}</td>
                                                              <td>{{$d->HashesPerSecond}}</td>
                                                              <td>{{$d->Cost}}</td>
                                                              <td>{{$d->Currency}}</td>
                                                            </tr>
                                                            @endforeach
                                                          </tbody>
                                                        </table>

                                                        <div style="float: right;">

                    <button class="btn pagination-btn" onclick="window.location.href='?start=1'">
                      First
                    </button>
                    <?php $pre = ($current - 1) * 10; if($current != 1){ ?>
                    <button class="btn pagination-btn" onclick="window.location.href='?start=<?php echo $pre; ?>'">
                      Previous
                    </button>
                  <?php } ?>

                          <?php for($i = $current+1; $i <= $end; $i++ ){ $j = $i - 1;  ?>
                            
                            <?php if($i <= $count){ ?>
                            <button class="btn pagination-btn" onclick="window.location.href='?start=<?php echo $i*10; ?>'">
                            <?php echo $i; ?>
                          </button>
                        <?php } ?>
                            <?php } ?>

                          <?php $nex = ($current+1)*10; if($current <= $count){?>
                          <button class="btn pagination-btn" onclick="window.location.href='?start=<?php echo $nex; ?>'">
                            Next
                          </button>
                        <?php } ?>
                          <button class="btn pagination-btn" onclick="window.location.href='?start=<?php echo 160; ?>'">
                            Last
                          </button>
                                                        </div>
                                        <!-- nav-tabs-custom -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.inner -->
            </div>
          </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 hide-add-div" style="display: inline-block;width: auto;">
                
                <img src="{{url('/')}}/public/add-bg.jpg" class="single-img-pro"> 
                <img src="{{url('/')}}/public/add-bg1.jpg" class="single-img-pro"> 
            </div>
          </div>
        </div>
    
<script src="{{ URL::asset("public/pages/icons.js")}}"></script>


@endsection
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5afec5426d44f1e2"></script>