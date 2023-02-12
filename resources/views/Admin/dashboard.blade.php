@extends('Admin.app')
@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-body">
                    <h6 class="text-white">Orders Received</h6>
                    <h2 class="text-right text-white"><i class="feather icon-shopping-cart float-left"></i><span>486</span></h2>
                    <p class="m-b-0">Completed Orders<span class="float-right">351</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-body">
                    <h6 class="text-white">Total Sales</h6>
                    <h2 class="text-right text-white"><i class="feather icon-tag float-left"></i><span>1641</span></h2>
                    <p class="m-b-0">This Month<span class="float-right">213</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-body">
                    <h6 class="text-white">Revenue</h6>
                    <h2 class="text-right text-white"><i class="feather icon-repeat float-left"></i><span>$42,562</span></h2>
                    <p class="m-b-0">This Month<span class="float-right">$5,032</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card bg-c-red order-card">
                <div class="card-body">
                    <h6 class="text-white">Total Profit</h6>
                    <h2 class="text-right text-white"><i class="feather icon-award float-left"></i><span>$9,562</span></h2>
                    <p class="m-b-0">This Month<span class="float-right">$542</span></p>
                </div>
            </div>
        </div>
    </div>
@endsection