@extends('Frontend.app')
@section('content')
<div class="main-wrapper">
    <div class="container bg-white">        
        <div class="row p-3">            
            <div class="col-md-6" style="margin:0 auto;">
                <h5 class="p-3">Customer Login</h5>
                <p class="text-danger pl-3">Please fill * fields.</p>
                <hr>
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
                {{ Form::open(array('url' => 'sign-in', 'class' =>'w-100', 'autocomplete'=>'off')) }}           
                    <div class="form-row">                        
                            <label for="inputEmail4">Email <sup class="text-danger">*</sup></label>
                            <input type="email" class="form-control" id="" name="email" placeholder="Email.." autocomplete="off"/>
                    </div>    
                    <div class="form-row">
                        <label for="inputEmail4">Password <sup class="text-danger">*</sup></label>
                        <input type="password" class="form-control" id="" name="password" placeholder="Password.." autocomplete="off"/>
                    </div>                    
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
                {{ Form::close() }}
            </div>
            
    </div>
</div>
@endsection