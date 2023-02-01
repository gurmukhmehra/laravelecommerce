@extends('admin.app')
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Products Categories List</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/dashboard')}}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item">Products Categories List</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">                
                <span class="d-block m-t-5">
                    <a href="{{URL::to('admin/add-category')}}" class="btn btn-info"><i class="feather icon-plus"></i> Add Category</a>
                </span>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Category Name</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Product Count</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach($categoryList as $category)                                
                                <tr>
                                    <td class="text-center">{{$i}}</td>
                                    <td class="text-center">
                                        @if(!empty($category->categoryImage))                                        
                                            <img src="{{ URL::asset('uploads/category_images/'.$category->categoryImage) }}" style="width: 50px;border-radius: 13px;" />
                                        @else 
                                         <img src="{{ URL::asset('uploads/No_Image_Available.jpg')}}" style="width: 50px;border-radius: 13px;"/>
                                        @endif
                                    </td>
                                    <td class="text-center">{{$category->categoryName}}</td>
                                    <td class="text-center">{!! Str::limit($category->CategoryDescription, 50) !!}</td>
                                    <td class="text-center">{{count($category->ProductByCategory)}}</td>
                                    @if($category->categoryStatus=='publish')
                                        <td class="text-success text-center">Publish</td>
                                    @else
                                        <td class="text-danger text-center">Draft</td>
                                    @endif
                                    <td class="text-center">
                                        <a href="{{ url('admin/edit-category/'.$category->categorySlug) }}" class="btn btn-success"><i class="feather mr-2 icon-edit"></i> Edit</a>
                                    </td>
                                </tr> 
                                @php $i++; @endphp                         
                            @endforeach
                        </tbody>
                    </table>                    
                </div>
                <div class="justify-content-center">                    
                    {!! $categoryList->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
@endsection('content')