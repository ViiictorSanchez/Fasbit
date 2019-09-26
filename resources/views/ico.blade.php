@extends('Layout.master')

@section('title')

{{-- {{$title->value}} - ICO --}}
Initial Coin Offering ( ICO ) list and Calendar

@endsection

@section('meta')

<meta name="title" content=" Initial Coin Offering ( ICO ) list and Calender">
<meta name="description" content=" ICO ( Initial Coin Offering ) companies list and calendar with all related investment details">
<meta name="keywords" content=" ICO list, Initial Coin Offering, Details, Upcoming, Invest">

@endsection

@section('content')
  
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
        max-width: 100%;
}
td {
    font-size: 14px !important;
}
th {
    font-size: 14px !important;
}
a.nav-link {
    font-size: 14px !important;
    font-weight: 600;
}
</style>                       

<div id="" class="container">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">

<div class="outer ico-mobile-display">
  <div class="nav-tabs-custom ico-table">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="#tab_1_mobile active" class="nav-link active" data-toggle="tab">Upcoming</a>
        </li>
        <li class="nav-item">
            <a href="#tab_2_mobile" class="nav-link" data-toggle="tab">Ongoing</a>
        </li>
        <li class="nav-item">
            <a href="#tab_3_mobile" class="nav-link" data-toggle="tab">Ended</a>
        </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="tab_1_mobile">
        <?php $cont=0;?>
        @foreach($upcoming as $data)
          <div class="ico-mobile">
            <button class="ico-title-img-mobile" type="button" data-toggle="collapse" data-target="#collapseOngoing<?php echo $cont; ?>" aria-expanded="false" aria-controls="collapseOngoing<?php echo $cont; ?>">
                <div>
                  <div>
                    <img src="{{IMAGE_BASE_URL}}{{$data->image_url}}" height="50" width="50">
                  </div>

                  <div>
                      <a href="{{url('/')}}/ico_view/{{$data->id}}">{{$data->title}}</a>
                      <br>
                      @if($data->rating == 5)
                    <span class="col-12 ion_icon">
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      </span>
                      @elseif($data->rating == 4)
                    <span class="col-12 ion_icon">
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      </span>
                      @elseif($data->rating == 3)
                    <span class="col-12 ion_icon">
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      </span>
                      @elseif($data->rating == 2)
                    <span class="col-12 ion_icon">
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      </span>
                      @elseif($data->rating == 1)
                    <span class="col-12 ion_icon">
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px;"></i>
                      </span>
                      @endif
                    </div>
                  </div>
              </button>
              <div class="collapse" id="collapseOngoing<?php echo $cont++; ?>">
                <div class="ico-icons-mobile">
                  <div>
                    <p>LINKS</p>
                  </div>
                  <div>
                    <a href="{{$data->website}}">
                      <i class="fa fa-2x fa-globe"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->whitepaper}}">
                      <i class="fa fa-2x fa-file"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->twitter}}">
                      <i class="fa fa-2x fa-twitter" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->youtube}}">
                      <i class="fa fa-2x fa-youtube" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->facebook}}">
                      <i class="fa fa-2x fa-facebook-square" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->slack}}">
                      <i class="fa fa-2x fa-slack" aria-hidden="true" style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->linkedin}}">
                      <i class="fa fa-2x fa-linkedin" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->github}}">
                      <i class="fa fa-2x fa-github" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->telegram}}">
                      <i class="fa fa-2x fa-telegram" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->reddit}}">
                      <i class="fa fa-2x fa-reddit" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                  </div>
                </div>
                <div class="ico-icons-mobile">
                  <div>
                    <p>CATEGORY</p>
                  </div>
                  <div>
                    <p style="color: #626b7f !important"><strong>{{$data->category}}</strong></p>
                  </div>
                </div>
                <div class="ico-icons-mobile !important">
                  <div>
                    <p>TIMELINE</p>
                  </div>
                  <div>
                    <p style="color: #626b7f !important">
                      <?php 
                        $cur_date = date("Y-m-d");
                        $date1=date_create($cur_date);
                        $date2=date_create($data->end_date);
                        $diff=date_diff($date1,$date2);      
                      ?>
                      <div id="progress-bar" style="color: #626b7f !important">
                        <!--div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 52%" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100">       
                              <?php echo $diff->format("%R%a days"); ?> to end.
                            </div>
                        </div-->
                        <strong>{{$data->start_date}} to {{$data->end_date}}</strong>
                      </div>
                    </p>
                  </div>
                </div>
              </div>
          </div>
        @endforeach
        <?php 
          if($cont == 0):
        ?>
            <div style="font-size: 26px !important; text-align: center; padding: 20px 0;">
              No results found
            </div>
        <?php   
          endif;
        ?>
      </div> <!-- End tab 1 -->
      <div class="tab-pane" id="tab_2_mobile">
        <?php $cont=0;?>
        @foreach($current as $data)
          <div class="ico-mobile">
            <button class="ico-title-img-mobile" type="button" data-toggle="collapse" data-target="#collapseOngoing<?php echo $cont; ?>" aria-expanded="false" aria-controls="collapseOngoing<?php echo $cont; ?>">
                <div>
                  <div>
                    <img src="{{IMAGE_BASE_URL}}{{$data->image_url}}" height="50" width="50">
                  </div>

                  <div>
                      <a href="{{url('/')}}/ico_view/{{$data->id}}">{{$data->title}}</a>
                      <br>
                      @if($data->rating == 5)
                    <span class="col-12 ion_icon">
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      </span>
                      @elseif($data->rating == 4)
                    <span class="col-12 ion_icon">
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      </span>
                      @elseif($data->rating == 3)
                    <span class="col-12 ion_icon">
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      </span>
                      @elseif($data->rating == 2)
                    <span class="col-12 ion_icon">
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      </span>
                      @elseif($data->rating == 1)
                    <span class="col-12 ion_icon">
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px;"></i>
                      </span>
                      @endif
                    </div>
                  </div>
              </button>
              <div class="collapse" id="collapseOngoing<?php echo $cont++; ?>">
                <div class="ico-icons-mobile">
                  <div>
                    <p>LINKS</p>
                  </div>
                  <div>
                    <a href="{{$data->website}}">
                      <i class="fa fa-2x fa-globe"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->whitepaper}}">
                      <i class="fa fa-2x fa-file"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->twitter}}">
                      <i class="fa fa-2x fa-twitter" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->youtube}}">
                      <i class="fa fa-2x fa-youtube" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->facebook}}">
                      <i class="fa fa-2x fa-facebook-square" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->slack}}">
                      <i class="fa fa-2x fa-slack" aria-hidden="true" style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->linkedin}}">
                      <i class="fa fa-2x fa-linkedin" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->github}}">
                      <i class="fa fa-2x fa-github" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->telegram}}">
                      <i class="fa fa-2x fa-telegram" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->reddit}}">
                      <i class="fa fa-2x fa-reddit" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                  </div>
                </div>
                <div class="ico-icons-mobile">
                  <div>
                    <p>CATEGORY</p>
                  </div>
                  <div>
                    <p style="color: #626b7f !important"><strong>{{$data->category}}</strong></p>
                  </div>
                </div>
                <div class="ico-icons-mobile !important">
                  <div>
                    <p>TIMELINE</p>
                  </div>
                  <div>
                    <p style="color: #626b7f !important">
                      <?php 
                        $cur_date = date("Y-m-d");
                        $date1=date_create($cur_date);
                        $date2=date_create($data->end_date);
                        $diff=date_diff($date1,$date2);      
                      ?>
                      <div id="progress-bar" style="color: #626b7f !important">
                        <!--div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 52%" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100">       
                              <?php echo $diff->format("%R%a days"); ?> to end.
                            </div>
                        </div-->
                        <strong>{{$data->start_date}} to {{$data->end_date}}</strong>
                      </div>
                    </p>
                  </div>
                </div>
              </div>
          </div>
        @endforeach
        <?php 
          if($cont == 0):
        ?>
            <div style="font-size: 26px !important; text-align: center; padding: 20px 0;">
              No results found
            </div>
        <?php   
          endif;
        ?>
      </div> <!-- End tab 2 -->
      <div class="tab-pane" id="tab_3_mobile">
        <?php $cont=0;?>
        @foreach($ended as $data)
          <div class="ico-mobile">
            <button class="ico-title-img-mobile" type="button" data-toggle="collapse" data-target="#collapseEnded<?php echo $cont; ?>" aria-expanded="false" aria-controls="collapseEnded<?php echo $cont; ?>">
                <div>
                  <div>
                    <img src="{{IMAGE_BASE_URL}}{{$data->image_url}}" height="50" width="50">
                  </div>

                  <div>
                      <a href="{{url('/')}}/ico_view/{{$data->id}}">{{$data->title}}</a>
                      <br>
                      @if($data->rating == 5)
                    <span class="col-12 ion_icon">
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      </span>
                      @elseif($data->rating == 4)
                    <span class="col-12 ion_icon">
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      </span>
                      @elseif($data->rating == 3)
                    <span class="col-12 ion_icon">
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      </span>
                      @elseif($data->rating == 2)
                    <span class="col-12 ion_icon">
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      </span>
                      @elseif($data->rating == 1)
                    <span class="col-12 ion_icon">
                      <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                      <i class="ion-star " style="color:#5f635f8f;font-size: 12px;"></i>
                      </span>
                      @endif
                    </div>
                  </div>
              </button>
              <div class="collapse" id="collapseEnded<?php echo $cont++; ?>">
                <div class="ico-icons-mobile">
                  <div>
                    <p>LINKS</p>
                  </div>
                  <div>
                    <a href="{{$data->website}}">
                      <i class="fa fa-2x fa-globe"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->whitepaper}}">
                      <i class="fa fa-2x fa-file"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->twitter}}">
                      <i class="fa fa-2x fa-twitter" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->youtube}}">
                      <i class="fa fa-2x fa-youtube" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->facebook}}">
                      <i class="fa fa-2x fa-facebook-square" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->slack}}">
                      <i class="fa fa-2x fa-slack" aria-hidden="true" style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->linkedin}}">
                      <i class="fa fa-2x fa-linkedin" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->github}}">
                      <i class="fa fa-2x fa-github" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->telegram}}">
                      <i class="fa fa-2x fa-telegram" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                    <a href="{{$data->reddit}}">
                      <i class="fa fa-2x fa-reddit" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #626b7f"></i>
                    </a>
                  </div>
                </div>
                <div class="ico-icons-mobile">
                  <div>
                    <p>CATEGORY</p>
                  </div>
                  <div>
                    <p style="color: #626b7f !important"><strong>{{$data->category}}</strong></p>
                  </div>
                </div>
                <div class="ico-icons-mobile !important">
                  <div>
                    <p>TIMELINE</p>
                  </div>
                  <div>
                    <p style="color: #626b7f !important"><strong>Completed</strong></p>
                  </div>
                </div>
              </div>
          </div>
        @endforeach
        <?php 
          if($cont == 0):
        ?>
            <div style="font-size: 26px !important; text-align: center; padding: 20px 0;">
              No results found
            </div>
        <?php   
          endif;
        ?>
      </div><!-- End tab 3-->
    </div> <!-- /.tab-content -->
  </div>
</div>


<div class="outer ico-desktop-display">
  <div class="r">
      <div class="row">
          <div class="col-lg-12">                 
            <div class="nav-tabs-custom ico-table">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#tab_1" class="nav-link active" data-toggle="tab">Upcoming</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab_2" class="nav-link" data-toggle="tab">Ongoing</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab_3" class="nav-link" data-toggle="tab">Ended</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                      <div class="row no-gutters">    
                        <div class="full-width">
                          <div class="m-t-35 table-responsive">
                            <table class="table table-bordered table-striped flip-content">
                              <thead class="flip-content">
                                <tr>  
                                  <th>#</th>
                                  <th>ICO</th> 
                                  <th>Links</th> 
                                  <th>Category</th>  
                                  <th>Timeline</th>
                                </tr>
                              </thead> 
                              <tbody>
                                <?php $cont = 0 ?>
                                @foreach($upcoming as $data)
                                  <?php $cont++; ?>
                                <tr>
                                  <td style="width: 20px">
                                    <?php echo $cont; ?>
                                  </td>
                                  <td class="ico-title-img">
                                    <div>
                                      <div>
                                        <img src="{{IMAGE_BASE_URL}}{{$data->image_url}}" height="50" width="50">
                                      </div>

                                      <div>
                                          <a href="{{url('/')}}/ico_view/{{$data->id}}">{{$data->title}}</a>
                                          <br>
                                          @if($data->rating == 5)
                                        <span class="col-12 ion_icon">
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          </span>
                                          @elseif($data->rating == 4)
                                        <span class="col-12 ion_icon">
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                          </span>
                                          @elseif($data->rating == 3)
                                        <span class="col-12 ion_icon">
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                          </span>
                                          @elseif($data->rating == 2)
                                        <span class="col-12 ion_icon">
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                          </span>
                                          @elseif($data->rating == 1)
                                        <span class="col-12 ion_icon">
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#5f635f8f;font-size: 12px;"></i>
                                          </span>
                                          @endif
                                        </div>
                                      <div>
                                    </td>
                                    <td>
                                      <a href="{{$data->website}}">
                                        <i class="fa fa-2x fa-globe"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                      </a>
                                      <a href="{{$data->whitepaper}}">
                                        <i class="fa fa-2x fa-file"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                      </a>
                                      <a href="{{$data->twitter}}">
                                        <i class="fa fa-2x fa-twitter" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                      </a>
                                      <a href="{{$data->youtube}}">
                                        <i class="fa fa-2x fa-youtube" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                      </a>
                                      <a href="{{$data->facebook}}">
                                        <i class="fa fa-2x fa-facebook-square" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                      </a>
                                      <a href="{{$data->slack}}">
                                        <i class="fa fa-2x fa-slack" aria-hidden="true" style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                      </a>
                                      <a href="{{$data->linkedin}}">
                                        <i class="fa fa-2x fa-linkedin" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                      </a>
                                      <a href="{{$data->github}}">
                                        <i class="fa fa-2x fa-github" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);;"></i>
                                      </a>
                                      <a href="{{$data->telegram}}">
                                        <i class="fa fa-2x fa-telegram" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                      </a>
                                      <a href="{{$data->reddit}}">
                                        <i class="fa fa-2x fa-reddit" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                      </a>
                                  </td>
                                  <td>{{$data->category}}</td>
                                  <td>
                                    <?php 
                                        $cur_date = date("Y-m-d");
                                        $date1=date_create($cur_date);
                                        $date2=date_create($data->end_date);
                                        $diff=date_diff($date1,$date2);      
                                      ?>
                                      <div id="progress-bar" style="text-align: center">
                                        <!--div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 52%" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100">       
                                              <?php echo $diff->format("%R%a days"); ?> to end.
                                            </div>
                                        </div-->
                                        {{$data->start_date}} to {{$data->end_date}}
                                      </div>
                                  </td>
                                </tr>
                                @endforeach
                                <?php 
                                  if($cont == 0):
                                ?>
                                    <td colspan="10" style="font-size: 26px !important; text-align: center;">
                                      No results found
                                    <td>
                                <?php   
                                 endif;
                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div> <!-- End tab 1 -->  
                    <div class="tab-pane" id="tab_2">
                        <div class="row no-gutters">    
                          <div class="full-width">
                            <div class="m-t-35 table-responsive">
                              <table class="table table-bordered table-striped flip-content">
                                  <thead class="flip-content">
                                <tr>  
                                  <th>#</th>
                                  <th>ICO</th> 
                                  <th>Links</th> 
                                  <th>Category</th>  
                                  <th>Timeline</th>
                                </tr>
                              </thead> 
                              <tbody>
                                <?php $cont = 0 ?>
                                @foreach($current as $data)
                                  <?php $cont++; ?>
                                <tr>
                                  <td style="width: 20px">
                                    <?php echo $cont; ?>
                                  </td>
                                  <td class="ico-title-img">
                                    <div>
                                      <div>
                                        <img src="{{IMAGE_BASE_URL}}{{$data->image_url}}" height="50" width="50">
                                      </div>

                                      <div>
                                          <a href="{{url('/')}}/ico_view/{{$data->id}}">{{$data->title}}</a>
                                          <br>
                                          @if($data->rating == 5)
                                        <span class="col-12 ion_icon">
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          </span>
                                          @elseif($data->rating == 4)
                                        <span class="col-12 ion_icon">
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                          </span>
                                          @elseif($data->rating == 3)
                                        <span class="col-12 ion_icon">
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                          </span>
                                          @elseif($data->rating == 2)
                                        <span class="col-12 ion_icon">
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                          </span>
                                          @elseif($data->rating == 1)
                                        <span class="col-12 ion_icon">
                                          <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                          <i class="ion-star " style="color:#5f635f8f;font-size: 12px;"></i>
                                          </span>
                                          @endif
                                        </div>
                                      <div>
                                    </td>
                                    <td>
                                      <a href="{{$data->website}}">
                                        <i class="fa fa-2x fa-globe"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                      </a>
                                      <a href="{{$data->whitepaper}}">
                                        <i class="fa fa-2x fa-file"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                      </a>
                                      <a href="{{$data->twitter}}">
                                        <i class="fa fa-2x fa-twitter" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                      </a>
                                      <a href="{{$data->youtube}}">
                                        <i class="fa fa-2x fa-youtube" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                      </a>
                                      <a href="{{$data->facebook}}">
                                        <i class="fa fa-2x fa-facebook-square" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                      </a>
                                      <a href="{{$data->slack}}">
                                        <i class="fa fa-2x fa-slack" aria-hidden="true" style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                      </a>
                                      <a href="{{$data->linkedin}}">
                                        <i class="fa fa-2x fa-linkedin" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                      </a>
                                      <a href="{{$data->github}}">
                                        <i class="fa fa-2x fa-github" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                      </a>
                                      <a href="{{$data->telegram}}">
                                        <i class="fa fa-2x fa-telegram" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                      </a>
                                      <a href="{{$data->reddit}}">
                                        <i class="fa fa-2x fa-reddit" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                      </a>
                                  </td>
                                  <td>{{$data->category}}</td>
                                  <td>
                                    <?php 
                                        $cur_date = date("Y-m-d");
                                        $date1=date_create($cur_date);
                                        $date2=date_create($data->end_date);
                                        $diff=date_diff($date1,$date2);      
                                      ?>
                                      <div id="progress-bar" style="text-align: center">
                                        <!--div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 52%" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100">       
                                              <?php echo $diff->format("%R%a days"); ?> to end.
                                            </div>
                                        </div-->
                                        {{$data->start_date}} to {{$data->end_date}}
                                      </div>
                                  </td>
                                </tr>
                                @endforeach
                                <?php 
                                  if($cont == 0):
                                ?>
                                    <td colspan="10" style="font-size: 26px !important; text-align: center;">
                                      No results found
                                    <td>
                                <?php   
                                 endif;
                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div> <!-- End tab 2 -->
                    <div class="tab-pane" id="tab_3">
                        <div class="row no-gutters">
                              
                          <div class="full-width">
                            <div class="m-t-35 table-responsive">
                              <table class="table table-bordered table-striped flip-content">
                                <thead class="flip-content">
                                  <tr>  
                                    <th>#</th>
                                    <th>ICO</th> 
                                    <th>Links</th> 
                                    <th>Category</th>  
                                    <th>Timeline</th>
                                  </tr>
                                </thead> 
                                <tbody>
                                  <?php $cont = 0 ?>
                                  @foreach($ended as $data)
                                    <?php $cont++; ?>
                                  <tr>
                                    <td style="width: 20px">
                                      <?php echo $cont; ?>
                                    </td>
                                    <td class="ico-title-img">
                                      <div>
                                        <div>
                                          <img src="{{IMAGE_BASE_URL}}{{$data->image_url}}" height="50" width="50">
                                        </div>

                                        <div>
                                            <a href="{{url('/')}}/ico_view/{{$data->id}}">{{$data->title}}</a>
                                            <br>
                                            @if($data->rating == 5)
                                          <span class="col-12 ion_icon">
                                            <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                            <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                            <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                            <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                            <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                            </span>
                                            @elseif($data->rating == 4)
                                          <span class="col-12 ion_icon">
                                            <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                            <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                            <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                            <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                            <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                            </span>
                                            @elseif($data->rating == 3)
                                          <span class="col-12 ion_icon">
                                            <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                            <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                            <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                            <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                            <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                            </span>
                                            @elseif($data->rating == 2)
                                          <span class="col-12 ion_icon">
                                            <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                            <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                            <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                            <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                            <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                            </span>
                                            @elseif($data->rating == 1)
                                          <span class="col-12 ion_icon">
                                            <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                            <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                            <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                            <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                            <i class="ion-star " style="color:#5f635f8f;font-size: 12px;"></i>
                                            </span>
                                            @endif
                                          </div>
                                        <div>
                                      </td>
                                      <td>
                                        <a href="{{$data->website}}">
                                          <i class="fa fa-2x fa-globe"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                        </a>
                                        <a href="{{$data->whitepaper}}">
                                          <i class="fa fa-2x fa-file"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                        </a>
                                        <a href="{{$data->twitter}}">
                                          <i class="fa fa-2x fa-twitter" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: rgba(255,255,255,0.6);"></i>
                                        </a>
                                        <a href="{{$data->youtube}}">
                                          <i class="fa fa-2x fa-youtube" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color:rgba(255,255,255,0.6);"></i>
                                        </a>
                                        <a href="{{$data->facebook}}">
                                          <i class="fa fa-2x fa-facebook-square" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color:rgba(255,255,255,0.6);"></i>
                                        </a>
                                        <a href="{{$data->slack}}">
                                          <i class="fa fa-2x fa-slack" aria-hidden="true" style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color:rgba(255,255,255,0.6);"></i>
                                        </a>
                                        <a href="{{$data->linkedin}}">
                                          <i class="fa fa-2x fa-linkedin" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color:rgba(255,255,255,0.6);"></i>
                                        </a>
                                        <a href="{{$data->github}}">
                                          <i class="fa fa-2x fa-github" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color:rgba(255,255,255,0.6);"></i>
                                        </a>
                                        <a href="{{$data->telegram}}">
                                          <i class="fa fa-2x fa-telegram" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color:rgba(255,255,255,0.6);"></i>
                                        </a>
                                        <a href="{{$data->reddit}}">
                                          <i class="fa fa-2x fa-reddit" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color:rgba(255,255,255,0.6);"></i>
                                        </a>
                                    </td>
                                      <td>{{$data->category}}</td>
                                      <td style="text-align: center">Completed</td>
                                  </tr>
                                  @endforeach
                                  <?php 
                                  if($cont == 0):
                                  ?>
                                      <td colspan="10" style="font-size: 26px !important; text-align: center;">
                                        No results found
                                      <td>
                                  <?php   
                                  endif;
                                  ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                    </div> <!-- End tab 3 -->
                </div>
            </div><!-- nav-tabs-custom -->                        
          </div>
          <!-- All tab -->
      </div>
  </div>
</div>






<?php /*<div class="outer">
                <div class="r">
                    <div class="row">

                        <div class="col-lg-12">

                            <div class="">
                                <div class="">
                                    <br>

                                    <h5><strong>ICO</strong></h5>
                                    <br>
                                </div>
                                <div class="">
                                    <div>
                                        <div class="nav-tabs-custom tabs-single ico-table">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                    <a href="#tab_1" class="nav-link active" data-toggle="tab">Upcoming</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#tab_2" class="nav-link" data-toggle="tab">Ongoing</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#tab_3" class="nav-link" data-toggle="tab">Ended</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">

                                                <div class="tab-pane active" id="tab_1">
                                                    <div class="row no-gutters">
                                                      
                                                        <div class="full-width">
                                                        <div class="m-t-35 table-responsive">
                                                          <table class="table table-bordered table-striped">
                                                              <thead class="flip-content">
                                                            <tr> 
                                                              <th>ICO</th> 
                                                              <th>Image</th> 
                                                              <th>Category</th> 
                                                              <th>Short Description</th>  
                                                              <th>Timeline</th> 
                                                              <th>
                                                                <i class="fa fa-2x fa-telegram" aria-hidden="true"></i></th>
                                                              <th>
                                                                <i class="fa fa-2x fa-reddit" aria-hidden="true"></i>
                                                              </th>
                                                              <th><i class="fa fa-2x fa-twitter" aria-hidden="true"></i>
                                                              </th>
                                                              <th>
                                                                <i class="fa fa-2x fa-youtube" aria-hidden="true"></i>
                                                              </th>
                                                              <th>
                                                                <i class="fa fa-2x fa-linkedin" aria-hidden="true"></i>
                                                              </th>
                                                              <th width="200">Social Links</th> 
                                                            </tr>
                                                          </thead> 
                                                          <tbody>
                                                            @foreach($upcoming as $data)
                                                            <tr>
                                                              <td><a href="{{url('/')}}/ico_view/{{$data->id}}">{{$data->title}}</a>
                                                                <br>
                                                                @if($data->rating == 5)
                                                               <span class="col-12 ion_icon">
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                 </span>
                                                                 @elseif($data->rating == 4)
                                                               <span class="col-12 ion_icon">
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                 </span>
                                                                 @elseif($data->rating == 3)
                                                               <span class="col-12 ion_icon">
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                 </span>
                                                                 @elseif($data->rating == 2)
                                                               <span class="col-12 ion_icon">
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                 </span>
                                                                 @elseif($data->rating == 1)
                                                               <span class="col-12 ion_icon">
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px;"></i>
                                                                 </span>
                                                                 @endif
                                                                
                                                                  </td>
                                                              <td>
                                                                <img src="{{IMAGE_BASE_URL}}{{$data->image_url}}" height="50" width="50">
                                                              </td>
                                                              <td>{{$data->category}}</td>
                                                              <td style="max-width: 168px;min-width: 180px;">{{$data->short_description}}</td>
                                                              <td>

                                                               <?php 
                                                              $cur_date = date("Y-m-d");
                                                              $date1=date_create($cur_date);
                                                              $date2=date_create($data->start_date);
                                                              $diff=date_diff($date1,$date2);
                                                              //echo $diff->format("%R%a days");
                                                              ?> 
                                          <div id="progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 52%" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100">
                                                  
                                                <?php echo $diff->format("%R%a days"); ?> to start.
                                                </div>
                                            </div>{{$data->start_date}} to {{$data->end_date}}
                                                              </td>
                                                              <td> @if($data->telegram_follow != "" )
                                                                {{$data->telegram_follow}}
                                                                 @else
                                                                    --
                                                               @endif
                                                              </td>
                                                              <td>@if($data->reddit_follow != "" ) {{$data->reddit_follow}} @else -- @endif </td>
                                                              <td>@if($data->twitter_follow != "" ) {{$data->twitter_follow}} @else --
                                                              @endif</td>
                                                              <td>@if($data->youtube_follow != "" ) {{$data->youtube_follow}} @else -- @endif </td>
                                                              <td>@if($data->linkedin_follow != "" ) {{$data->linkedin_follow}} @else -- @endif </td> 
                                                              <td>
                                                <a href="{{$data->website}}">
                                              <i class="fa fa-2x fa-globe"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->whitepaper}}">
                                              <i class="fa fa-2x fa-file"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->twitter}}">
                                              <i class="fa fa-2x fa-twitter" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->youtube}}">
                                              <i class="fa fa-2x fa-youtube" aria-hidden="true" style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->facebook}}">
                                              <i class="fa fa-2x fa-facebook-square" aria-hidden="true" style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->slack}}">
                                              <i class="fa fa-2x fa-slack" aria-hidden="true" style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->linkedin}}">
                                              <i class="fa fa-2x fa-linkedin" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->github}}">
                                              <i class="fa fa-2x fa-github" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->telegram}}">
                                              <i class="fa fa-2x fa-telegram" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->reddit}}">
                                              <i class="fa fa-2x fa-reddit" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                                              </td>
                                                            </tr>
                                                            @endforeach
                                                          </tbody>
                                                        </table>
                                                    </div>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="tab_2">
                                                    <div class="row no-gutters">
                                                        
                                                      <div class="full-width">
                                                        <div class="m-t-35 table-responsive">
                                                          <table class="table table-bordered table-striped flip-content">
                                                              <thead class="flip-content">
                                                            <tr> 
                                                              <th>ICO</th> 
                                                              <th>Image</th> 
                                                              <th>Category</th> 
                                                              <th>Short Description</th>  
                                                              <th>Timeline</th> 
                                                              <th><i class="fa fa-2x fa-telegram" aria-hidden="true"></i></th>
                                                              <th><i class="fa fa-2x fa-reddit" aria-hidden="true"></i></th>
                                                              <th><i class="fa fa-2x fa-twitter" aria-hidden="true"></i></th>
                                                              <th><i class="fa fa-2x fa-youtube" aria-hidden="true"></i></th>
                                                              <th><i class="fa fa-2x fa-linkedin" aria-hidden="true"></i></th>
                                                              <th width="200">Social Links</th> 
                                                            </tr>
                                                          </thead> 
                                                          <tbody>
                                                            @foreach($current as $data)
                                                            <tr>
                                                                
                                                              <td><a href="{{url('/')}}/ico_view/{{$data->id}}">{{$data->title}}</a>
                                                               <br>
                                                                @if($data->rating == 5)
                                                               <span class="col-12 ion_icon">
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                 </span>
                                                                 @elseif($data->rating == 4)
                                                               <span class="col-12 ion_icon">
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                 </span>
                                                                 @elseif($data->rating == 3)
                                                               <span class="col-12 ion_icon">
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                 </span>
                                                                 @elseif($data->rating == 2)
                                                               <span class="col-12 ion_icon">
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                 </span>
                                                                 @elseif($data->rating == 1)
                                                               <span class="col-12 ion_icon">
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px;"></i>
                                                                 </span>
                                                                 @endif
                                                                 </td>
                                                              <td>
                                                                <img src="{{IMAGE_BASE_URL}}{{$data->image_url}}" height="50" width="50">
                                                              </td>
                                                              <td>{{$data->category}}</td>
                                                              <td style="max-width: 168px;min-width: 180px;">{{$data->short_description}}</td>
                                                              <td>
                                                                <?php 
                                            $cur_date = date("Y-m-d");
                                            $date1=date_create($cur_date);
                                            $date2=date_create($data->end_date);
                                            $diff=date_diff($date1,$date2);
                                            
                                            ?>
                                            <div id="progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 52%" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100">
                                                  
                                                <?php echo $diff->format("%R%a days"); ?> to end.
                                                </div>
                                            </div>{{$data->start_date}} - {{$data->end_date}}
                                                              </td>
                                                              <td> @if($data->telegram_follow != "" )
                                                                {{$data->telegram_follow}}
                                                                 @else
                                                                    --
                                                               @endif
                                                              </td>
                                                              <td>@if($data->reddit_follow != "" ) {{$data->reddit_follow}} @else -- @endif </td>
                                                              <td>@if($data->twitter_follow != "" ) {{$data->twitter_follow}} @else --
                                                              @endif</td>
                                                              <td>@if($data->youtube_follow != "" ) {{$data->youtube_follow}} @else -- @endif </td>
                                                              <td>@if($data->linkedin_follow != "" ) {{$data->linkedin_follow}} @else -- @endif </td> 
                                                              <td>
                                                                <a href="{{$data->website}}">
                                              <i class="fa fa-2x fa-globe"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->whitepaper}}">
                                              <i class="fa fa-2x fa-file"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->twitter}}">
                                              <i class="fa fa-2x fa-twitter" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->youtube}}">
                                              <i class="fa fa-2x fa-youtube" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->facebook}}">
                                              <i class="fa fa-2x fa-facebook-square" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->slack}}">
                                              <i class="fa fa-2x fa-slack" aria-hidden="true" style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->linkedin}}">
                                              <i class="fa fa-2x fa-linkedin" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->github}}">
                                              <i class="fa fa-2x fa-github" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->telegram}}">
                                              <i class="fa fa-2x fa-telegram" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->reddit}}">
                                              <i class="fa fa-2x fa-reddit" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                                              </td>
                                                            </tr>
                                                            @endforeach
                                                          </tbody>
                                                        </table>
                                                </div>
                                              </div>
                                                    </div>
                                                    <!-- /thumnail helper gallery -->
                                                </div>

                                                <!-- /standard gallery -->
                                                <div class="tab-pane" id="tab_3">
                                                    <div class="row no-gutters">
                                                         
                                                     <div class="full-width">
                                                        <div class="m-t-35 table-responsive">
                                                          <table class="table table-bordered table-striped flip-content">
                                                              <thead class="flip-content">
                                                            <tr>  
                                                              <th>ICO</th> 
                                                              <th>Image</th> 
                                                              <th>Category</th> 
                                                              <th>Short Description</th>  
                                                              <th>Timeline</th>
                                                              <th><i class="fa fa-2x fa-telegram" aria-hidden="true"></i></th>
                                                              <th><i class="fa fa-2x fa-reddit" aria-hidden="true"></i></th>
                                                              <th><i class="fa fa-2x fa-twitter" aria-hidden="true"></i></th>
                                                              <th><i class="fa fa-2x fa-youtube" aria-hidden="true"></i></th>
                                                              <th><i class="fa fa-2x fa-linkedin" aria-hidden="true"></i></th> 
                                                              <th width="200">Social Links</th>
                                                            </tr>
                                                          </thead> 
                                                          <tbody>
                                                            @foreach($ended as $data)
                                                            <tr>
                                                              <td><a href="{{url('/')}}/ico_view/{{$data->id}}">{{$data->title}}</a>
                                                                <br>
                                                                @if($data->rating == 5)
                                                               <span class="col-12 ion_icon">
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                 </span>
                                                                 @elseif($data->rating == 4)
                                                               <span class="col-12 ion_icon">
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                 </span>
                                                                 @elseif($data->rating == 3)
                                                               <span class="col-12 ion_icon">
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                 </span>
                                                                 @elseif($data->rating == 2)
                                                               <span class="col-12 ion_icon">
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                 </span>
                                                                 @elseif($data->rating == 1)
                                                               <span class="col-12 ion_icon">
                                                                <i class="ion-star " style="color:#f39c12;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px"></i>
                                                                <i class="ion-star " style="color:#5f635f8f;font-size: 12px;"></i>
                                                                 </span>
                                                                 @endif</td>
                                                              <td>
                                                                <img src="{{IMAGE_BASE_URL}}{{$data->image_url}}" height="50" width="50">
                                                              </td>
                                                              <td>{{$data->category}}</td>
                                                              <td style="max-width: 168px;min-width: 180px;">{{$data->short_description}}</td>
                                                              <td>Completed</td>
                                                              <td> @if($data->telegram_follow != "" )
                                                                {{$data->telegram_follow}}
                                                                 @else
                                                                    --
                                                               @endif
                                                              </td>
                                                              <td>@if($data->reddit_follow != "" ) {{$data->reddit_follow}} @else -- @endif </td>
                                                              <td>@if($data->twitter_follow != "" ) {{$data->twitter_follow}} @else --
                                                              @endif</td>
                                                              <td>@if($data->youtube_follow != "" ) {{$data->youtube_follow}} @else -- @endif </td>
                                                              <td>@if($data->linkedin_follow != "" ) {{$data->linkedin_follow}} @else -- @endif </td> <td>
                                                                <a href="{{$data->website}}">
                                              <i class="fa fa-2x fa-globe"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->whitepaper}}">
                                              <i class="fa fa-2x fa-file"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->twitter}}">
                                              <i class="fa fa-2x fa-twitter" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->youtube}}">
                                              <i class="fa fa-2x fa-youtube" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->facebook}}">
                                              <i class="fa fa-2x fa-facebook-square" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->slack}}">
                                              <i class="fa fa-2x fa-slack" aria-hidden="true" style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->linkedin}}">
                                              <i class="fa fa-2x fa-linkedin" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->github}}">
                                              <i class="fa fa-2x fa-github" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->telegram}}">
                                              <i class="fa fa-2x fa-telegram" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->reddit}}">
                                              <i class="fa fa-2x fa-reddit" aria-hidden="true"  style="font-size: 1.4em;margin-bottom: 10px;margin-right:10px;color: #8dc647;"></i>
                                            </a>
                                                              </td>
                                                            </tr>
                                                            @endforeach
                                                          </tbody>
                                                        </table>
                                                </div>
                                                </div>
                                                    </div>
                                                </div>
                                                <!-- /thumnail helper gallery -->
                                            </div>
                                            <!-- /.tab-content -->
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
        */?>


</div>
</div> 
</div> 
<script src="{{ URL::asset("public/pages/icons.js")}}"></script>
@endsection
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5afec5426d44f1e2"></script>