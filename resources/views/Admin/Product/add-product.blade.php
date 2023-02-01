@extends('admin.app')
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Add Product</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/dashboard')}}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/product-list')}}">Products List</a></li>
                        <li class="breadcrumb-item">Add Products</li>
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
                {{ Form::open(array('url' => 'admin/add-product', 'enctype' =>'multipart/form-data')) }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Product Name <sup class="text-danger" style="font-size:15px;">*</sup></label>
                            <input type="text" name="ProductName" value="{{ old('ProductName') }}" required class="form-control" id="" placeholder="Product Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Quantity <sup class="text-danger" style="font-size:15px;">*</sup></label>
                            <input type="number" min="1" name="quantity" value="{{ old('quantity') }}" required class="form-control" id="" placeholder="1">
                        </div>
                    </div>
                    <div class="form-row"> 
                        <div class="form-group col-md-6">
                            <label for="">Price <sup class="text-danger" style="font-size:15px;">*</sup></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">$</span>
                                </div>
                                <input type="text" value="{{ old('product_price') }}" name="product_price" class="form-control price" id="product_price" placeholder="Price" required="">
                                <p id="ProductPriceError" class="w-100"></p>
                            </div>
                        </div>                       
                        <div class="form-group col-md-6">
                            <label for="">Sale Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">$</span>
                                </div>
                                <input type="text" value="{{ old('product_sale_price') }}" name="product_sale_price" class="form-control price" id="product_sale_price" placeholder="Sale Price">
                                <p id="priceError" class="w-100"></p>
                            </div>
                        </div>                        
                    </div>
                    <div class="form-row">          
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelectCategory">Category</label>
                            </div>
                            <select class="custom-select" name="productCategory" id="inputGroupSelectCategory">
                                <option selected="">Choose...</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <label for="">Description <sup class="text-danger" style="font-size:15px;">*</sup></label>
                        <textarea class="form-control ckeditor" required id="" name="description" placeholder="Description">{{ old('description') }}</textarea>                        
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Image</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="productImage" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>                            
                        </div> 
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Status</label>
                                </div>
                                <select class="custom-select" name="productStatus" id="inputGroupSelect01">
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
