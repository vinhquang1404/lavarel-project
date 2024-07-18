<!DOCTYPE html>
<html dir="ltr" lang="zxx">

<!-- Mirrored from uomo-html.flexkitux.com/Demo17/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Apr 2024 04:32:07 GMT -->

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="flexkit">

    <link rel="shortcut icon" href="https://uomo-html.flexkitux.com/images/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&amp;family=Open+Sans:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/plugins/swiper.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/assets/css/style.css') }}" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/lodash/lodash.min.js"></script>
    <!-- Document Title -->
    <title>@yield('title')</title>

</head>

<body>
    @include('client.layouts.symbol')

    @include('client.layouts.head')
    @yield('content')
    @include('client.layouts.main')

    @include('client.layouts.foot')



    <!-- Go To Top -->
    <div id="scrollTop" class="visually-hidden end-0"></div>

    <!-- Page Overlay -->
    <div class="page-overlay"></div><!-- /.page-overlay -->


    <!-- External JavaScripts -->
    <script src="{{ asset('client/assets/js/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/plugins/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/plugins/bootstrap-slider.min.js') }}"></script>

    <script src="{{ asset('client/assets/js/plugins/swiper.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/plugins/countdown.js') }}"></script>

    <!-- Footer Scripts -->
    <script src="{{ asset('client/assets/js/theme.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</body>

<!-- Mirrored from uomo-html.flexkitux.com/Demo17/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Apr 2024 04:32:47 GMT -->

</html>
