@extends('Admin.app')
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Edit Product</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/dashboard')}}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/product-list')}}">Products List</a></li>
                        <li class="breadcrumb-item">Edit Product ; {{$productDetail->ProductName}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <span class="d-block m-t-5">
                    <a href="{{URL::to('admin/product-list')}}" class="btn btn-info"><i class="feather icon-list"></i> Product List</a>
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
                {{ Form::open(array('url' => 'admin/edit-product/'.$productDetail->ProductSlug, 'enctype' =>'multipart/form-data')) }}
                    <input type="hidden" name="id" value="{{$productDetail->id}}">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Product Name <sup class="text-danger" style="font-size:15px;">*</sup></label>
                            <input type="text" name="ProductName" value="{{ $productDetail->ProductName }}" required class="form-control" id="" placeholder="Product Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Category</label>
                            <select class="form-control" name="productCategory">
                                <option value="">select</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($productDetail->productCategory==$category->id) selected @endif>{{$category->categoryName}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row"> 
                        <div class="form-group col-md-6">
                            <label for="">Price <sup class="text-danger" style="font-size:15px;">*</sup></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">$</span>
                                </div>
                                <input type="text" value="{{ $productDetail->product_price }}" name="product_price" class="form-control price" id="product_price" placeholder="Price" required="">
                                <p id="ProductPriceError" class="w-100"></p>
                            </div>
                        </div>                       
                        <div class="form-group col-md-6">
                            <label for="">Sale Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">$</span>
                                </div>
                                <input type="text" value="{{ $productDetail->product_sale_price }}" name="product_sale_price" class="form-control price" id="product_sale_price" placeholder="Sale Price">
                                <p id="priceError" class="w-100"></p>
                            </div>
                        </div>                        
                    </div>

                    <div class="form-row"> 
                        <div class="form-group col-md-12">
                            <label for="">Demo Link (Youtube URL)</label>
                            <input type="text" value="{{ $productDetail->demo_link }}" name="demo_link" class="form-control" id="demo_link" placeholder="">
                        </div>                   
                    </div>

                    <div class="form-row"> 
                        <div class="form-group col-md-4">
                            <label for="">Play Store Link</label>
                            <input type="text" value="{{ $productDetail->play_store_url }}" name="play_store_url" class="form-control" id="play_store_url" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Play Store Username</label>
                            <input type="text" value="{{ $productDetail->play_username }}" name="play_username" class="form-control" id="play_username" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Play Store Password</label>
                            <input type="text" value="{{ $productDetail->play_password }}" name="play_password" class="form-control" id="play_password" placeholder="">
                        </div>
                    </div>
                    
                    <div class="form-row mt-3">
                        <label for="">Description <sup class="text-danger" style="font-size:15px;">*</sup></label>
                        <textarea class="form-control ckeditor" required id="" name="description" placeholder="Description">{{ $productDetail->description }}</textarea>                        
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-6">
                            <label for="">Image</label>
                            <input type="file" class="form-control mb-3" id="" name="productImage">
                            @if(!empty($productDetail->productImage))                                        
                                <img src="{{ URL::asset('uploads/product_images/'.$productDetail->productImage) }}" style="width: 50%;border-radius: 13px;" />
                            @else 
                                <img src="{{ URL::asset('uploads/No_Image_Available.jpg')}}" style="width: 50%;border-radius: 13px;"/>
                            @endif
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Status</label>
                            <select class="form-control" name="productStatus">
                                <option value="publish" @if($productDetail->productStatus=='publish') selected @endif>Publish</option>
                                <option value="draft" @if($productDetail->productStatus=='draft') selected @endif>Draft</option>
                            </select>
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

@section('footer-scripts')
<script src="{{ asset('custom/js/jquery.min.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        $('.price').keypress(function (e) {
            var charCode = (e.which) ? e.which : event.keyCode    
            if (String.fromCharCode(charCode).match(/[^0-9]/g))    
            return false;                      
        });

        function checkPrice() {
            var product_price = $('#product_price').val();
            var sale_price = $('#product_sale_price').val();
            if(product_price === "") {
                var priceError = 'Please add product price first.';
                $('#ProductPriceError').text(priceError).css('color','red');
                $('#product_price').focus();
                $('#product_sale_price').val('');
                setTimeout(function() {                    
                    $("#ProductPriceError").hide();
                }, 3000);
            } else if(parseInt(sale_price) >= parseInt(product_price)) {
                var priceError = 'Enter sale price less then : ' + product_price;
                $('#priceError').text(priceError).css('color','red');
                $('.savebtn').addClass('d-none');
                
            } else {
                $('.savebtn').removeClass('d-none');
                $('#priceError').text('');                
            }
        }

        $('#product_price').on('keyup change focus', function (e) {
            checkPrice()
        });
        $('#product_sale_price').on('keyup change focus', function (e) {
            checkPrice()
        });
    });       
</script>
@endsection
