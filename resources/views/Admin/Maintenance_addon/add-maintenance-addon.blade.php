@extends('Admin.app')
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Add Maintenance Addon</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/dashboard')}}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/maintenance-addon')}}">Products Maintenance Addon's</a></li>
                        <li class="breadcrumb-item">Add Maintenance Addon</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <span class="d-block m-t-5">
                    <a href="{{URL::to('admin/maintenance-addon')}}" class="btn btn-info"><i class="feather icon-list"></i> Products Maintenance Addon's</a>
                </span>
                <hr>
            </div>
            <div class="card-body table-border-style">
                <div class="message">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class = "alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div>
                    @endif
                </div>
                {{ Form::open(array('url' => 'admin/product-add-maintenance-addon', 'enctype' =>'multipart/form-data')) }}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Maintenance Addon <sup class="text-danger" style="font-size:15px;">*</sup></label>
                            <input type="text" name="maintenance_addon" value="" required class="form-control" id="" placeholder="6 month/ 1 year/ 2 year">
                        </div>                        
                    </div>              
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Addon Price <sup class="text-danger" style="font-size:15px;">*</sup></label>
                            <input type="text" class="form-control" required id="" value="" name="addon_price" placeholder="100">                        
                            <small>if you set 0 price. it's means <b>Free Add.</b></small>
                        </div>
                    </div>              
                                       
                    <div class="form-row mt-2">
                        <div class="form-group col-md-12">
                            <button class="btn btn-info" type="submit">Save</button>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection('content')
