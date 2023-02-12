@extends('Frontend.app')
@section('content')
<div class="main-wrapper">
    <div class="container">
        <div class="tr-section products-description">
            <div class="cart-title">
                <span>Checkout</span>
            </div> 
            @if($cartdata)
                @php
                    $cartTotal = 0;
                @endphp
                @foreach($cartdata as $key => $cartItem)
                    @php
                        $cartTotal += number_format((float)$cartItem['productPrice'], 2, ".", "");
                    @endphp
                @endforeach
            @endif
            <form class="contact-form" name="contact-form" method="post" action="#">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="card-number">Name</label>
                            <input type="text" class="form-control" readonly value="{{Auth::User()->name}}"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="card-number">Mobile</label>
                            <input type="text" class="form-control" readonly value="{{Auth::User()->mobile}}"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="card-number">Address</label>
                            <input type="text" class="form-control" readonly value="{{Auth::User()->address}}"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="card-number">City</label>
                            <input type="text" class="form-control" readonly value="{{Auth::User()->city}}"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="card-number">State</label>
                            <input type="text" class="form-control" readonly value="{{Auth::User()->state}}"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="card-number">Zip Code</label>
                            <input type="text" class="form-control" readonly value="{{Auth::User()->zipCode}}"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="card-number">Country</label>
                            <input type="text" class="form-control" readonly value="{{Auth::User()->country}}"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="card-number">Email</label>
                            <input type="text" class="form-control" readonly value="{{Auth::User()->email}}"/>
                        </div>
                    </div>
                </div>
                @if($cartdata)
                    <ul class="tr-list cart-totals">
                        <li>
                            <div class="row text-dark">
                                <div class="col-4 col-lg-9 col-md-8">
                                    <span>Order</span>
                                </div>
                                <div class="col-4 col-md-2">
                                    <span>{{count($cartdata)}} Items</span>
                                </div>
                                <div class="col-4 col-lg-1 col-md-2">
                                    <span class="price">Total : ${{$cartTotal}}</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="buttons">
                        <a href="{{URL::to('cart')}}" class="btn btn-primary button-back pull-left">Back</a>
                        <a href="#" class="btn btn-primary pull-right">Payment</a>
                    </div>
                @else 
                    <div class="buttons">
                        <a href="{{URL::to('cart')}}" class="btn btn-primary button-back pull-left">Back</a>
                    </div>
                @endif
            </form>           
        </div>        
    </div>    
</div>
@endsection
