<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/logo1.ico"/>
    <!-- global styles-->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/css/components.css") }}" />

    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/css/custom.css") }}" />
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/css/admin_custom.css") }}" />
    <!--End of global styles-->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css")}}"/>
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/css/pages/mail_box.css")}}"/>
    <link type="text/css" rel="stylesheet" href="{{ URL::asset("public/vendors/daterangepicker/css/daterangepicker.css")}}" />
    <link type="text/css" rel="stylesheet" href="#" id="skin_change"/>
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
        <img src="{{URL::asset("public/img/loader.gif")}}" style=" width: 40px;" alt="loading...">
    </div>
</div>
<div id="wrap" class=" admin-dashboard ">
    
    <div id="top">
        <!-- .navbar -->
        @include('Admin.head')
        <!-- /.navbar -->
        <!-- /.head -->
    </div>

    @include('Admin.nav')
    <!-- /#top -->
    <div class="wrapper">        <!-- /#left -->
        <div id="content" class="bg-container">
            <div class="outer">
                <div class="inner bg-container">
                    <div class="row web-mail mail_compose">
                        <div class="col-lg-12">
                            <div class="card media_max_991">
                                <div class="card-header bg-white">
                                    <i class="fa fa-edit"></i>
                                    Add New Ico
                                </div>
                                <div class="card-block m-t-35">
                                    <form action="{{url('/')}}/admin/index" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-lg-4">
                                                <h6>Meta title</h6>
                                             <input type="text" class="form-control" name="meta_title" placeholder="Meta title" required>
                                            </div>
                                             <div class="col-lg-4">
                                                <h6>Meta Keyword</h6>
                                              <input type="text" name="meta_keyword" class="form-control" placeholder="Meta Keyword" required>
                                            </div> 
                                            <div class="col-lg-4">
                                                 <h6>Meta Description</h6>
                                              <input type="text" name="meta_desc" class="form-control" placeholder="Meta Description" required>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-lg-4">
                                                <h6>ICO Name</h6>
                                             <input type="text" class="form-control" name="title" placeholder="Enter ICO Name" required>
                                            </div>
                                             <div class="col-lg-4">
                                                <h6>ICO Image</h6>
                                              <input type="file" name="image" class="form-control" style="max-width: 210px;" required>
                                            </div> 
                                            <div class="col-lg-4">
                                                 <h6>Category</h6>
                                              <input type="text" name="category" class="form-control" placeholder="Enter category" required>
                                            </div>
                                          </div>
                                        </div>
                                    {{--     <div class="form-group"> 
                                          <div class="row">
                                            <div class="col-lg-12">
                                               <input type="text" name="short_description" class="form-control m-t-25" maxlength="150" placeholder="Short description *" required>
                                              
                                            </div>
                                          </div>
                                        </div> --}}
                                        <div class="form-group mail_compose_wysi"> 
                                            <textarea class="wysihtml5 form-control" name="short_description" placeholder="Description" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-lg-4">
                                               <h6>Start Date</h6>
                                                 <input type="date" name="start_date" class="form-control" required>
                                            </div>
                                             <div class="col-lg-4">
                                                 <h6>End Date</h6>
                                                    <input type="date" name="end_date" class="form-control" required>
                                            </div> 
                                            <div class="col-lg-4">
                                                <h6>Rating</h6>
                                                    <span id="rater5"></span>
                                                    <input type="hidden" name="rating" id="rating" value="" required>
                                            </div>
                                        </div>
                                        </div><br><hr/>
                                        <div class="form-group">
                                            <div class="row">
                                              <div class="col-lg-6">
                                                <h4 style="color: #386306;">Social Links :</h4>
                                              </div>
                                            </div>
                                        </div>      
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-lg-4">
                                             <h6>Website</h6>
                                              <input type="text" name="website" class="form-control" required>  

                                            </div>
                                             <div class="col-lg-4">
                                                  <h6>Whitepaper</h6>
                                                  <input type="text" name="whitepaper" class="form-control" required>
                                            </div> 
                                            <div class="col-lg-4">
                                                  <h6>Twitter</h6>
                                                  <input type="text" name="twitter" class="form-control" required>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-lg-4">
                                              <h6>Youtube</h6>
                                                <input type="text" name="youtube" class="form-control" required>
                                            </div>
                                             <div class="col-lg-4">
                                                  <h6>Facebook</h6>
                                                <input type="text" name="facebook" class="form-control" required>
                                            </div> 
                                            <div class="col-lg-4">
                                                <h6>Slack</h6>
                                                 <input type="text" name="slack" class="form-control" required>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-lg-3">
                                              <h6>Linkedin</h6>
                                              <input type="text" name="linkedin" class="form-control" required></div>
                                             <div class="col-lg-3">
                                                 <h6>Github</h6>
                                                 <input type="text" name="github" class="form-control" required>
                                            </div> 
                                            <div class="col-lg-3">
                                               <h6>Telegram</h6>
                                                <input type="text" name="telegram" class="form-control" required>
                                            </div>
                                            <div class="col-lg-3">
                                                <h6>Reddit</h6>
                                                <input type="text" name="reddit" class="form-control" required>
                                            </div>
                                         </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                              <div class="col-lg-6">
                                                 <h4 style="color: #386306;">Social Followers :</h4>
                                              </div>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col-lg-3">
                                              <h6>Linkedin Follows</h6>
                                              <input type="number" name="linkedin_follow" class="form-control" required></div>
                                            <div class="col-lg-2">
                                              <h6>Youtube Follows</h6>
                                                <input type="number" name="youtube_follow" class="form-control" required>
                                            </div>
                                            <div class="col-lg-2">
                                               <h6>Telegram Follows</h6>
                                                <input type="number" name="telegram_follow" class="form-control"> required
                                            </div>
                                            <div class="col-lg-2">
                                                <h6>Reddit Follows</h6>
                                                <input type="number" name="reddit_follow" class="form-control" required>
                                            </div>
                                            <div class="col-lg-3">
                                                  <h6>Twitter Follows</h6>
                                                  <input type="number" name="twitter_follow" class="form-control" required>
                                            </div>
                                          </div>
                                         </div><br><hr/>
                                        <div class="form-group">
                                            <div class="row">
                                              <div class="col-lg-6">
                                                 <h4 style="color: #386306;">Token Details :</h4>
                                              </div>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col-lg-4">
                                              <h6>WHITELIST</h6>
                                                  <input type="text" class="form-control" id="date_range" name="white_list" required>
                                             </div>
                                            <div class="col-lg-4">
                                              <h6>PRE SALE</h6>
                                                <input type="text" class="form-control" id="date_range" name="pre_sale" required>
                                            </div>
                                            <div class="col-lg-4">
                                               <h6>PUBLIC SALE</h6>
                                                <input type="text" class="form-control" id="date_range"  name="public_sale" required>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col-lg-4">
                                                <h6>TICKER</h6>
                                                <input type="text" name="ticker" class="form-control" required>
                                            </div>
                                            <div class="col-lg-4">
                                                  <h6>PLATFORM</h6>
                                                  <input type="text" name="platform" class="form-control" required>
                                            </div>
                                            <div class="col-lg-4">
                                                  <h6>COUNTRY</h6>
                                                  <input type="text" name="country" class="form-control" required>
                                            </div>
                                          </div>
                                         </div>

                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col-lg-3">
                                                <h6>ACCEPTING</h6>
                                                <input type="text" name="accepting" class="form-control" required>
                                            </div>
                                            <div class="col-lg-3">
                                                  <h6>SOFT CAP</h6>
                                                  <input type="number" name="soft_cap" class="form-control" required>
                                            </div>
                                            <div class="col-lg-3">
                                                  <h6>HARD CAP</h6>
                                                  <input type="number" name="hard_cap" class="form-control" required>
                                            </div>
                                            <div class="col-lg-3">
                                                <h6>TOTAL TOKENS</h6>
                                                <input type="number" name="total_token" class="form-control" required>
                                            </div>
                                          </div>
                                         </div>

                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col-lg-3">
                                                  <h6>AVAILABLE FOR SALE (in %)</h6>
                                                  <input type="number" name="available_sale" class="form-control" required>
                                            </div>
                                            <div class="col-lg-3">
                                                  <h6>BOUNTY</h6>
                                                  <input type="text" name="bounty" class="form-control" required>
                                            </div>
                                            <div class="col-lg-3">
                                                  <h6>KYC REQUIRED</h6>
                                                  <input type="text" name="kyc" class="form-control" required>
                                            </div>
                                            
                                         </div>
                                         </div>


                                        <div class="form-group text-right m-t-20">
                                            <button type="submit" class="btn btn-primary"></i> Submit</button>
                                            <a href="mail_draft.html" class="btn btn-warning"><i class="fa fa-close"></i> Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.inner -->
            </div>
            <!-- /.outer -->
        </div>
        <!-- /#content -->
    </div>
    <!--wrapper-->

</div>
<!-- /#wrap -->
<!-- global scripts-->
<script type="text/javascript" src="{{ URL::asset("public/js/components.js") }}"></script>
<script type="text/javascript" src="{{ URL::asset("public/js/custom.js") }}"></script>

<!-- end of global scripts-->
<script type="text/javascript" src="{{ URL::asset("public/vendors/bootstrap3-wysihtml5-bower/js/bootstrap3-wysihtml5.all.min.js")}}"></script>
<script type="text/javascript" src="{{ URL::asset("public/js/pages/mail_box.js")}}"></script>
<script type="text/javascript">
function onload(event) {
   
    var starRating5 = raterJs( {
        element:document.querySelector("#rater5"),
        rateCallback:function rateCallback(rating, done) {
            this.setRating(rating); 
            done(); 
        },
        onHover: function(currentIndex, currentRating){
             $('#rating').val(currentIndex);
        },
        onLeave: function(currentIndex, currentRating){
             $('#rating').val(currentRating);
        }
    }); 

}

window.addEventListener("load", onload, false); 
</script>

<script src="{{ URL::asset("public/rating/index.js?v=2")}}"></script>

<script src="{{ URL::asset("public/rating/index.js?v=2")}}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/jquery.uniform/js/jquery.uniform.js")}}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/inputlimiter/js/jquery.inputlimiter.js")}}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js")}}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/jquery-tagsinput/js/jquery.tagsinput.js")}}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/validval/js/jquery.validVal.min.js")}}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/inputmask/js/jquery.inputmask.bundle.js")}}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/moment/js/moment.min.js")}}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/daterangepicker/js/daterangepicker.js")}}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/datepicker/js/bootstrap-datepicker.min.js")}}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js")}}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/bootstrap-switch/js/bootstrap-switch.min.js")}}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/autosize/js/jquery.autosize.min.js")}}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/jasny-bootstrap/js/jasny-bootstrap.min.js")}}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/jasny-bootstrap/js/inputmask.js")}}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/datetimepicker/js/DateTimePicker.min.js")}}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/j_timepicker/js/jquery.timepicker.min.js")}}"></script>
<script type="text/javascript" src="{{ URL::asset("public/vendors/clockpicker/js/jquery-clockpicker.min.js")}}"></script>
<!--end of plugin scripts-->
<script type="text/javascript" src="{{ URL::asset("public/js/form.js")}}"></script>
<script type="text/javascript" src="{{ URL::asset("public/js/pages/datetime_piker.js")}}"></script>
</body>
</html>