@extends('Layout.master')  @section('content')
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('public/vendors/ionicons/css/ionicons.min.css')}}" />
<script src="{{URL::asset('public/js/pagination.js')}}"></script>
<style>
.pagination.disabled a,
.pagination.disabled a:hover,
.pagination.disabled a:focus,
.pagination.disabled span {
    color: #eee;
    background: #fff;
    cursor: default;
}

.pagination {
    float: left;
}

.pagination.disabled li.active a {
    color: #fff;
    background: #cccccc;
    border-color: #cccccc;
}

.paging-container select {
    float: left;
    margin: 20px 0 20px 10px;
    padding: 9px 3px;
    border-color: #ddd;
    border-radius: 4px;
}

#table {
    margin-bottom: 0;
}
</style>
<div id="wrap">
    <div class="wrapper">
        <div id="content" class="container">
           
            <img class="banner-img" src="{{url('/')}}/public/ad.jpg">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-9 col-sm-8 col-xs-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="ico-header">
                                    <div class="left">
                                        <div class="image" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/3/36/Hopetoun_falls.jpg');"></div>
                                    </div>
                                    <div class="right">
                                        <h3>Keplertek Technologies</h3>
                                        <span class="category">Social</span>
                                        <p>Kepler Technologies AI&Robotics Ecosystem Powered by Blockchain Kepler Technology is dedicated to the development of a fair, simple, and reliable social network universe that will help transform innovative ideas into reality by bringing people around the world to work together</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=3jcfock6opw" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="ico-right-widget text-center">
                            <h5>Fasbit Market Watch RATING</h5>
                            <p>5.00</p>
                            <span class="col-12 ion_icon">
                              <i class="fa fa-star " style="color:#f39c12;font-size: 18px"></i>
                              <i class="fa fa-star " style="color:#f39c12;font-size: 18px"></i>
                              <i class="fa fa-star " style="color:#f39c12;font-size: 18px"></i>
                              <i class="fa fa-star " style="color:#f39c12;font-size: 18px"></i>
                              <i class="fa fa-star " style="color:#f39c12;font-size: 18px"></i>
                            </span> 
                            <h6>Rating - 5</h6>
                        </div>
                        <div class="ico-right-widget text-center">
                            <h5>SOCIAL STATS</h5>
                            <p class="dl">Telegram Users<span>1234</span></p>
                            <p class="dl">Twitter Followers<span>1234</span></p>
                            <p class="dl">Linkedin Followers<span>1234</span></p>
                            <p class="dl">Youtube Subscribers<span>1234</span></p>
                            <div class="social text-center">
                                <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href=""><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                <a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                <a href=""><i class="fa fa-telegram" aria-hidden="true"></i></a>
                                <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="ico-right-widget text-center">
                            <h5>ICO UPCOMING</h5>
                            <h6>STARTING ON</h6>
                            <h6><strong>10-05-2018</strong></h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="token-detail">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h4><strong>Token Details</strong></h4>
                                    <br>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <dl class="row">
                                        <dt class="col-sm-3">WHITELIST</dt>
                                        <dd class="col-sm-9">hai</dd>
                                        <dt class="col-sm-3">PRE SALE</dt>
                                        <dd class="col-sm-9">hai</dd>
                                        <dt class="col-sm-3">PUBLIC SALE</dt>
                                        <dd class="col-sm-9">hai</dd>
                                        <dt class="col-sm-3">TICKER</dt>
                                        <dd class="col-sm-9">hai</dd>
                                        <dt class="col-sm-3">PLATFORM</dt>
                                        <dd class="col-sm-9">hai</dd>
                                        <dt class="col-sm-3">COUNTRY</dt>
                                        <dd class="col-sm-9">hai</dd>
                                        <dt class="col-sm-3">ACCEPTING</dt>
                                        <dd class="col-sm-9">hai</dd>
                                    </dl>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <dl class="row">
                                        <dt class="col-sm-3">SOFT CAP</dt>
                                        <dd class="col-sm-9">hai</dd>
                                        <dt class="col-sm-3">HARD CAP</dt>
                                        <dd class="col-sm-9">hai</dd>
                                        <dt class="col-sm-3">TOTAL TOKEN</dt>
                                        <dd class="col-sm-9">hai</dd>
                                        <dt class="col-sm-3">AVAILABLE FOR SALE</dt>
                                        <dd class="col-sm-9">hai</dd>
                                        <dt class="col-sm-3">BOUNTY</dt>
                                        <dd class="col-sm-9">hai</dd>
                                        <dt class="col-sm-3">KYC REQUIRED</dt>
                                        <dd class="col-sm-9">hai</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h4><strong>Team</strong></h4>
                        <h6><strong>Team Members</strong></h6>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="team-box">
                                    <div class="image-outer">
                                        <div class="image" style="background-image: url('https://static.sourcemodels.co.uk/media_373/Georgina%20Alexi%20Jan%2017%20Heads/HeadGeorgina%20Alexi%20Jan%2017%20Heads_2017_1002.jpg');"></div>
                                    </div>
                                    <h5>Aliana Lia</h5>
                                    <p><small>CEO</small></p>
                                    <div class="social">
                                        <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-telegram" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="team-box">
                                    <div class="image-outer">
                                        <div class="image" style="background-image: url('https://static.sourcemodels.co.uk/media_373/Georgina%20Alexi%20Jan%2017%20Heads/HeadGeorgina%20Alexi%20Jan%2017%20Heads_2017_1002.jpg');"></div>
                                    </div>
                                    <h5>Aliana Lia</h5>
                                    <p><small>CEO</small></p>
                                    <div class="social">
                                        <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-telegram" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="team-box">
                                    <div class="image-outer">
                                        <div class="image" style="background-image: url('https://static.sourcemodels.co.uk/media_373/Georgina%20Alexi%20Jan%2017%20Heads/HeadGeorgina%20Alexi%20Jan%2017%20Heads_2017_1002.jpg');"></div>
                                    </div>
                                    <h5>Aliana Lia</h5>
                                    <p><small>CEO</small></p>
                                    <div class="social">
                                        <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-telegram" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="team-box">
                                    <div class="image-outer">
                                        <div class="image" style="background-image: url('https://static.sourcemodels.co.uk/media_373/Georgina%20Alexi%20Jan%2017%20Heads/HeadGeorgina%20Alexi%20Jan%2017%20Heads_2017_1002.jpg');"></div>
                                    </div>
                                    <h5>Aliana Lia</h5>
                                    <p><small>CEO</small></p>
                                    <div class="social">
                                        <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-telegram" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="team-box">
                                    <div class="image-outer">
                                        <div class="image" style="background-image: url('https://static.sourcemodels.co.uk/media_373/Georgina%20Alexi%20Jan%2017%20Heads/HeadGeorgina%20Alexi%20Jan%2017%20Heads_2017_1002.jpg');"></div>
                                    </div>
                                    <h5>Aliana Lia</h5>
                                    <p><small>CEO</small></p>
                                    <div class="social">
                                        <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-telegram" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h6><strong>Advisors</strong></h6>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="team-box">
                                    <div class="image-outer">
                                        <div class="image" style="background-image: url('https://static.sourcemodels.co.uk/media_373/Georgina%20Alexi%20Jan%2017%20Heads/HeadGeorgina%20Alexi%20Jan%2017%20Heads_2017_1002.jpg');"></div>
                                    </div>
                                    <h5>Aliana Lia</h5>
                                    <p><small>CEO</small></p>
                                    <div class="social">
                                        <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-telegram" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="team-box">
                                    <div class="image-outer">
                                        <div class="image" style="background-image: url('https://static.sourcemodels.co.uk/media_373/Georgina%20Alexi%20Jan%2017%20Heads/HeadGeorgina%20Alexi%20Jan%2017%20Heads_2017_1002.jpg');"></div>
                                    </div>
                                    <h5>Aliana Lia</h5>
                                    <p><small>CEO</small></p>
                                    <div class="social">
                                        <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-telegram" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="team-box">
                                    <div class="image-outer">
                                        <div class="image" style="background-image: url('https://static.sourcemodels.co.uk/media_373/Georgina%20Alexi%20Jan%2017%20Heads/HeadGeorgina%20Alexi%20Jan%2017%20Heads_2017_1002.jpg');"></div>
                                    </div>
                                    <h5>Aliana Lia</h5>
                                    <p><small>CEO</small></p>
                                    <div class="social">
                                        <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-telegram" aria-hidden="true"></i></a>
                                        <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h4><strong>Screenshots</strong></h4>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="screenshot-box">
                                    <a class="grouped_elements" rel="group1" href="https://upload.wikimedia.org/wikipedia/commons/3/36/Hopetoun_falls.jpg">
                                        <div class="image" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/3/36/Hopetoun_falls.jpg');">
                                        </div>
                                        <h5 class="text-center">Sceenshot Name</h5>
                                    </a>
                                    <a class="grouped_elements" rel="group1" href="https://static1.squarespace.com/static/53cfc1dce4b01ee22a512a92/542117d1e4b09a2902be3136/55cb0f5be4b0d726d8a7584e/1439371101655/website.jpg">
                                        <div class="image" style="background-image: url('https://static1.squarespace.com/static/53cfc1dce4b01ee22a512a92/542117d1e4b09a2902be3136/55cb0f5be4b0d726d8a7584e/1439371101655/website.jpg');">
                                        </div>
                                        <h5 class="text-center">Sceenshot Name</h5>
                                    </a>
                                    <a class="grouped_elements" rel="group1" href="https://upload.wikimedia.org/wikipedia/commons/3/36/Hopetoun_falls.jpg">
                                        <div class="image" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/3/36/Hopetoun_falls.jpg');">
                                        </div>
                                        <h5 class="text-center">Sceenshot Name</h5>
                                    </a>
                                    <a class="grouped_elements" rel="group1" href="https://static1.squarespace.com/static/53cfc1dce4b01ee22a512a92/542117d1e4b09a2902be3136/55cb0f5be4b0d726d8a7584e/1439371101655/website.jpg">
                                        <div class="image" style="background-image: url('https://static1.squarespace.com/static/53cfc1dce4b01ee22a512a92/542117d1e4b09a2902be3136/55cb0f5be4b0d726d8a7584e/1439371101655/website.jpg');">
                                        </div>
                                        <h5 class="text-center">Sceenshot Name</h5>
                                    </a>
                                    <a class="grouped_elements" rel="group1" href="https://upload.wikimedia.org/wikipedia/commons/3/36/Hopetoun_falls.jpg">
                                        <div class="image" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/3/36/Hopetoun_falls.jpg');">
                                        </div>
                                        <h5 class="text-center">Sceenshot Name</h5>
                                    </a>
                                    <a class="grouped_elements" rel="group1" href="https://static1.squarespace.com/static/53cfc1dce4b01ee22a512a92/542117d1e4b09a2902be3136/55cb0f5be4b0d726d8a7584e/1439371101655/website.jpg">
                                        <div class="image" style="background-image: url('https://static1.squarespace.com/static/53cfc1dce4b01ee22a512a92/542117d1e4b09a2902be3136/55cb0f5be4b0d726d8a7584e/1439371101655/website.jpg');">
                                        </div>
                                        <h5 class="text-center">Sceenshot Name</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <br>
                        <h4><strong>ICOs You May Also Like</strong></h4>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row no-margin">
                                <div class="ico-news-box">
                                    <a href="#">
                                        <div class="image-outer">
                                            <div class="image" style="background-image: url('https://securecdn.pymnts.com/wp-content/uploads/2018/03/traxia-ico-cardano.jpg');"></div>
                                        </div>
                                    </a>
                                    <h5>ICO</h5>
                                    <p><small>The first crypto index traded as a token.</small></p>
                                </div>
                                <div class="ico-news-box">
                                    <a href="#">
                                        <div class="image-outer">
                                            <div class="image" style="background-image: url('https://securecdn.pymnts.com/wp-content/uploads/2018/03/traxia-ico-cardano.jpg');"></div>
                                        </div>
                                    </a>
                                    <h5>ICO</h5>
                                    <p><small>The first crypto index traded as a token.</small></p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</script>
@endsection