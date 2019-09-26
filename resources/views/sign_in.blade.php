@extends('Layout.master')

@section('title')

{{$title->value}} | SIGN IN

@endsection

@section('content')

  <link rel="stylesheet" href="{{URL::asset('/public/css/pages/bootstrap.login.css')}}">


<br><br>
<div class="container wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="2s">
    <div class="row">
        <div class="col-lg-8 push-lg-2 col-md-10 push-md-1 col-sm-10 push-sm-1 login_top_bottom">
            <div class="row">
                <div class="col-lg-8 push-lg-2 col-md-10 push-md-1 col-sm-12">
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
                            <div class="login-text"><p>Fasbit Market Watch</p></div>                            	
                            <span>Log In</span>
                        </h3>
                    </div>

                    <div class="login_content login_border_radius">
                        <form action="user_login" id="login_validator" method="post" class="login_validator">
                        	<input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="email" class="col-form-label"> E-mail</label>
                                <div class="input-group">
                                    <span class="input-group-addon input_email"><i
                                            class="fa fa-envelope" style="color:#626b7f"></i></span>
                                    <input type="email" class="form-control  form-control-md" id="email" name="email" placeholder="E-mail" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon addon_password"><i
                                            class="fa fa-lock" style="color:#626b7f"></i></span>
                                    <input type="password" class="form-control form-control-md" id="password"   name="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="submit" value="Log In" class="btn btn-block login_button" style="background: #626b7f;color: white;font-weight: bold">
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
                                    <a href="#" class="custom-control-description forgottxt_clr">Forgot password?</a>
                                </div>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label class="col-form-label">Don't you have an Account? </label>
                            <a href="{{URL('/')}}/sign_up" style="color:#8dc647"><b>Sign Up</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection