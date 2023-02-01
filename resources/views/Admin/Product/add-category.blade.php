@extends('admin.app')
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Add Category</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/dashboard')}}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/categories-list')}}">Categories List</a></li>
                        <li class="breadcrumb-item">Add Category</li>
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
                {{ Form::open(array('url' => 'admin/add-category', 'enctype' =>'multipart/form-data')) }}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Category Name <sup class="text-danger" style="font-size:15px;">*</sup></label>
                            <input type="text" name="categoryName" required class="form-control" id="" placeholder="">
                        </div>                        
                    </div>              
                    <div class="form-row mt-3">
                        <label for="">Description</label>
                        <textarea class="form-control ckeditor" required id="" name="CategoryDescription" placeholder=""></textarea>                        
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
                        </div> 
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Status</label>
                                </div>
                                <select class="custom-select" name="categoryStatus" id="inputGroupSelect01">
                                    <option value="publish">Publish</option>
                                    <option value="draft">Draft</option>
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