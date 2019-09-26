
<div id="left" class="menu-left">
    <div class="menu_scroll">
        <div class="menu-left-logo">
            <img src="{{$global_logo}}"  alt="logo">
        </div>
        <ul id="menu"  style="overflow-y: auto; height: 79vh;">
            <li {{{ (Request::is('admin/index') ? 'class=active' : '') }}}>
                <a href="{{url('/')}}/admin/index" >
                    <i class="fa fa-home"></i>
                    <span class="link-title menu_hide">&nbsp;ICO</span>
                </a>
            </li>
            <li {{{ (Request::is('admin/ccoins') ? 'class=active' : '') }}}>
                <a href="{{url('/')}}/admin/ccoins" >
                    <i class="fa fa-tachometer"></i>
                    <span class="link-title menu_hide">&nbsp;Coins</span>
                </a>
            </li>
            <li {{{ (Request::is('admin/stocks') ? 'class=active' : '') }}}>
                <a href="{{url('/')}}/admin/stocks" >
                    <i class="fa fa-tachometer"></i>
                    <span class="link-title menu_hide">&nbsp;Stocks</span>
                </a>
            </li>
            <li {{{ (Request::is('admin/forex') ? 'class=active' : '') }}}>
                <a href="{{url('/')}}/admin/forex" >
                    <i class="fa fa-tachometer"></i>
                    <span class="link-title menu_hide">&nbsp;Forex</span>
                </a>
            </li>
            <li {{{ (Request::is('admin/ads') ? 'class=active' : '') }}}>
                <a href="{{url('/')}}/admin/ads" >
                    <i class="fa fa-anchor"></i>
                    <span class="link-title menu_hide">&nbsp;ADS</span>
                </a>
            </li>
            <li {{{ (Request::is('admin/footer') ? 'class=active' : '') }}}>
                <a href="{{url('/')}}/admin/footer" >
                    <i class="fa fa-anchor"></i>
                    <span class="link-title menu_hide">&nbsp;Scripts</span>
                </a>
            </li>
            <li {{{ (Request::is('admin/basic_settings') ? 'class=active' : '') }}}>
                <a href="{{url('/')}}/admin/basic_settings" >
                    <i class="fa fa-anchor"></i>
                    <span class="link-title menu_hide">&nbsp;Basic Settings</span>
                </a>
            </li>
            <li>
                <a href="{{url('/')}}/admin/logout" >
                    <i class="fa fa-sign-out"></i>
                    <span class="link-title menu_hide">&nbsp;Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
   