@extends('Admin.master')

@section('title')

Scripts

@endsection

@section('content')
                      

<div id="wrap">
<div class="wrapper">
<div id="content" class="bg-container">



<div class="outer">
                <div class="inner bg-light lter bg-container">
                    <div class="row">

                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-header bg-white">
                                  Header scripts
                                </div>
                                <div class="card-block m-t-35">
                                  <form name="form" action="{{url('/')}}/admin/footer-update" method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="header" value="1">
                                        <div class="form-group mail_compose_wysi"> 
                                            <textarea style="min-height: 300px;" class="wysihtml5 form-control" name="value" placeholder="Description">
                                                {{$header->value}}
                                            </textarea>
                                        </div>

                                        <div class="form-group text-right m-t-20">
                                            <button type="submit" class="btn btn-primary"></i> Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header bg-white">
                                  Footer scripts
                                </div>
                                <div class="card-block m-t-35">
                                  <form name="form" action="{{url('/')}}/admin/footer-update" method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group mail_compose_wysi"> 
                                            <textarea style="min-height: 300px;" class="wysihtml5 form-control" name="value" placeholder="Description">
                                                {{$data->value}}
                                            </textarea>
                                        </div>

                                        <div class="form-group text-right m-t-20">
                                            <button type="submit" class="btn btn-primary"></i> Update</button>
                                        </div>
                                    </form>
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