@extends('Frontend.app')
@section('content')
<div class="main-wrapper">
    <div class="container">
        <div class="tr-section products-description">
            <div class="cart-title">
                <span>Cart</span>
            </div> 
            <span id="cartData">            
            @if($cartdata):
                <div class="item-info-menu">
                    <div class="row">
                        <div class="col-md-8">
                            <span>Item</span>
                        </div>
                        <div class="col-md-2">
                            <span>Price</span>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <span class="price">Sub Total</span>
                        </div>
                    </div>
                </div>            
                <ul class="tr-list cart-list">
                    @php
                        $cartTotal = 0;
                    @endphp
                    @foreach($cartdata as $key => $cartItem)
                        @php
                            $productDetail = DB::table('products')->where('id', $cartItem['productID'])->first();
                            $cartTotal += number_format((float)$cartItem['productPrice'], 2, ".", ""); 
                            $maintenance_addon = DB::table('maintenance_addons')->where('id', $cartItem['maintenance_addon'])->first();
                            $featureList = DB::table('features')->whereIn('id',$cartItem['order_feature'])->get();                                 
                        @endphp
                        <li class="cart-item remove-item" data-proid="{{$cartItem['productID']}}">
                            <span class="remove-icon-cartPage" style="top:30px;">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </span>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="product">
                                        <a href="{{ URL::to('product-detail/'.$productDetail->ProductSlug) }}">
                                            <span class="product-image">
                                                @if(!empty($productDetail->productImage))
                                                    <img src="{{ URL::asset('uploads/product_images/'.$productDetail->productImage) }}" alt="{{$productDetail->ProductSlug}}" class="img-fluid"/>
                                                @else 
                                                    <img src="{{ URL::asset('uploads/No_Image_Available.jpg')}}" alt="{{$productDetail->ProductSlug}}" class="img-fluid"/>
                                                @endif
                                            </span>
                                            <span class="product-title">{{$productDetail->ProductName}}</span>                                 
                                        </a>                            
                                        <div class="row pt-4 w-100">
                                            <div class="col-md-6">
                                                <h6 class="text-dark">Feature list</h6>
                                                <ul style="padding-left: 10px;list-style-type: none;font-size: 13px;">
                                                    @foreach($featureList as $feature)
                                                        <li class="p-0 text-dark" style="border-bottom:none;">
                                                            <i class="fa fa-check" aria-hidden="true"></i> {{$feature->featureName}} -- Price {{$feature->featurePrice}}
                                                        </li>
                                                    @endforeach
                                                </ul>                                        
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="text-dark">Maintenance Addon</h6>
                                                <small class="text-dark"><i class="fa fa-check" aria-hidden="true"></i> {{$maintenance_addon->maintenance_addon}}  -- Price ${{number_format((float)$maintenance_addon->addon_price, 2, ".", "")}}</small>
                                            </div>
                                        </div>
                                        @if(!empty($cartItem['product_coustom_feature'])):
                                            <div class="row pt-4 w-100">
                                                <h6 class="w-100 text-dark">Enter Custom Feature</h6>
                                                <p class="text-dark" style="padding-left: 10px;font-size: 13px;">{{$cartItem['product_coustom_feature']}}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="product-quantity">
                                        <span class="price">
                                            @if(!empty($productDetail->product_sale_price))
                                                <del>${{$productDetail->product_price}}</del>
                                                ${{$productDetail->product_sale_price}}
                                            @else 
                                                ${{$productDetail->product_price}}
                                            @endif
                                        </span>                                        
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <span class="price">${{number_format((float)$cartItem['productPrice'], 2, '.', '')}}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul> 
                <ul class="tr-list cart-totals">
                    <li>
                        <div class="row text-dark">
                            <div class="col-4 col-lg-9 col-md-8">
                                <span>Subtotal</span>
                            </div>
                            <div class="col-4 col-md-2">
                                <span>{{count($cartdata)}} Items</span>
                            </div>
                            <div class="col-4 col-lg-1 col-md-2">
                                <span class="price">${{$cartTotal}}</span>
                            </div>
                        </div>
                    </li>
                </ul>  
                <div class="buttons">
                    <a href="{{URL::to('shop')}}" class="btn btn-primary button-back pull-left">Back</a>
                    <a href="{{URL::to('checkout')}}" class="btn btn-primary pull-right">Proceed To Checkout</a>
                </div> 
            @else 
            <p class="w-100">
                <p class="text-center w-100 text-danger">Cart empty</p>
                <p class="text-center w-100">
                    <a href="{{URL::to('shop')}}" class="btn btn-primary">
                        Countiune Shopping
                    </a>
                </p>
            </p> 
            @endif 
            </span>    
        </div>        
    </div>    
</div>
@endsection

@section('footer-scripts')
    <script src="{{ asset('custom/js/jquery.min.js') }}"></script>
    <script>
        $(document).on('click', ".remove-icon-cartPage", function() {
            $.ajax({
                type: 'get',
                datatype: 'json',
                url: "{{ URL::to('remove-cart-page-item',) }}/" + $(this).parents('.remove-item').data('proid'),
                beforeSend: function () {   
                    $(this).css('display','none');           
                },
                success: function (response) {
                    //$("#cartData").html(response);
                    location.reload();                
                },
                complete: function () {              
                }
            }); 
        });
    </script>
@endsection
