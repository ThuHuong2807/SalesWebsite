<!DOCTYPE html>
<html lang="en">

    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        {{--  <meta http-equiv="refresh" content="30">  --}}
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="{{asset('')}}">
        <meta name="author" content="Truongminh.xyz">
@if(isset($meta))
    @foreach ($meta as $item)
    {!! $item->product_meta_name !!}
    @endforeach
@else
        <meta name="description" content="Website thời trang nam và nữ giá tốt,áo sơ mi công sở,váy,váy công sở,quần công sở,áo sơ mi,shop quần áo nam 2019,shop quần áo nữ 2019">
        <meta name="keywords" content="thời trang nam và nữ giá tốt,váy nữ,quần jean,quần công sở,váy công sở,áo sơ mi,quần áo nam 2019,quần áo nữ 2019">
        <meta name="revised" content="truongminh.xyz, 2019" />
@endif
        <!-- Facebook and Twitter integration -->
        <meta property="og:title" content="" />
        <meta property="og:image" content="" />
        <meta property="og:url" content="" />
        <meta property="og:site_name" content="" />
        <meta property="og:description" content="" />
        <meta name="twitter:title" content="" />
        <meta name="twitter:image" content="" />
        <meta name="twitter:url" content="" />
        <meta name="twitter:card" content="" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

        <!-- Animate.css -->
        <link rel="stylesheet" href="public/frontend/css/animate.css">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="public/frontend/css/icomoon.css">
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="public/frontend/css/bootstrap.css">

        <!-- Magnific Popup -->
        <link rel="stylesheet" href="public/frontend/css/magnific-popup.css">

        <!-- Flexslider  -->
        <link rel="stylesheet" href="public/frontend/css/flexslider.css">

        <!-- Owl Carousel -->
        <link rel="stylesheet" href="public/frontend/css/owl.carousel.min.css">
        <link rel="stylesheet" href="public/frontend/css/owl.theme.default.min.css">

        <!-- Date Picker -->
        <link rel="stylesheet" href="public/frontend/css/bootstrap-datepicker.css">
        <!-- Flaticons  -->
        <link rel="stylesheet" href="public/frontend/fonts/flaticon/font/flaticon.css">

        <!-- Theme style  -->
        <link rel="stylesheet" href="public/frontend/css/custome.css">
        <link rel="stylesheet" href="public/frontend/css/style.css">

        <!-- Modernizr JS -->
        <script src="public/frontend/public/frontend/js/modernizr-2.6.2.min.js"></script>
        <!-- FOR IE9 below -->
        <!--[if lt IE 9]>
	        <script src="js/respond.min.js"></script>
	    <![endif]-->
    </head>

    <body>

    @if (session('thongbao'))
        <script>
            alert("{{ session('thongbao') }}");
        </script>
    @endif
        <div class="colorlib-loader">
        </div>

        <div id="page">
            {{-- header --}}
            @include('frontend.master.header')
            @yield('content')
            {{-- footer --}}
            @include('frontend.master.footer')

        </div>
        <div class="gototop js-top">
            <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
        </div>
        @section('script')
        <!-- jQuery -->
        <script src="public/frontend/js/jquery.min.js"></script>
        <!-- jQuery Easing -->
        <script src="public/frontend/js/jquery.easing.1.3.js"></script>
        <!-- Bootstrap -->
        <script src="public/frontend/js/bootstrap.min.js"></script>
        <!-- Waypoints -->
        <script src="public/frontend/js/jquery.waypoints.min.js"></script>
        <!-- Flexslider -->
        <script src="public/frontend/js/jquery.flexslider-min.js"></script>
        <!-- Owl carousel -->
        <script src="public/frontend/js/owl.carousel.min.js"></script>
        <!-- Magnific Popup -->
        <script src="public/frontend/js/jquery.magnific-popup.min.js"></script>
        <script src="public/frontend/js/magnific-popup-options.js"></script>
        <!-- Date Picker -->
        <script src="public/frontend/js/bootstrap-datepicker.js"></script>
        <!-- Stellar Parallax -->
        <script src="public/frontend/js/jquery.stellar.min.js"></script>
        <!-- Main -->
        <script src="public/frontend/js/main.js"></script>
        <!-- Google Map -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
        <script src="js/google_map.js"></script>
    
        @show
        @yield('script_detail')
        @yield('script_cart')

    </body>

</html>