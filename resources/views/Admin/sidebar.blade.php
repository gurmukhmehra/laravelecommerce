<nav class="pcoded-navbar menupos-fixed menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >
            <ul class="nav pcoded-inner-navbar ">                
                <li class="nav-item">
                    <a href="{{URL::to('admin/dashboard')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-layout"></i></span>
                        <span class="pcoded-mtext">Post's</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ URL::to('admin/posts') }}">Post List</a></li>
                        <li><a href="{{ URL::to('admin/post/add') }}">Add Post</a></li>
                        <li><a href="{{ URL::to('admin/posts/categories') }}">Categories List</a></li>
                    </ul>
                </li>               
                
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                        <span class="pcoded-mtext">Product's</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{URL::to('admin/product-list')}}">Product List</a></li>
                        <li><a href="{{URL::to('admin/add-product')}}">Add Product</a></li>
                        <li><a href="{{URL::to('admin/categories-list')}}">Categories List</a></li>                        
                    </ul>
                </li>
                
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-award"></i></span>
                        <span class="pcoded-mtext">Product Features</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{URL::to('admin/features')}}">Features List</a></li>
                        <li><a href="{{URL::to('admin/features/add')}}"> Add Feature</a></li>                                                
                    </ul>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                        <span class="pcoded-mtext">Maintenance Addon</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{URL::to('admin/maintenance-addon')}}">Maintenance List</a></li>
                        <li><a href="{{URL::to('admin/maintenance-addon/add')}}"> Add Maintenance</a></li>                                                
                    </ul>
                </li>                
                
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
                        <span class="pcoded-mtext">Orders List</span>
                    </a>
                </li>
                
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                        <span class="pcoded-mtext">General Settings</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{URL::to('admin/general-setting')}}">Basic Setting</a></li>
                        <li><a href="{{URL::to('admin/general-setting/affiliate')}}"> Affiliate Setting</a></li>                                                
                    </ul>
                </li>
                
            </ul>        
        </div>
    </div>
</nav>