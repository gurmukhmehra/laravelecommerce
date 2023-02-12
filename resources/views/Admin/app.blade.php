<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{globalSetting('siteName')}}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Codedthemes" />
	<link rel="icon" href="{{ asset('Backend/assets/images/favicon.ico') }}" type="image/x-icon">
	<link rel="stylesheet" href="{{ asset('Backend/assets/css/style.css') }}">
    <style>
        #cke_description, #cke_CategoryDescription {
            width: 100%;
        }
    </style>
</head>
    <body class="">
        <!-- [ Pre-loader ] start -->
        <div class="loader-bg">
            <div class="loader-track">
                <div class="loader-fill"></div>
            </div>
        </div>               
        @include('Admin.sidebar')        
        @include('Admin.header')    
        <div class="pcoded-main-container">
            <div class="pcoded-content">
                @yield('content')
            </div>
        </div>
        @yield('footer-scripts')
<script src="{{ asset('Backend/assets/js/vendor-all.min.js') }}"></script>
<script src="{{ asset('Backend/assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('Backend/assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('Backend/assets/js/plugins/apexcharts.min.js') }}"></script>
<script src="{{ asset('Backend/assets/js/pages/dashboard-main.js') }}"></script>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('.ckeditor').ckeditor();           
        });
       
    </script>    
</body>
</html>