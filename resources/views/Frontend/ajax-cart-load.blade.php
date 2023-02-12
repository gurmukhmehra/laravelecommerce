
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
                        @if($cartdata)
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
                                <a class="btn btn-primary cart-button" href="{{URL::to('/cart')}}">View Cart</a>
                                <a class="btn btn-primary" href="{{URL::to('/checkout')}}">Checkout</a>
                            </div>
                        @else 
                            <h6 class="text-danger text-center cartempty">Empty cart</h4>
                        @endif
                    </div>
                </li>

