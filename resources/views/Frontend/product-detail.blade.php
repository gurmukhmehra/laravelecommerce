@extends('Frontend.app')
@section('content')
<div class="main-wrapper product-details">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="tr-section product-details">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="product-details-slider">
                                <div class="tr-product">
                                    @if(!empty($productDetail->productImage))
                                        <img src="{{ URL::asset('uploads/product_images/'.$productDetail->productImage) }}" alt="Image" class="img-fluid">
                                    @else
                                        <img src="{{ URL::asset('uploads/No_Image_Available.jpg')}}" alt="{{$productDetail->ProductSlug}}" class="img-fluid" />
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="products-details-info">
                                <div class="message">
                                    @if(session()->has('AddToCartSuccess'))
                                        <div class="alert alert-success">
                                            {{ session()->get('AddToCartSuccess') }}
                                        </div>
                                    @endif
                                </div>
                            {{ Form::open(array('url' => 'addtocart', 'class' =>'w-100', 'autocomplete'=>'off')) }} 
                                <span class="product-title">{{$productDetail->category->categoryName}}</span>
                                <h1>{{$productDetail->ProductName}}</h1>
                                <div class="quantity-price">
                                    <div class="price">                                       
                                        @php
                                            if(!empty($productDetail->product_sale_price)) :
                                                $finalProductPrice = $productDetail->product_sale_price;
                                                $orginalPrice = $productDetail->product_sale_price;
                                            else:
                                                $finalProductPrice = $productDetail->product_price;
                                                $orginalPrice = $productDetail->product_price;
                                            endif;
                                            foreach($Features as $Feature):
                                                $finalProductPrice += $Feature->featurePrice;
                                            endforeach;
                                            $finalProductPrice = number_format((float)$finalProductPrice, 2, '.', '');
                                        @endphp                                    
                                    <span class="priceContainer" data-orginalPrice="{{$orginalPrice}}">
                                        @if(!empty($productDetail->product_sale_price))
                                            <del>${{$productDetail->product_price}}</del>
                                            <span class="total_product_price" style="float:none;">${{$finalProductPrice}}</span>
                                        @else 
                                            <span class="total_product_price" style="float:none;">${{$finalProductPrice}}</span>
                                        @endif                                            
                                    </span>
                                    </div>                     
                                </div>
                                <div class="quantity-discrition">
                                    {!! Str::limit($productDetail->description, 200) !!}
                                </div>
                                <div class="row">                                    
                                    <div class="col-md-6">
                                        <h6 class="text-dark">Feature</h6>
                                        <hr>
                                        @foreach($Features as $Feature)
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input get_order_feature addons" data-addonPrice="{{$Feature->featurePrice}}" checked name="order_feature[]" value="{{$Feature->id}}"> {{$Feature->featureName}} -- <span class="text-primary">${{$Feature->featurePrice}}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-dark">Maintenance Addon</h6>                                                                               
                                        <hr>
                                        @foreach($MaintenanceAddon as $addon)
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input addons" data-addonPrice="{{$addon->addon_price}}" name="maintenance_addon" value="{{$addon->id}}" @if($addon->maintenance_addon=='6 Month Maintenance') checked @endif /> {{$addon->maintenance_addon}} -- <span class="text-primary">${{$addon->addon_price}}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>                
                                </div>
                                <div class="add-to-cart detail-buttons">
                                <hr>
                                    <h6 class="text-dark">Enter Custom Feature Name:</h6>
                                    <input type="text" class="form-control mb-3 mr-sm-2" name="product_coustom_feature" placeholder="Enter custom feature name.." id="">
                                    @if(Auth::check() && Auth::User()->role=='customer')
                                        @if(!empty($productDetail->product_sale_price))
                                            @php $productPrice = $productDetail->product_sale_price; @endphp
                                        @else 
                                            @php $productPrice = $productDetail->product_price; @endphp
                                        @endif
                                        <input type="hidden" class="form-control" value="{{$productDetail->id}}" name="productID"/>
                                        <input type="hidden" class="form-control" value="{{$finalProductPrice}}" name="productPrice"/>

                                        <div class="buttonContainer">
                                            @if(!empty($cartdata))
                                                @php 
                                                    $addTocartBtn = false;
                                                @endphp
                                                @foreach($cartdata as $key => $cartItem)
                                                    @if($productDetail->id == $cartItem['productID'])
                                                        @php  $addTocartBtn = true; @endphp
                                                    @endif
                                                @endforeach
    
                                                @if($addTocartBtn)
                                                    <a class="btn btn-primary addtocart" >Added in Cart </a>                                                
                                                @else
                                                    <button type="submit" class="btn btn-primary addtocart" >Add to Cart </button>                                                 
                                                @endif
                                            @else 
                                                <button type="submit" class="btn btn-primary addtocart" >Add to Cart </button>
                                            @endif
                                        </div>
                                    @else 
                                        <a class="btn btn-primary checkUserLogin" >Add to Cart</a>
                                    @endif
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#DemoModal" data-backdrop="static" data-keyboard="false">Demo</a>
                                    @if(!empty($productDetail->play_store_url))
                                        <a class="btn btn-primary" href="{{$productDetail->play_store_url}}" Target="_blank">App Store</a> 
                                    @endif 
                                    @if(Auth::check() && Auth::User()->role=='customer')   
                                        <a class="btn btn-primary CopyReffercalCode" data-referralcode="Refferral code copy">Referral code</a> 
                                    @else
                                        <a class="btn btn-primary checkUserLogin">Referral code</a>
                                    @endif
                                    <p class="userMsg text-danger"></p>                
                                </div>
                            {{ Form::close() }}
                            </div>

                        </div>
                    </div>
                    
                    <div class="modal fade" id="DemoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Product Demo</h5>
                                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/9xwazD5SyVg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    
                </div> 
                
                <div class="tr-section products-description">
                    <ul class="nav nav-tabs description-tabs" role="tablist">
                        <li role="presentation" class="nav-item">
                            <a class="nav-link active" href="#details" aria-controls="details" role="tab" data-toggle="tab">Details</a>
                        </li>                
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="details">
                            {!! $productDetail->description !!}                           
                        </div>
                    </div>
                </div>
                
            </div>            
        </div>        
    </div>    
</div>
@endsection

@section('footer-scripts')
    <script src="{{ asset('custom/js/jquery.min.js') }}"></script>
    <script>        
        $(".checkUserLogin").on('click', function(event){
            $('.userMsg').text('Please Login'); 
            setTimeout(function() {
                $(".userMsg").text('');
            }, 5000);           
        });
        $(document).on('change', '.addons', function() {
            const addons = $(this).parents('form').find(".addons:checked");
            const productPrice = parseFloat($('.priceContainer').data('orginalprice'));
            let newPrice = productPrice;

            Array.from(addons).forEach((addon) => {
                newPrice += parseFloat(addon.dataset.addonprice);
            })
            $(this).parents('form').find(".total_product_price").text(`$${ newPrice.toFixed(2) }`);
            $(this).parents('form').find("input[name='productPrice']").val(`${ newPrice.toFixed(2) }`);
        });
        
        $(".CopyReffercalCode").on('click', function(event){
            console.log('Reffer : ', $(this).data('referralcode'));                      
        });
        
              
    </script>
@endsection