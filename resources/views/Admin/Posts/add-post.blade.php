@extends('Admin.app')
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Add Post</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/dashboard')}}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/posts')}}">Posts List</a></li>
                        <li class="breadcrumb-item">Add Post</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <span class="d-block m-t-5">
                    <a href="{{URL::to('admin/posts')}}" class="btn btn-info"><i class="feather icon-list"></i> Post List</a>
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
                {{ Form::open(array('url' => 'admin/post/add', 'enctype' =>'multipart/form-data')) }}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="" class="font-weight-bold">Post Title <sup class="text-danger" style="font-size:15px;">*</sup></label>
                            <input type="text" name="title" value="{{ old('title') }}" required class="form-control" id="" placeholder="Product Name">
                        </div>                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="" class="w-100 font-weight-bold">Post Categories</label>                            
                            @if(count($categories)>0)
                                @foreach($categories as $cat)
                                    <div class="col-md-12 ml-3 mt-2">
                                        <input class="form-check-input" name="categories[]" type="checkbox" value="{{$cat->id}}" id="cat_{{$cat->id}}">
                                        <label class="form-check-label" for="cat_{{$cat->id}}">{{$cat->categoryName}}</label>
                                    </div>
                                @endforeach
                            @else 
                                <p class="text-danger"><strong>Please add Categories<strong></p>
                            @endif                                                     
                        </div>                        
                    </div>
                    
                    <div class="form-row mt-3">
                        <label for="" class="font-weight-bold">Description <sup class="text-danger" style="font-size:15px;">*</sup></label>
                        <textarea class="form-control ckeditor" required id="" name="description" placeholder="Description">{{ old('description') }}</textarea>                        
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold">Image</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="postImage" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>                            
                        </div> 
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text font-weight-bold" for="inputGroupSelect01">Status</label>
                                </div>
                                <select class="custom-select" name="postStatus" id="inputGroupSelect01">
                                    <option value="publish">Publish</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>                            
                        </div>                       
                    </div>
                    
                    <div class="form-row savebtn">
                        <button class="btn btn-info" type="submit">Save</button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    
@endsection('content')
