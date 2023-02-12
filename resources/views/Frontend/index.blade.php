@extends('Frontend.app')
@section('content')
    <div class="tr-banner">
        <div id="home-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="banner-info">
                                    <div class="info-middle">
                                        <span class="click-cart" data-animation="animated fadeInDown">Click Cart</span>
                                        <h1 data-animation="animated fadeInDown">
                                            <span>King Spinner</span> App
                                        </h1>
                                        <div class="paragraphs" data-animation="animated fadeInDown">
                                            <p>I want to share with you their experiences, the difficulties were in my way</p>
                                        </div>
                                        <div data-animation="animated fadeInUp" class="buy-now">
                                            <span>$50000</span>
                                            <a class="btn btn-primary" href="#">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="banner-image" data-animation="animated fadeInUp">
                                    <div class="info-middle">                                    
                                        <img src="{{ asset('front/images/product/king.jpg') }}" alt="Image" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="banner-info">
                                    <div class="info-middle">
                                        <span class="click-cart" data-animation="animated fadeInDown">Click Cart</span>
                                        <h1 data-animation="animated fadeInDown">
                                            <span>King Spinner</span> App
                                        </h1>
                                        <div class="paragraphs" data-animation="animated fadeInDown">
                                            <p>I want to share with you their experiences, the difficulties were in my way</p>
                                        </div>
                                        <div data-animation="animated fadeInUp" class="buy-now">
                                            <span>$50000</span>
                                            <a class="btn btn-primary" href="#">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="banner-image" data-animation="animated fadeInUp">
                                    <div class="info-middle">                                    
                                        <img src="{{ asset('front/images/product/king.jpg') }}" alt="Image" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container indicators-content">
                <ol class="carousel-indicators">
                    <li data-target="#home-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#home-carousel" data-slide-to="1"></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="main-wrapper">
        <div class="tr-section tr-products">
            <div class="section-title text-center">
                <h1>
                    <span>Latest Apps</span>
                </h1>
            </div>
            <div class="container">
                <div class="random-product1">
                    <div class="row product-slider">
                        @foreach($products as $product)
                            <div class="col-sm-4">
                                <div class="tr-product">
                                    <a href="{{ URL::to('product-detail/'.$product->ProductSlug) }}">
                                        <span class="product-image">
                                            @if(!empty($product->productImage))
                                                <img src="{{ URL::asset('uploads/product_images/'.$product->productImage) }}" alt="{{$product->ProductSlug}}" class="img-fluid" style="height:258px;width:100%;">
                                            @else 
                                                <img src="{{ URL::asset('uploads/No_Image_Available.jpg')}}" alt="{{$product->ProductSlug}}" class="img-fluid" style="height:258px;width:100%;" />
                                            @endif
                                        </span>
                                        <span class="color">{{$product->category->categoryName}}</span>
                                        <span class="product-title">{{$product->ProductName}}</span>
                                        <span class="price">
                                            @if(!empty($product->product_sale_price))
                                                <del>${{$product->product_price}}</del>
                                                ${{$product->product_sale_price}}
                                            @else 
                                                ${{$product->product_price}}
                                            @endif
                                            
                                        </span>
                                        <a class="btn btn-primary" href="{{ URL::to('product-detail/'.$product->ProductSlug) }}">View Detail</a>
                                    </a>
                                    <div class="product-icon">
                                        <a href="{{ URL::to('product-detail/'.$product->ProductSlug) }}">
                                            <span class="icon icon-basket"></span>
                                        </a>
                                        <a href="#">
                                            <span class="icon icon-pulse"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="tr-promotion">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-lg-4">
                        <div class="promotion promotion-left">
                            <img src="{{ asset('front/images/product/man2.jpg') }}" alt="Image" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <div class="promotion promotion-right">
                        <div class="right-content">
                            <h1>Discount 25% on All Clickcart</h1>
                            <h2>Electronics Items</h2>
                            <p>consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore, Lorem ipsum dolor sit amet .</p>
                            <a class="btn btn-primary" href="{{URL::to('/shop')}}">Shop Now</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection