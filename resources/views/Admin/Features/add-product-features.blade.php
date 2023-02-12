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
                {{ Form::open(array('url' => 'admin/features/add', 'enctype' =>'multipart/form-data')) }}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Feature Name <sup class="text-danger" style="font-size:15px;">*</sup></label>
                            <input type="text" name="featureName" value="" required class="form-control" id="" placeholder="">
                        </div>                        
                    </div>              
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Feature Price <sup class="text-danger" style="font-size:15px;">*</sup></label>
                            <input type="text" class="form-control" required id="" value="" name="featurePrice" placeholder="100">                        
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
