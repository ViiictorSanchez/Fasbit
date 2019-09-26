@extends('Layout.master')

@section('title')

{{-- {{$title->value}} - ICO --}}

{{$data->title}} ICO review | Ratings | Review | Details

@endsection

@section('meta')

<meta name="title" content=" {{$data->title}} ICO review, Ratings, Review and details">
<meta name="description" content="{{$data->title}} ICO review, Ratings and details. Traded Exchange details with Market Capitalisation, Price and investment advice. With community discussion and Traded volume">
<meta name="keywords" content="{{$data->title}} ICO review, Ratings, Price, advice, Market, Traded volume
">

@endsection

@section('content')

    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
 <link rel="stylesheet" type="text/css" href="{{ URL::asset("public/vendors/ionicons/css/ionicons.min.css")}}" />
    <script src="{{URL::asset('public/js/pagination.js')}}"></script>
  <style>
  ul.navbar-nav.ml-auto {
    float: right;
}
.pagination.disabled a,  .pagination.disabled a:hover,  .pagination.disabled a:focus,  .pagination.disabled span {
  color: #eee;
  background: #fff;
  cursor: default;
}

.pagination { float: left; }

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

#table { margin-bottom: 0; }

.ico-header {
    width: 100%;
}
img.header-img {
    width: 100px;
    height: 100px;
    object-fit: contain;
    border: 1px solid #e7e7e7;
    padding: .5rem!important;
    margin-right: .5rem!important;
    float: left;
}
span.header-category {
    font-size: 13px;
    border: 1px solid #999;
    padding: 3px 15px;
    display: inline-block;
    border-radius: 12px;
    margin-bottom: 10px;
}
p.header-p {
    padding: 10px;
    text-align: justify;
    padding-right: 30px;
}
.ico-right-widget p.dl {
    font-size: 13px;
    text-align: left;
    font-weight: 600;
    padding-top: 3px;
}
a.social-stats-btn1 {
    width: 150px;
    cursor: pointer;
    background: #8dc647;
    border: 1px solid #8dc647;
    margin-bottom: .25rem!important;
    color: #fff;
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    padding: .375rem .75rem;
    line-height: 1.5;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.social-stats-btn1:hover {
    background-color: #7ab52b;
    border-color: #7ab52b;
}
.token-detail dt {
    font-size: 13px;
}

.token-detail dd {
    font-size: 14px;
}
.team-box {
    border: 1px solid #dad9d9;
    padding: 15px;
    margin-top: 20px;
    margin-bottom: 20px;
    text-align: center;
}
.team-box .image-outer {
    border: 1px solid #e2dede;
    padding: 5px;
    display: inline-block;
}
.team-box h5 {
    font-size: 17px;
    font-weight: 500;
}
.team-box p {
    font-size: 19px;
}
.screen-shot-div a.grouped_elements {
    color: #8dc647;
}
.screen-shot-div img {
    border: 1px solid #e7e7e7;
    border-radius: 5px;
    padding: 10px;
    width: 100%;
    height: 200px;
    -o-object-fit: cover;
    object-fit: cover;
}
.screen-shot-div h5 {
    font-size: 16px;
    font-weight: 600;
}
.releted-shot-div a.grouped_elements {
    color: #8dc647;
}
.releted-shot-div img {
    border: 1px solid #e7e7e7;
    border-radius: 5px;
    padding: 10px;
    width: 100%;
    height: 200px;
    -o-object-fit: cover;
    object-fit: cover;
}
.releted-shot-div h5 {
    font-size: 16px;
    font-weight: 600;
}


.releted-shot-div p {
    font-size: 16px;
    text-align: justify;
}
</style>
<div id="">

<div class="">
<div id="" class="container">

  
<div class="page-inner">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <!-- <div class="col-md-12"> -->
                               <!--  <div class="ico-header">
                                    <div class="left">
                                        <div class="image" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/3/36/Hopetoun_falls.jpg');"></div>
                                    </div>
                                    <div class="right">
                                        <h3>Keplertek Technologies</h3>
                                        <span class="category">Social</span>
                                        
                                    </div>
                                </div> -->

                            <!-- </div> -->
                                <div class="ico-header">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/3/36/Hopetoun_falls.jpg" alt="Company Name" class="header-img">
                                     <h3 class="header-h3">{{$data->title}}</h3>
                                        <span class="header-category">{{$data->category}}</span>
                                </div>
                        </div>
                        <div class="row">
                            <p class="header-p">{{$data->short_description}}</p>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe width="560" height="315" src="{{$data->youtube}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="ico-right-widget text-center">
                            <h5>Fasbit Market Watch RATING</h5>
                            <p>{{$data->rating}}</p>
                            <span class="col-12 ion_icon">
                                @php
                                for($i=0;$i<$data->rating;$i++){
                                @endphp
                              <i class="fa fa-star " style="color:#f39c12;font-size: 18px"></i>
                              @php } @endphp
                            </span> 
                            <h6>Rating - {{$data->rating}}</h6>
                            <table class="table" style="margin-bottom: 0px;">           
                                <thead>       
                                    <tr>            
                                        <th class="text-left text-uppercase" style="border-bottom: 0px;vertical-align: unset;">Reviews</th>         
                                        <th class="text-right text-uppercase" style="border-bottom: 0px;vertical-align: unset;">Score</th>          
                                    </tr>           
                                </thead>            
                                <tbody>         
                                    <tr>            
                                        <td class="text-left" style="border-top: 0px;">ICObench</td>            
                                        <td class="text-right" style="border-top: 0px;">            
                                            <a rel="nofollow" target="_blank" href="https://icobench.com/ico/kepler-technologies">4.9</a>           
                                        </td>           
                                    </tr>           
                                </tbody>            
                            </table>            
                        </div>
                        <div class="ico-right-widget text-center">
                            <h5>SOCIAL STATS</h5>
                            <p class="dl">Telegram Users<span>{{$data->telegram_follow}}</span></p>
                            <p class="dl">Twitter Followers<span>{{$data->twitter_follow}}</span></p>
                            <p class="dl">Linkedin Followers<span>{{$data->linkedin_follow}}</span></p>
                            <p class="dl">Youtube Subscribers<span>{{$data->youtube_follow}}</span></p>
                            <div class="social text-center">
                                <a href="{{$data->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="{{$data->youtube}}"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                <a href="{{$data->linkedin}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                <a href="{{$data->telegram}}"><i class="fa fa-telegram" aria-hidden="true"></i></a>
                                <a href="{{$data->facebook}}"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="ico-right-widget text-center">
                            <h5>ICO UPCOMING</h5>
                            <h6>STARTING ON</h6>
                            <h6><strong>{{$data->start_date}}</strong></h6>
                            <a href="{{$data->website}}" class="social-stats-btn1">Website</a>
                            <br>
                            <a href="{{$data->whitepaper}}" class="social-stats-btn1">Whitepaper</a>
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
                                        <dt class="col-lg-3 col-md-12 col-sm-12">WHITELIST</dt>
                                        <dd class="col-lg-9 col-md-12 col-sm-12">{{$data->white_list}}</dd>
                                        <dt class="col-lg-3 col-md-12 col-sm-12">PRE SALE</dt>
                                        <dd class="col-lg-9 col-md-12 col-sm-12">{{$data->pre_sale}}</dd>
                                        <dt class="col-lg-3 col-md-12 col-sm-12">PUBLIC SALE</dt>
                                        <dd class="col-lg-9 col-md-12 col-sm-12">{{$data->public_sale}}</dd>
                                        <dt class="col-lg-3 col-md-12 col-sm-12">TICKER</dt>
                                        <dd class="col-lg-9 col-md-12 col-sm-12">{{$data->ticker}}</dd>
                                        <dt class="col-lg-3 col-md-12 col-sm-12">PLATFORM</dt>
                                        <dd class="col-lg-9 col-md-12 col-sm-12">{{$data->platform}}</dd>
                                        <dt class="col-lg-3 col-md-12 col-sm-12">COUNTRY</dt>
                                        <dd class="col-lg-9 col-md-12 col-sm-12">{{$data->country}}</dd>
                                        <dt class="col-lg-3 col-md-12 col-sm-12">ACCEPTING</dt>
                                        <dd class="col-lg-9 col-md-12 col-sm-12">{{$data->accepting}}</dd>
                                    </dl>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <dl class="row">
                                        <dt class="col-lg-3 col-md-12 col-sm-12">SOFT CAP</dt>
                                        <dd class="col-lg-9 col-md-12 col-sm-12">{{$data->soft_cap}}</dd>
                                        <dt class="col-lg-3 col-md-12 col-sm-12">HARD CAP</dt>
                                        <dd class="col-lg-9 col-md-12 col-sm-12">{{$data->hard_cap}}</dd>
                                        <dt class="col-lg-3 col-md-12 col-sm-12">TOTAL TOKEN</dt>
                                        <dd class="col-lg-9 col-md-12 col-sm-12">{{$data->total_token}}</dd>
                                        <dt class="col-lg-3 col-md-12 col-sm-12">AVAILABLE FOR SALE</dt>
                                        <dd class="col-lg-9 col-md-12 col-sm-12">{{$data->available_sale}}</dd>
                                        <dt class="col-lg-3 col-md-12 col-sm-12">BOUNTY</dt>
                                        <dd class="col-lg-9 col-md-12 col-sm-12">{{$data->bounty}}</dd>
                                        <dt class="col-lg-3 col-md-12 col-sm-12">KYC REQUIRED</dt>
                                        <dd class="col-lg-9 col-md-12 col-sm-12">{{$data->kyc}}</dd>
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
                            @foreach($teams as $team)
                            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                                <div class="team-box">
                                    <div class="image-outer">
                                        <div class="image" style="background-image: url('{{$team->image}}');"></div>
                                    </div>
                                    <h5>{{$team->name}}</h5>
                                    <p><small>{{$team->designation}}</small></p>
                                    <div class="social">
                                        <a href="{{$team->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="{{$team->linkedin}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        <a href="{{$team->telegram}}"><i class="fa fa-telegram" aria-hidden="true"></i></a>
                                        <a href="{{$team->facebook}}"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
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
                            </div> -->
                        </div>
                    </div>
                </div>
               <!--  <div class="row">
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
                </div> -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h4><strong>Screenshots</strong></h4>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <!-- </div> -->
                            @foreach($screenshots as $screenshot)
                            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 screen-shot-div"> 
                                <a class="grouped_elements" rel="" href="{{$screenshot->image}}">
                                    <img src="{{$screenshot->image}}">
                                    <h5 class="text-center">{{$screenshot->name}}</h5>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <br>
                        <h4><strong>ICOs You May Also Like</strong></h4>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row no-margin">
                            @foreach($similars as $similar)
                            <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 releted-shot-div"> 
                                <a class="grouped_elements" rel="" href="{{url('/')}}/ico_view/{{$similar->id}}">
                                    <img src="{{IMAGE_BASE_URL}}{{$similar->image_url}}">
                                    <h5 class="text-center">{{$similar->title}}</h5>
                                </a>
                                <p><small>{{$similar->short_description}}</small></p>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>



    <h4 style="padding-bottom: 20px;"><strong>Discussion forum</strong></h4>
    <div id="disqus_thread"></div>
            

<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: 

https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://http-18-191-39-172-cryptocompare.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>



        </div>
    </div>
</div>


@endsection



<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5afec5426d44f1e2"></script>