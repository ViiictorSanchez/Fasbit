@extends('Layout.master') @section('title') {{$title->value}}  | Home @endsection

@section('meta')

<meta name="title" content=" Cryptocurrency Price,Volume, Traded Exchanges, Market Capital, ICO Reviews and Bitcoin News">
<!-- <meta name="description" content="All Live Prices of Cryptocurrency, Volume, Charts, Market capitalisation, ICO Reviews, News present in one place. With Forum and community discussion, advice">
<meta name="keywords" content="Cryptocurrency Price,Cryptocurrency Trade volume, Cryptocurrency compare,Cryptocurrency News, ICO review">
 -->
 <?php echo $meta_description->value; ?>
 <?php echo $meta_keyword->value; ?>


@endsection


 @section('content')
<style>
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
     <div class="container">
        @if($ads->status == 1)
        <img class="banner-img" src="{{url('/')}}/public/ad.jpg">
        @endif
            <div class="row">
                @if($ads1->status == 1)
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 min-add-div" style="display: inline-block;width: auto;">   
                @else
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 min-add-div" style="display: inline-block;width: auto;">   
                @endif
<div class="">
    <div class="row">
        <div class="col-md-12">
            <div class="m-t-30">

                <div class="m-t-30">
                    <!-- <i class="fa fa-table"></i> -->
                    <!-- <button class="btn btn-success">Coin list</button> -->
                </div>
                <div class="">
                    <div class="m-t-10 home-table">
                        <div id="table_body"></div>
                    </div>
                </div>
            </div>
            <!-- end of responsive tables-->
        </div>
        <!-- /.inner -->
    </div>
</div>
<!-- </div>
</div> -->

<br>
<br>
<br>
</div>
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

<script async type="text/javascript" src="{{ URL::asset('public/js/pages/home.js') }}"></script>
@endsection
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5afec5426d44f1e2"></script>
