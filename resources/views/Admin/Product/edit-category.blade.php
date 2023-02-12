@extends('Admin.app')
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Edit Category</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/dashboard')}}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/categories-list')}}">Categories List</a></li>
                        <li class="breadcrumb-item">Edit Category : {{$categoryDetail->categoryName}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <span class="d-block m-t-5">
                    <a href="{{URL::to('admin/categories-list')}}" class="btn btn-info"><i class="feather icon-list"></i> Categories List</a>
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
                {{ Form::open(array('url' => 'admin/edit-category/'.$categoryDetail->categorySlug, 'enctype' =>'multipart/form-data')) }}
                    <input type="hidden" name="id" value="{{$categoryDetail->id}}" required class="form-control" id="" placeholder="">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Category Name <sup class="text-danger" style="font-size:15px;">*</sup></label>
                            <input type="text" name="categoryName" value="{{$categoryDetail->categoryName}}" required class="form-control" id="" placeholder="">
                        </div>                        
                    </div>              
                    <div class="form-row mt-3">
                        <label for="">Description</label>
                        <textarea class="form-control ckeditor" required id="" name="CategoryDescription" placeholder="">{{$categoryDetail->CategoryDescription}}</textarea>                        
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-6">
                            <label for="">Image</label>
                            <input type="file" class="form-control" id="" name="categoryImage">
                            @if(!empty($categoryDetail->categoryImage))                                        
                                <img src="{{ URL::asset('uploads/category_images/'.$categoryDetail->categoryImage) }}" class="img-responsive mt-3" style="width:150px;" />
                            @else 
                                <img src="{{ URL::asset('uploads/No_Image_Available.jpg')}}" class="img-responsive mt-3"  style="width:150px;" />
                            @endif
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Status</label>
                            <select class="form-control" name="categoryStatus">
                                <option value="publish" @if($categoryDetail->categoryStatus=='publish') selected @endif>Publish</option>
                                <option value="draft" @if($categoryDetail->categoryStatus=='draft') selected @endif>Draft</option>
                            </select>
                        </div>                    
                    </div> 
                                       
                    <div class="form-row">
                        <button class="btn btn-info" type="submit">Save</button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection('content')
@section('footer-scripts')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('.ckeditor').ckeditor();
            setTimeout(function() {
                $('.message').slideUp("slow");
            }, 3000);
        });
       
    </script> 
@endsection