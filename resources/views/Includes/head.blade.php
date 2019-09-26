<!--div class="scroller">
  <script async defer type="text/javascript">
    baseUrl = "https://widgets.cryptocompare.com/";
    var scripts = document.getElementsByTagName("script");
    var embedder = scripts[ scripts.length - 1 ];
    var cccTheme = {"General":{"enableMarquee":true}};
    (function (){
    var appName = encodeURIComponent(window.location.hostname);
    if(appName==""){appName="local";}
    var s = document.createElement("script");
    s.type = "text/javascript";
    s.async = true;
    var theUrl = baseUrl+'serve/v3/coin/header?fsyms=BTC,ETH,XMR,LTC,DASH,XRP,EOS,BCH&tsyms=USD,BTC';
    s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
    embedder.parentNode.appendChild(s);
    })();
  </script>
</div-->

<nav class="navbar navbar-expand-lg navbar-static-top mynav">
  <div class="container">
  
   <div class="col-lg-6 burger-btn">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand content-image-header" href="{{url('/')}}/">
          <img src="{{$global_logo}}" alt="logo">
          <p><strong>Fasbit</strong></p>
          <div class="market menu-front-desktop">MARKET WATCH</div>
      </a>
      <a class="navbar-brand" href="{{url('/')}}/">
        <p class="slogan">"Your friend in the crypto-space"</p>
      </a>
   </div>

  <div class="col-6 menu-front-desktop p-0">
      <ul class="navbar-nav ml-auto float-right">

      @if(Session::get( 'user_name' ) =="")
        <li class="nav-item">
          <a class="nav-link" href="{{URL('/')}}/sign_in">Sign in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{URL('/')}}/sign_up">Sign up</a>
        </li>

      @else

        <li class="nav-item">
          <a class="nav-link" href="#" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
          Welcome {{Session::get( 'user_name' )}} !
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{url('/')}}/fav_coin_list">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/')}}/logout">Logout</a>
        </li>

      @endif    
    </ul>
   </div>
</div>

<div class="container">
   <div class="collapse navbar-collapse" id="navbarToggler">
      <ul class="navbar-nav principal-menu">
        <li class="nav-item">
          <a class="crypto-currency" href="{{url('/')}}/">Crypto-Currency</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: grey;">Stock</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: grey;">Forex</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: grey;">Options</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: grey;">Futures</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="color: grey;">Buy / Sell Signals</a>
        </li>
       

      <ul class="navbar-nav menu-front-mobile">
        @if(Session::get( 'user_name' ) =="")
          <!--li class="nav-item">
            <a class="nav-link" href="{{URL('/')}}/sign_in">Sign in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{URL('/')}}/sign_up">Sign up</a>
          </li-->

        @else

          <li class="nav-item">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
            Welcome {{Session::get( 'user_name' )}} !
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}/fav_coin_list">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}/logout">Logout</a>
          </li>

        @endif  
      </ul>
    </ul>
    
  </div>



</div>
</nav >

