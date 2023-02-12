@extends('Admin.app')
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Add Feature</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/dashboard')}}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/features')}}">Products Feature List</a></li>
                        <li class="breadcrumb-item">Add Feature</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <span class="d-block m-t-5">
                    <a href="{{URL::to('admin/features')}}" class="btn btn-info"><i class="feather icon-list"></i> Products Feature List</a>
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
                {{ Form::open(array('url' => 'admin/general-setting/affiliate', 'enctype' =>'multipart/form-data')) }}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Set Comission % (1 To 10 User) <sup class="text-danger" style="font-size:15px;">*</sup></label>
                            <div class="input-group mb-3">                        
                                <div class="custom-file">
                                    <input type="text" name="affiliate_comission_1_to_10" value="{{ $setting->affiliate_comission_1_to_10 }}" required class="form-control" id="" placeholder="10.00%">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>                                
                            </div>                               
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Set Comission (11 To 100 User) <sup class="text-danger" style="font-size:15px;">*</sup></label>
                            <div class="input-group mb-3">                        
                                <div class="custom-file">
                                    <input type="text" name="affiliate_comission_11_to_100" value="{{ $setting->affiliate_comission_11_to_100 }}" required class="form-control" id="" placeholder="10.00%">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Set Comission (More then 100 User) <sup class="text-danger" style="font-size:15px;">*</sup></label>
                            <div class="input-group mb-3">                        
                                <div class="custom-file">
                                    <input type="text" name="affiliate_comission_more_100" value="{{ $setting->affiliate_comission_more_100 }}" required class="form-control" id="" placeholder="10.00%">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>                                
                            </div>
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
