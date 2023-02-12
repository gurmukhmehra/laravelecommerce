<div class="tr-topbar">
    <div class="container clearfix">
        <div class="select-language">
            <div class="tr-dropdown">
                <a data-toggle="dropdown" href="#" aria-expanded="false">
                    <span class="change-text">
                    <span class="tr-flag">
                        <img src="{{ asset('front/images/others/flag.png') }}" alt="Image" class="img-fluid">
                    </span>USD </span>
                    <span class="dropdown-toggle"></span>
                </a>
                <ul class="tr-dropdown-menu tr-change">
                    <li>
                    <a href="#">
                        <span class="tr-flag">
                        <img src="{{ asset('front/images/others/flag.png') }}" alt="Image" class="img-fluid">
                        </span>USD </a>
                    </li>
                    <li>
                </ul>
            </div>
        </div>
        <div class="topbar-right">
            <ul class="tr-list">
            <li>
                <span>
                <a href="tel:{{globalSetting('SiteSupportNumber')}}">
                    <span class="icon icon-support"></span>{{globalSetting('SiteSupportNumber')}}</a>
                </span>
            </li>
            <li>
                <a href="mailto:{{globalSetting('siteEmail')}}">
                    <span class="icon icon-send"></span>
                    <span class="__cf_email__">{{globalSetting('siteEmail')}}</span>
                </a>
            </li>
            </ul>
        </div>
    </div>
</div>

<div class="topbar-middle">
    <div class="container clearfix">
        <a class="tr-logo logo" href="{{URL::to('/')}}">
          <h1>{{globalSetting('siteName')}}</h1>
        </a>
        <a class="tr-logo tr-logo-2" href="index.html">
          <img class="img-fluid" src="{{ asset('front/images/logo-white.png') }}" alt="Logo">
        </a>
        <form class="search-form" action="#" id="search" method="get">
          <input class="form-control" name="search" type="text" placeholder="Search this Site">
          <button type="submit">
          <i class="fa fa-search"></i>
          </button>
        </form>
        <div class="right-content">
            <div class="tr-user">
                <div class="user-image">
                    @if(Auth::check() && Auth::User()->role=='customer')
                        <img src="{{ asset('front/images/people-profile-dummy.jpg') }}" alt="Image" class="img-fluid">
                    @elseif(Auth::check() && Auth::User()->role=='admin')
                        <img src="{{ asset('front/images/people-profile-dummy.jpg') }}" alt="Image" class="img-fluid">
                    @else 
                        <img src="{{ asset('front/images/people-profile-dummy.jpg') }}" alt="Image" class="img-fluid">
                    @endif
                </div> 
                <div class="user-option">
                    <div class="tr-dropdown">
                        @if(Auth::check() && Auth::User()->role=='customer')
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                {{Auth::User()->name}} <span class="caret"></span>
                            </a>
                            <ul class="tr-dropdown-menu">
                                <li>
                                    <a href="{{URL::to('/profile')}}">Profile</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('/logout') }}">Log Out</a>
                                </li>
                            </ul>
                        @elseif(Auth::check() && Auth::User()->role=='admin')
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                {{Auth::User()->name}} <span class="caret"></span>
                            </a>
                            <ul class="tr-dropdown-menu">
                                <li>
                                    <a href="{{URL::to('admin/dashboard')}}">Profile</a>
                                </li>
                                <li>
                                    <a href="admin/logout">Log Out</a>
                                </li>
                            </ul>
                        @else 
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Guest <span class="caret"></span>
                            </a>
                            <ul class="tr-dropdown-menu">
                                <li>
                                    <a href="{{URL::to('sign-up')}}">Sign Up</a>
                                </li>
                                <li>
                                    <a href="{{URL::to('sign-in')}}">Sign In</a>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>               
             </div>
             @php 
                $cartdata=Session::get('cart');
            @endphp
            <ul class="tr-list cart-content" id="headerCart">                
                <li class="tr-dropdown">
                    <a href="#">
                        <span class="icon icon-basket"></span>
                        @if(!empty($cartdata))
                            <span class="cart-number">{{count($cartdata)}}</span>
                        @else 
                            <span class="cart-number">0</span>
                        @endif
                    </a>
                    <div class="tr-dropdown-menu">
                        @if(!empty($cartdata) && count($cartdata)>0)
                            <ul class="tr-list">
                                @php 
                                    $cartTotal = 0;
                                @endphp
                                @foreach($cartdata as $key => $cartItem)
                                    @php
                                        $productDetail = DB::table('products')->where('id', $cartItem['productID'])->first();
                                        $cartTotal += number_format((float)$cartItem['productPrice'], 2, ".", "");                                       
                                    @endphp
                                    <li class="remove-item" data-proid="{{$cartItem['productID']}}">
                                        <span class="remove-icon">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </span>
                                        <div class="tr-product">
                                            <a href="{{ URL::to('product-detail/'.$productDetail->ProductSlug) }}">
                                                <span class="product-image">
                                                    @if(!empty($productDetail->productImage))
                                                        <img src="{{ URL::asset('uploads/product_images/'.$productDetail->productImage) }}" alt="{{$productDetail->ProductSlug}}" class="img-fluid"/>
                                                    @else 
                                                        <img src="{{ URL::asset('uploads/No_Image_Available.jpg')}}" alt="{{$productDetail->ProductSlug}}" class="img-fluid"/>
                                                    @endif
                                                </span>
                                                <span class="product-title">{{$productDetail->ProductName}}</span>
                                                <span class="price">
                                                    ${{number_format((float)$cartItem['productPrice'], 2, '.', '')}}
                                                </span>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>                        
                            <div class="total-price">
                                <span><strong>Total Price: </strong>${{$cartTotal}} </span>
                            </div>
                            <div class="buttons">
                                <a class="btn btn-primary cart-button" href="#">View Cart</a>
                                <a class="btn btn-primary" href="#">Checkout</a>
                            </div>
                        @else 
                            <h6 class="text-danger text-center">Empty cart</h4>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="tr-menu">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <div class="menu-content">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item tr-dropdown {{ request()->routeIs('/') ? 'active':'' }}">
                            <a class="nav-link" href="{{URL::to('/')}}">Home</a>                  
                        </li>
                        <li class="nav-item tr-dropdown {{ request()->routeIs('/about-us') ? 'active':'' }}">
                            <a class="nav-link" href="{{URL::to('/about-us')}}">About Us</a>                  
                        </li>
                        <li class="nav-item tr-dropdown {{ request()->routeIs('/shop') ? 'active':'' }}">
                            <a class="nav-link" href="{{URL::to('/shop')}}">Shop</a>                  
                        </li>
                        <li class="nav-item tr-dropdown {{ request()->routeIs('/affiliate') ? 'active':'' }}">
                            <a class="nav-link" href="{{URL::to('/affiliate')}}">Affiliate</a>                  
                        </li>
                        <li class="nav-item tr-dropdown {{ request()->routeIs('/contact-us') ? 'active':'' }}">
                            <a class="nav-link" href="{{URL::to('/contact-us')}}">Contact Us</a>                  
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>

