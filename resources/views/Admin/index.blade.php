@extends('Admin.master')

@section('title')

{{$title->value}} dashboard

@endsection

@section('content')
   <link rel="stylesheet" type="text/css" href="{{ URL::asset("public/css/pages/icon.css")}}" />
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/vendors/themify/css/themify-icons.css")}}" />
    <!-- Plugin styles-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("public/vendors/ionicons/css/ionicons.min.css")}}" />

  <style type="text/css">
    h6{
      color:#446220;
    }
  </style>                    

<div id="wrap">
<div class="wrapper">
<div id="content" class="bg-container">
<div class="outer">
                <div class="inner bg-light lter bg-container">
                    <div class="row">

                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header bg-white">
                                    ICO
                                    <button type="button" 
                                    class="btn btn-labeled btn-secondary right_btn_padding_left" style="float: right;border: 1px solid #3c6708">
                                                <span class="btn-label btn_angle_left">
                                                    <i class="fa fa-plus"></i>
                                                </span>
                                                     <a href="{{url('/')}}/admin/new_ico">  Add new <a>
                                                   </button>
                                </div>
                                <div class="card-block m-t-35">
                                    <table class="table table-bordered table-striped flip-content"> 
                                      <thead class="flip-content">
                                        <tr> 
                                          <th>ICO</th> 
                                          <th>Image</th> 
                                          <th>Category</th> 
                                          <!--th colspan="3">Short Description</th--> 
                                          <!--th>Link</th--> 
                                          <th>Start date</th> 
                                          <th>End date</th> 
                                          <th>Action</th>
                                        </tr>
                                      </thead> 
                                      <tbody>
                                        @foreach($ico as $data)
                                        <tr>
                                          <td>
                                            <span>
                                              {{$data->title}}
                                            </span>
                                            <br>
                                            @if($data->rating == 5 )
                                              <span class="col-12 ion_icon">
                                              <i class="ion-star " style="color:#f39c12;font-size: 15px"></i>
                                              <i class="ion-star " style="color:#f39c12;font-size: 15px"></i>
                                              <i class="ion-star " style="color:#f39c12;font-size: 15px"></i>
                                              <i class="ion-star " style="color:#f39c12;font-size: 15px"></i>
                                              <i class="ion-star " style="color:#f39c12;font-size: 15px"></i>
                                                </span>
                                                @elseif($data->rating == 4)
                                              <span class="col-12 ion_icon">
                                              <i class="ion-star " style="color:#f39c12;font-size: 15px"></i>
                                              <i class="ion-star " style="color:#f39c12;font-size: 15px"></i>
                                              <i class="ion-star " style="color:#f39c12;font-size: 15px"></i>
                                              <i class="ion-star " style="color:#f39c12;font-size: 15px"></i>
                                              <i class="ion-star " style="color:#5f635f8f;font-size: 15px"></i>
                                                </span>
                                                @elseif($data->rating == 3)
                                              <span class="col-12 ion_icon">
                                              <i class="ion-star " style="color:#f39c12;font-size: 15px"></i>
                                              <i class="ion-star " style="color:#f39c12;font-size: 15px"></i>
                                              <i class="ion-star " style="color:#f39c12;font-size: 15px"></i>
                                              <i class="ion-star " style="color:#5f635f8f;font-size: 15px"></i>
                                              <i class="ion-star " style="color:#5f635f8f;font-size: 15px"></i>
                                                </span>
                                                @elseif($data->rating == 2)
                                              <span class="col-12 ion_icon">
                                              <i class="ion-star " style="color:#f39c12;font-size: 15px"></i>
                                              <i class="ion-star " style="color:#f39c12;font-size: 15px"></i>
                                              <i class="ion-star " style="color:#5f635f8f;font-size: 15px"></i>
                                              <i class="ion-star " style="color:#5f635f8f;font-size: 15px"></i>
                                              <i class="ion-star " style="color:#5f635f8f;font-size: 15px"></i>
                                                </span>
                                                @elseif($data->rating == 1)
                                              <span class="col-12 ion_icon">
                                              <i class="ion-star " style="color:#f39c12;font-size: 15px"></i>
                                              <i class="ion-star " style="color:#5f635f8f;font-size: 15px"></i>
                                              <i class="ion-star " style="color:#5f635f8f;font-size: 15px"></i>
                                              <i class="ion-star " style="color:#5f635f8f;font-size: 15px"></i>
                                              <i class="ion-star " style="color:#5f635f8f;font-size: 15px;"></i>
                                                </span>
                                              @endif
                                            </td>
                                          <td>
                                            <img src="/public/{{$data->image_url}}" height="70" width="70">
                                          </td>
                                          <td>{{$data->category}}</td>
                                          <!--td style="width:150px;" colspan="3">
                                            {{$data->short_description}}</td-->
                                          <!--td >
                                            <a href="{{$data->website}}">
                                              <i class="fa fa-2x fa-globe" style="font-size: 1em;color: #8dc647;" ></i>
                                            </a>
                                            <a href="{{$data->whitepaper}}" >
                                              <i class="fa fa-2x fa-file" style="font-size: 1em;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->twitter}}" >
                                              <i class="fa fa-2x fa-twitter" aria-hidden="true" style="font-size: 1em;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->youtube}}">
                                              <i class="fa fa-2x fa-youtube" aria-hidden="true" style="font-size: 1em;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->facebook}}" >
                                              <i class="fa fa-2x fa-facebook-square" aria-hidden="true" style="font-size: 1em;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->slack}} ">
                                              <i class="fa fa-2x fa-slack" aria-hidden="true" style="font-size: 1em;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->linkedin}}">
                                              <i class="fa fa-2x fa-linkedin" aria-hidden="true" style="font-size: 1em;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->github}}" >
                                              <i class="fa fa-2x fa-github" aria-hidden="true" style="font-size: 1em;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->telegram}}">
                                              <i class="fa fa-2x fa-telegram" aria-hidden="true" style="font-size: 1em;color: #8dc647;"></i>
                                            </a>
                                            <a href="{{$data->reddit}}">
                                              <i class="fa fa-2x fa-reddit" aria-hidden="true" style="font-size: 1em;color: #8dc647;"></i>
                                            </a>
                                          </td-->
                                          <td>{{$data->start_date}}</td>
                                          <td>
                                            <?php 
                                            $cur_date = date("Y-m-d");
                                            $date1=date_create($cur_date);
                                            $date2=date_create($data->end_date);
                                            $diff=date_diff($date1,$date2);
                                            echo $diff->format("%R%a days");
                                            ?>
                                            
                                          </td>
                                          <td class="sorting_1">
                                              <form action="/admin/index/delete/{{$data->id}}" method="GET">
                                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                  <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                              </form>
                                          </td>
                                          <!-- <td><a href="{{url('/')}}/delete_ico/{{$data->id}}">DELETE</a></td> -->
                                        </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.inner -->
            </div>
        </div>
    </div>
</div>


<script src="{{ URL::asset("public/pages/icons.js")}}"></script>
<!-- Modal -->
@endsection