<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Theme Region">
    <meta name="description" content="">
    <title>{{globalSetting('siteName')}}</title>
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/structure.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="icon" href="{{ asset('front/images/ico/favicon.ico') }}">
  </head>
  <body>
        @include('Frontend.header')
        @yield('content')
        @include('Frontend.footer')
        @yield('footer-scripts')
    <script src="{{ asset('front/js/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('front/js/popper.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/js/slick.min.js') }}" type="c2fadc13a7aa5b2c6ae40964-text/javascript"></script>
    <script src="{{ asset('front/js/jquery-ui-min.js') }}" type="c2fadc13a7aa5b2c6ae40964-text/javascript"></script>
    <script src="{{ asset('front/js/jquery.spinner.min.js') }}" type="c2fadc13a7aa5b2c6ae40964-text/javascript"></script>
    <script src="{{ asset('front/js/main.js') }}" type="c2fadc13a7aa5b2c6ae40964-text/javascript"></script>
    <script type="c2fadc13a7aa5b2c6ae40964-text/javascript">
      (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
          (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
          m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
      })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
      ga('create', 'UA-73239902-1', 'auto');
      ga('send', 'pageview');
    </script>
    <script src="{{ asset('custom/js/jquery.min.js') }}"></script>
	<script>
		$(document).ready(function() {
      $('.count').prop('disabled', true);
      $(document).on('click','.plus',function() {
        $('.count').val(parseInt($('.count').val()) + 1 );
      });

      $(document).on('click','.minus',function() {
        $('.count').val(parseInt($('.count').val()) - 1 );
        if ($('.count').val() == 0) {
          $('.count').val(1);
        }
      });

      $(document).on('click', ".remove-icon", function() {
        $.ajax({
            type: 'get',
            datatype: 'json',
            url: "{{ URL::to('remove-cart-item',) }}/" + $(this).parents('.remove-item').data('proid'),
            //data: 'productID='+ $(this).data('proid') ,
            beforeSend: function () {              
            },
            success: function (response) {
              const productID = $('[name="productID"]')
              $("#headerCart").html(response);
                if($(response).find(`.remove-item[ data-proid="${ productID.val() }"]`).length == 0) {
                  $('.buttonContainer').html('<button type="submit" class="btn btn-primary addtocart" >Add to Cart </button>')
                }
            },
            complete: function () {              
            }
        });
        
      });
 		});
	</script>
  
  </body>
</html>