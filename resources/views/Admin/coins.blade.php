@extends('Admin.master')

@section('title')

Coins

@endsection

@section('content')
                      

<div id="wrap">
<div class="wrapper">
<div id="content" class="bg-container">



<div class="outer coins">
                <div class="inner bg-light lter bg-container">
                    <div class="row">

                        <div class="col-lg-12">

                            <div class="card">
                                <!--div class="card-header bg-white">
                                  Coins
                                </div-->
                                <div class="card-block m-t-35">
                                    <table  id="example1" class="display table table-stripped table-bordered"> 
                                      <thead>
                                        <tr> 
                                          <th>Name</th> 
                                          <th>Price</th>             
                                          <!--th>% change 24th</th> 
                                          <th>Volume 24th</th> 
                                          <th>Market Cap</th--> 
                                          <th>Image</th>                          
                                          <!--th>Chart</th--> 
                                          <th>Action</th> 
                                          <th>Delete</td>
                                        </tr>
                                      </thead> 
                                      <tbody>
                                        @foreach($data as $d)
                                        <tr>
                                          <td>{{$d->name}}</td>
                                          <td>{{$d->price}}</td>
                                          <!--td>{{$d->percent_change_24h}}</td>
                                          <td>{{$d->volume_24h}}</td>
                                          <td>{{$d->market_cap}}</td-->
                                          <td><img src="{{$d->image_url}}" height="50" width="50"></td>
                                          <!--td><img src="{{$d->chart_image}}" height="100" width="100"></td-->
                                          @if($d->status==1)
                                          <td>
                                            <button type="button" class="btn btn-info " data-toggle="modal" data-target="#{{$d->id}}">
                                                <i class="fa  fa-times" aria-hidden="true"></i>
                                            </button>
                                          </td>
                                          @endif
                                          @if($d->status==0)
                                          <td>
                                            <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#d{{$d->id}}">
                                                <i class="fa  fa-check-square" aria-hidden="true"></i>
                                            </button>
                                          </td>
                                          @endif
                                          <td>
                                              <form action="/admin/ico/delete/{{$d->id}}" method="GET">
                                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                  <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                              </form>
                                          </td>
                                        </tr>

                                         <div id="{{$d->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Are you sure to deactivate {{$d->name}} ? </h4>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <a href="{{url('/')}}/admin/coins/deactivate/{{$d->id}}" class="btn btn-danger" >Yes</a>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div id="d{{$d->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Are you sure to activate {{$d->name}} ? </h4>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <a href="{{url('/')}}/admin/coins/activate/{{$d->id}}" class="btn btn-danger" >Yes</a>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
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

<div id="right">
        <div class="right_content">
            <div class="well-small dark m-t-15">
                <div class="row m-0">
                    <div class="col-lg-12 p-d-0">
                        <div class="skinmulti_btn" onclick="javascript:loadjscssfile('blue_black_skin.css','css')">
                            <div class="skin_blue skin_size b_t_r"></div>
                            <div class="skin_blue_border skin_shaddow skin_size b_b_r"></div>
                        </div>
                        <div class="skinmulti_btn" onclick="javascript:loadjscssfile('green_black_skin.css','css')">
                            <div class="skin_green skin_size b_t_r"></div>
                            <div class="skin_green_border skin_shaddow skin_size b_b_r"></div>
                        </div>
                        <div class="skinmulti_btn" onclick="javascript:loadjscssfile('purple_black_skin.css','css')">
                            <div class="skin_purple skin_size b_t_r"></div>
                            <div class="skin_purple_border skin_shaddow skin_size b_b_r"></div>
                        </div>
                        <div class="skinmulti_btn" onclick="javascript:loadjscssfile('orange_black_skin.css','css')">
                            <div class="skin_orange skin_size b_t_r"></div>
                            <div class="skin_orange_border skin_shaddow skin_size b_b_r"></div>
                        </div>
                        <div class="skinmulti_btn" onclick="javascript:loadjscssfile('red_black_skin.css','css')">
                            <div class="skin_red skin_size b_t_r"></div>
                            <div class="skin_red_border skin_shaddow skin_size b_b_r"></div>
                        </div>
                        <div class="skinmulti_btn" onclick="javascript:loadjscssfile('mint_black_skin.css','css')">
                            <div class="skin_mint skin_size b_t_r"></div>
                            <div class="skin_mint_border skin_shaddow skin_size b_b_r"></div>
                        </div>
                        <!--</div>-->
                        <div class="skin_btn skinsingle_btn skin_blue b_r height_40 skin_shaddow"
                             onclick="javascript:loadjscssfile('blue_skin.css','css')"></div>
                        <div class="skin_btn skinsingle_btn skin_green b_r height_40 skin_shaddow"
                             onclick="javascript:loadjscssfile('green_skin.css','css')"></div>
                        <div class="skin_btn skinsingle_btn skin_purple b_r height_40 skin_shaddow"
                             onclick="javascript:loadjscssfile('purple_skin.css','css')"></div>
                        <div class="skin_btn  skinsingle_btn skin_orange b_r height_40 skin_shaddow"
                             onclick="javascript:loadjscssfile('orange_skin.css','css')"></div>
                        <div class="skin_btn skinsingle_btn skin_red b_r height_40 skin_shaddow"
                             onclick="javascript:loadjscssfile('red_skin.css','css')"></div>
                        <div class="skin_btn skinsingle_btn skin_mint b_r height_40 skin_shaddow"
                             onclick="javascript:loadjscssfile('mint_skin.css','css')"></div>
                    </div>
                    <div class="col-lg-12 text-center m-t-15">
                        <button class="btn btn-dark button-rounded"
                                onclick="javascript:loadjscssfile('black_skin.css','css')">Dark
                        </button>
                        <button class="btn btn-secondary button-rounded default_skin"
                                onclick="javascript:loadjscssfile('default_skin.css','css')">Default
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- # right side -->

@endsection