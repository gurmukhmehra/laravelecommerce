@extends('Frontend.app')
@section('content')
<div class="tr-breadcrumb">
    <div class="container">
        <div class="breadcrumb-info">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{URL::to('/')}}">Home</a>
                </li>
                <li class="breadcrumb-item active">Shop</li>
            </ol>
            <div class="page-title">
                <h1>Shop</h1>
            </div>
        </div>
    </div>
</div>

<div class="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-3">
                <div class="product-categories tr-section">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            @foreach($categoryList as $category)
                                <div class="panel-heading">
                                    <a href="#">
                                        <span>
                                            {{$category->categoryName}} 
                                            <span class="text-info" style="float:right;">
                                                ({{count($category->ProductByCategory)}})
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-lg-9">
                <div id="computers" class="product-list">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-6 col-lg-4">
                                <div class="tr-product">
                                    <a href="{{ URL::to('product-detail/'.$product->ProductSlug) }}">
                                        <span class="product-image">
                                            @if(!empty($product->productImage))
                                                <img src="{{ URL::asset('uploads/product_images/'.$product->productImage) }}" alt="{{$product->ProductSlug}}" style="height:188px;width:100%;" class="img-fluid"/>
                                            @else 
                                            <img src="{{ URL::asset('uploads/No_Image_Available.jpg')}}" alt="{{$product->ProductSlug}}" style="height:188px;width:100%;" class="img-fluid" />
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
                                        <a class="btn btn-primary" href="{{ URL::to('product-detail/'.$product->ProductSlug) }}">Add to Cart</a>
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
                    <div class="tr-pagination tr-section text-center">
                        {!! $products->withQueryString()->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection