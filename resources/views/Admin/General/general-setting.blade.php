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
                {{ Form::open(array('url' => 'admin/general-setting', 'enctype' =>'multipart/form-data')) }}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Site Name <sup class="text-danger" style="font-size:15px;">*</sup></label>
                            <input type="text" name="siteName" value="{{$setting->siteName}}" required class="form-control" id="" placeholder="">
                        </div>                        
                    </div>              
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Site Support Number <sup class="text-danger" style="font-size:15px;">*</sup></label>
                            <input type="text" class="form-control" required id="" value="{{$setting->SiteSupportNumber}}" name="SiteSupportNumber" placeholder="">                        
                        </div>
                    </div> 
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Site Email <sup class="text-danger" style="font-size:15px;">*</sup></label>
                            <input type="email" class="form-control" required id="" value="{{$setting->siteEmail}}" name="siteEmail" placeholder="">                        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Site Copy Right <sup class="text-danger" style="font-size:15px;">*</sup></label>
                            <input type="text" class="form-control" required id="" value="{{$setting->SiteCopyRight}}" name="SiteCopyRight" placeholder="">                        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Site Logo</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="siteLogo" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            @if(!empty($setting->siteLogo))                                        
                                <img src="{{ URL::asset('uploads/'.$setting->siteLogo) }}" style="width: 50%;border-radius: 13px;" />
                            @endif   
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Facebook Link </label>
                            <input type="text" class="form-control" id="" value="{{$setting->FacebookLink}}" name="FacebookLink" placeholder="">                        
                        </div>
                    </div> 
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Twitter Link </label>
                            <input type="text" class="form-control" id="" value="{{$setting->TwitterLink}}" name="TwitterLink" placeholder="">                        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Linkedin Link </label>
                            <input type="text" class="form-control" id="" value="{{$setting->LinkedinLink}}" name="LinkedinLink" placeholder="">                        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Instagram Link </label>
                            <input type="text" class="form-control" id="" value="{{$setting->InstagramLink}}" name="InstagramLink" placeholder="">                        
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
