@extends('Layout.master')

@section('title')

{{$title->value}} | SIGN UP

@endsection
@section('content')

    
    
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('public/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
    <!--End of Plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('public/css/pages/login1.css')}}"/>
    <!--End of Page level styles-->

     <link rel="stylesheet" href="{{URL::asset('/public/css/pages/bootstrap.login.css')}}">


<body>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-lg-10 push-lg-1 col-sm-10 push-sm-1">
            <div class="row">
                <div class="col-lg-6 push-lg-3 col-sm-10 push-sm-1">
                   @if( Session::has( 'error' ))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Alert!</strong> &nbsp;&nbsp;{{ Session::get( 'error' ) }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                    <div class="login_logo login_border_radius1">
                        <h3 class="text-center">
                            <!--img src="https://www.bitexchange.cash/images/logo1.png" alt="josh logo" class="Logo"><span class=""> &nbsp;<br/>
                                <br-->
                                <div class="login-text"><p>Fasbit Market Watch</p></div>
                                <span>Sign Up</span>
                        </h3>
                    </div>
                    <div class="login_content login_border_radius">
                        <form class="form-horizontal login_validator m-b-20" id="register_valid"
                              action="{{URL('/')}}/add_user" method="post">
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="username" class="col-form-label">Username *</label>
                                    <div class="input-group">
                                    <span class="input-group-addon"> <i class="fa fa-user "  style="color:#626b7f"></i>
                                    </span>
                                        <input type="text" class="form-control" name="UserName" id="username" placeholder="Username">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="email" class="col-form-label">Email *</label>
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope "  style="color:#626b7f"></i>
                                    </span>
                                        <input type="text" placeholder="Email Address"  name="email" id="email" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="password" class="col-form-label text-sm-right">Password *</label>
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-key "  style="color:#626b7f"></i>
                                    </span>
                                        <input type="password" placeholder="Password"  id="password" data-minlength="6" name="password" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="confirmpassword" class="col-form-label">Confirm Password *</label>
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-key "  style="color:#626b7f"></i>
                                    </span>
                                        <input type="password" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <input type="submit" value="Submit" class="btn"  style="background: #626b7f;color: white;font-weight: bold"/>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <label class="col-form-label">Already have an account?</label> <a href="{{URL('/')}}/sign_in" class="login_hover" style="color:#8dc647"><b>Log In</b></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script type="text/javascript" src="{{ URL::asset('public/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('public/js/tether.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('public/js/bootstrap.min.js')}}"></script>
<!-- end of global js-->
<!--Plugin js-->

<script type="text/javascript" src="{{ URL::asset('public/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('public/vendors/wow/js/wow.min.js')}}"></script>
<!--End of plugin js-->
<!--Page level js-->

<script type="text/javascript" src="{{ URL::asset('public/js/pages/register.js')}}"></script>
<!-- end of page level js -->
</body>
</html>
@endsection