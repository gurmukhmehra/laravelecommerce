@extends('Frontend.app')
@section('content')
<div class="main-wrapper">
    <div class="container bg-white">
        <h5 class="p-3">Registertiom Form</h5>
        <p class="text-danger pl-3">Please fill * fields.</p>
        <hr>
        <div class="row p-3">
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
        {{ Form::open(array('url' => 'sign-up', 'class' =>'w-100')) }}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Name <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" name="name" id="" placeholder="Name..">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Mobile No <sup class="text-danger">*</sup> (<small class="text-dark">Enter only numeric number.</small>)</label>
                    <input type="text" class="form-control mobile" id="" name="mobile" placeholder="Mobile no..">
                    
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Address <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="" name="address" placeholder="Address..">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">City <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="" name="city" placeholder="City..">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">State <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="" name="state" placeholder="State..">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Zip code <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="" name="zipCode" placeholder="Zip code..">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Country <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="" name="country" placeholder="Country..">
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email <sup class="text-danger">*</sup></label>
                    <input type="email" class="form-control" id="" name="email" placeholder="Email..">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Password <sup class="text-danger">*</sup></label>
                    <input type="password" class="form-control" id="" name="password" placeholder="Password..">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection

@section('footer-scripts')
<script src="{{ asset('custom/js/jquery.min.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        $(".mobile").on("keypress keyup blur",function (event) {
            $(this).val($(this).val().replace(/[^0-9\.]/g,''));
            if ((event.which != 8 || $(this).val().indexOf('.') != 0) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
    });
</script>  
@endsection