@extends('Admin.app')
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Edit Post Category</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/dashboard')}}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/posts/categories')}}">Posts Categories List</a></li>
                        <li class="breadcrumb-item">Edit Post Category : {{$category->categoryName}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <span class="d-block m-t-5">
                    <a href="{{URL::to('admin/posts/categories')}}" class="btn btn-info"><i class="feather icon-list"></i> Posts Categories List</a>
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
                {{ Form::open(array('url' => 'admin/posts/categories/edit/'.$category->categorySlug, 'enctype' =>'multipart/form-data')) }}
                    <input type="hidden" name="id" class="form-control" value="{{$category->id}}" id="" placeholder="">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Category Name <sup class="text-danger" style="font-size:15px;">*</sup></label>
                            <input type="text" name="categoryName" required class="form-control" value="{{$category->categoryName}}" id="" placeholder="">
                        </div>                        
                    </div>              
                    <div class="form-row mt-3">
                        <label for="">Description</label>
                        <textarea class="form-control ckeditor" required id="" name="CategoryDescription" placeholder="">{{$category->CategoryDescription}}</textarea>                        
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Image</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="categoryImage" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            @if(!empty($category->categoryImage))                                        
                                <img src="{{ URL::asset('uploads/posts_category/'.$category->categoryImage) }}" style="width: 50%;border-radius: 13px;" />
                            @else 
                                <img src="{{ URL::asset('uploads/No_Image_Available.jpg')}}" style="width: 50%;border-radius: 13px;"/>
                            @endif
                        </div> 
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Status</label>
                                </div>
                                <select class="custom-select" name="categoryStatus" id="inputGroupSelect01">
                                    <option value="publish" @if($category->categoryStatus=='publish') selected @endif>Publish</option>
                                    <option value="draft" @if($category->categoryStatus=='draft') selected @endif>Draft</option>
                                </select>
                            </div>                            
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