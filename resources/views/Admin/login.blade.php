
<!DOCTYPE html>
<html>
<head>
    <title>{{$title->value}} | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="{{asset('resources/assets/logo.png')}}"/>
    <!--Global styles -->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/css/components.css") }}" />
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/css/custom.css") }}" />
    <!--End of Global styles -->
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/vendors/bootstrapvalidator/css/bootstrapValidator.min.css") }}"/>
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/vendors/wow/css/animate.css") }}"/>
    <!--End of Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/css/pages/login1.css") }}"/>

    <!-- global styles-->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/css/components.css") }}" />
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/css/custom.css") }}" />
    <!--end of global styles-->
    <!--plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/vendors/select2/css/select2.min.css") }}"/>
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/vendors/datatables/css/dataTables.bootstrap.min.css") }}"/>
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/css/pages/dataTables.bootstrap.css") }}"/>

    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/css/pages/tables.css") }}"/>
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/css/pages/form_elements.css") }}"/>
    <link type="text/css" rel="stylesheet" href="#" id="skin_change"/>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--End of page level styles-->
</head>
<body>
<div class="preloader" style="position: fixed;
                            width: 100%;
                            height: 100%;
                            top: 0;
                            left: 0;
                            z-index: 100000;
                            backface-visibility: hidden;
                            background: #ffffff;">
    <div class="preloader_img" style="width: 200px;
                                        height: 200px;
                                        position: absolute;
                                        left: 48%;
                                        top: 48%;
                                        background-position: center;
                                        z-index: 999999">
        <img src="{{url('/')}}/public/img/loader.gif" style=" width: 40px;" alt="loading...">
    </div>
</div>
<div class="container" >
    <div class="row">
        <div class="col-lg-8 push-lg-2 col-md-10 push-md-1 col-sm-10 push-sm-1 login_top_bottom">
            <div class="row">
                <div class="col-lg-8 push-lg-2 col-md-10 push-md-1 col-sm-12">
                  
                    <div class="bg-white login_content login_border_radius">
                        <form action="{{ action('AdminController@check_login') }}" id="login_validator" method="post" class="login_validator">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="email" class="col-form-label"> E-mail</label>
                                <div class="input-group">
                                    <span class="input-group-addon input_email"><i
                                            class="fa fa-envelope text-primary"></i></span>
                                    <input type="text" class="form-control  form-control-md" id="email" name="username" placeholder="E-mail">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon addon_password"><i
                                            class="fa fa-lock text-primary"></i></span>
                                    <input type="password" class="form-control form-control-md" id="password"   name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="submit" value="Log In" class="btn btn-primary btn-block login_button">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input form-control">
                                        <span class="custom-control-indicator"></span>
                                        <a class="custom-control-description">Keep me logged in</a>
                                    </label>
                                </div>
                                <div class="col-6 text-right forgot_pwd">
                                    <a href="forgot_password1.html" class="custom-control-description forgottxt_clr">Forgot password?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
<!-- global js -->
<script type="text/javascript" src="{{ URL::asset("public/js/jquery.min.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/js/tether.min.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/js/bootstrap.min.js") }}"></script>
<!-- end of global js-->
<!--Plugin js-->
<script type="text/javascript" src="{{ URL::asset("public/vendors/bootstrapvalidator/js/bootstrapValidator.min.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/wow/js/wow.min.js") }}"></script>
<!--End of plugin js-->
<script type="text/javascript" src="{{ URL::asset("public/js/pages/login1.js") }}"></script>
</body>

</html>