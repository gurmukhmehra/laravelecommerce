<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{globalSetting('siteName')}} : Admin Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Codedthemes" />
	<link rel="icon" href="{{ asset('Backend/assets/images/favicon.ico') }}" type="image/x-icon">
	<link rel="stylesheet" href="{{ asset('Backend/assets/css/style.css') }}">
</head>
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body" style="padding:20px 2px;">
						<h4 class="mb-3 f-w-400">Welcome Back, Admin</h4>
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
						{{ Form::open(array('url' => 'admin')) }}
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="feather icon-mail"></i></span>
								</div>
								<input type="text" name="EmailUsername" value="" class="form-control" placeholder="Email/Username">
							</div>
							<div class="input-group mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="feather icon-lock"></i></span>
								</div>
								<input type="password" name="password" class="form-control" placeholder="Password">
							</div>						
							<button type="submit" class="btn btn-block btn-primary mb-4">Sign in</button>
							<a href="{{URL::to('/')}}" class="btn btn-block btn-info mb-4 text-white">Back To Site</a>
						{{ Form::close() }}
						<p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html" class="f-w-400">Reset</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('Backend/assets/js/vendor-all.min.js') }}"></script>
<script src="{{ asset('Backend/assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('Backend/assets/js/waves.min.js') }}"></script>
</body>
</html>
