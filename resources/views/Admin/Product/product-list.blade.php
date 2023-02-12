@extends('Admin.app')
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Products List</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/dashboard')}}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item">Products List</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">                
                <span class="d-block m-t-5">
                    <a href="{{URL::to('admin/add-product')}}" class="btn btn-info"><i class="feather icon-plus"></i> Add Product</a>
                </span>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Sale Price</th>
                                <th class="text-center">Product Category</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach($productList as $product)
                                <tr>
                                    <td class="text-center">{{$i}}</td>
                                    <td class="text-center">
                                        @if(!empty($product->productImage))                                        
                                            <img src="{{ URL::asset('uploads/product_images/'.$product->productImage) }}" style="width: 50px;border-radius: 13px;" />
                                        @else 
                                         <img src="{{ URL::asset('uploads/No_Image_Available.jpg')}}" style="width: 50px;border-radius: 13px;"/>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{$product->ProductName}}                                        
                                    </td>
                                    <td class="text-center">                                                                               
                                        @if(!empty($product->product_sale_price)) 
                                            <p class="text-danger">${{$product->product_price}}</p> 
                                        @else 
                                            <p class="text-success">${{$product->product_price}}</p> 
                                        @endif                                    
                                    </td>
                                    <td class="text-center">
                                        @if(!empty($product->product_sale_price)) 
                                            <p class="text-success">${{$product->product_sale_price}}</p>  
                                        @else 
                                            ---
                                        @endif
                                    </td>                                  
                                    <td class="text-center">{{$product->category->categoryName}}</td>
                                    @if($product->productStatus=='publish')
                                        <td class="text-success">Publish</td>
                                    @else
                                        <td class="text-danger">Draft</td>
                                    @endif
                                    <td class="text-center">
                                        <a href="{{ url('admin/edit-product/'.$product->ProductSlug) }}" class="btn btn-success"><i class="feather mr-2 icon-edit"></i> Edit</a>
                                    </td>
                                </tr>
                                @php $i++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="justify-content-center">                    
                    {!! $productList->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
@endsection('content')