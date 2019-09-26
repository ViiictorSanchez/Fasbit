<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('resources/assets/logo.png')}}"/>
    <!-- global styles-->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/css/components.css") }}" />
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/css/original.css") }}" />
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/css/admin_custom.css") }}" />
    <!--end of global styles-->
    <!--plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/vendors/select2/css/select2.min.css") }}"/>
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/vendors/datatables/css/scroller.bootstrap.min.css") }}" />
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/vendors/datatables/css/colReorder.bootstrap.min.css") }}" />
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/vendors/datatables/css/dataTables.bootstrap.min.css") }}"/>
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/css/pages/dataTables.bootstrap.css") }}"/>

    <!-- end of plugin styles -->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/css/pages/tables.css") }}"/>
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/css/pages/form_elements.css") }}"/>
    <link type="text/css" rel="stylesheet" href="#" id="skin_change"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/vendors/daterangepicker/css/daterangepicker.css") }}" />
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/vendors/datepicker/css/bootstrap-datepicker.min.css") }}" />
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css") }}" />
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/vendors/bootstrap-switch/css/bootstrap-switch.min.css") }}" />
    
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/vendors/datetimepicker/css/DateTimePicker.min.css") }}" />
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/vendors/j_timepicker/css/jquery.timepicker.css") }}" />
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/vendors/clockpicker/css/jquery-clockpicker.css") }}" />
    <!-- end of plugin styles -->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/css/pages/colorpicker_hack.css") }}" />
    <!--End of page level styles-->
</head>

<body>
<div class="preloader" style=" position: fixed;
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
<div id="wrap" class="admin-dashboard">
    <div id="top">
        <!-- .navbar -->
        @include('Admin.head')
        <!-- /.navbar -->
        <!-- /.head -->
    </div>

      @include('Admin.nav')
      @yield('content')
   <!--div>
    <h4 style="text-align:center">
    Copyright &copy; Fasbit Market Watch 2018 . All rights
    reserved.</h4> <a href="http://www.sparkouttech.com" target="_blank" style="text-align:center">Copyright &copy; Fasbit Market Watch 2018 . All rights
    reserved.</a>
  </div-->
    </div>
<!-- /#wrap -->
 

<!-- global scripts-->

<script type="text/javascript" src="{{ URL::asset("public/js/components.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/js/custom.js") }}"></script>

<!-- end of global scripts-->
<!-- plugin scripts -->
<script type="text/javascript" src="{{ URL::asset("public/vendors/select2/js/select2.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/js/pages/simple_datatables.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/datatables/js/jquery.dataTables.min.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/datatables/js/dataTables.bootstrap.min.js") }}"></script>
<!-- end plugin scripts -->
<!--Page level scripts-->
<script type="text/javascript" src="{{ URL::asset("public/js/pages/advanced_tables.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/js/form.js") }}"></script>
<!-- end of global scripts-->
<script type="text/javascript" src="{{ URL::asset("public/vendors/inputmask/js/jquery.inputmask.bundle.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/moment/js/moment.min.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/daterangepicker/js/daterangepicker.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/datepicker/js/bootstrap-datepicker.min.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/bootstrap-switch/js/bootstrap-switch.min.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/autosize/js/jquery.autosize.min.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/jasny-bootstrap/js/inputmask.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/datetimepicker/js/DateTimePicker.min.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/j_timepicker/js/jquery.timepicker.min.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/clockpicker/js/jquery-clockpicker.min.js") }}"></script>
<!--end of plugin scripts-->
<script type="text/javascript" src="{{ URL::asset("public/js/form.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/js/pages/datetime_piker.js") }}"></script>

@yield('scripts')
</body>
</html>