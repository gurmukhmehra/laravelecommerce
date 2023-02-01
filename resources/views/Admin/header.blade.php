<header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed header-blue">			
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="#!" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            <img src="{{ asset('Backend/assets/images/logo.png') }}" alt="" class="logo">
            <img src="{{ asset('Backend/assets/images/logo-icon.png') }}" alt="" class="logo-thumb">
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">            
            <li class="nav-item">
                <a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">            
            <li>
                <div class="dropdown drp-user">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('Backend/assets/images/user/avatar-1.jpg') }}" class="img-radius wid-40" alt="User-Profile-Image">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="{{ asset('Backend/assets/images/user/avatar-1.jpg') }}" class="img-radius" alt="User-Profile-Image">
                            <span>{{Auth::user()->name}}</span>
                            <a href="{{URL::to('admin/logout')}}" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            <li><a href="#" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                            <li><a href="{{URL::to('admin/logout')}}" class="dropdown-item"><i class="feather icon-log-out"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>	
</header>