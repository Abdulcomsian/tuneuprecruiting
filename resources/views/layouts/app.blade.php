<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
        <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
        <title>Cion - Premium Admin Template</title>
        <!-- Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600;700;800;900&amp;family=Nunito+Sans:ital,opsz,wght@0,6..12,200;0,6..12,300;0,6..12,400;0,6..12,500;0,6..12,600;0,6..12,700;0,6..12,800;0,6..12,900;0,6..12,1000;1,6..12,200;1,6..12,300;1,6..12,400;1,6..12,500;1,6..12,600;1,6..12,700;1,6..12,800;1,6..12,900;1,6..12,1000&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">
        <!-- ico-font-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css') }}">
        <!-- Themify icon-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}">
        <!-- Flag icon-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css') }}">
        <!-- Feather icon-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">
        <!-- Plugins css start-->
        <link rel="icon" href="{{ asset('assets/svg/landing-icons.svg') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/swiper/swiper.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick-theme.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/scrollbar.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/chartist.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatable/select.dataTables.min.css') }}">
        <!-- Plugins css Ends-->
        <!-- Bootstrap css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
        <!-- App css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
        <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
        <!-- Responsive css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    </head>
    <body>
            <!-- Loader starts-->
            <div class="loader-wrapper">
                <div class="loader"></div>
            </div>
            <!-- Loader ends-->
            <!-- tap on top starts-->
            <div class="tap-top"><i data-feather="chevrons-up"></i></div>
            <!-- tap on tap ends-->
            <!-- page-wrapper Start-->
            <div class="page-wrapper null compact-sidebar compact-small material-icon" id="pageWrapper">
                <!-- Page Header Start-->
                @include('layouts.header')
                <!-- Page Header Ends-->
                <!-- Page Body Start-->
                <div class="page-body-wrapper">
                    <!-- Page Sidebar Start-->
                    @include('layouts.navigation')
                    <!-- Page Sidebar Ends-->

                    {{ $slot }}
                    <!-- footer start-->
                    @include('layouts.footer')
                </div>
            </div>
            <!-- latest jquery-->
            <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
            <!-- Bootstrap js-->
            <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
            <!-- feather icon js-->
            <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
            <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
            <!-- scrollbar js-->
            <script src="{{ asset('assets/js/scrollbar/simplebar.js') }}"></script>
            <script src="{{ asset('assets/js/scrollbar/custom.js') }}"></script>
            <!-- Sidebar jquery-->
            <script src="{{ asset('assets/js/config.js') }}"></script>
            <!-- Plugins JS start-->

            <script src="{{ asset('assets/js/swiper/swiper.js') }}"></script>
            <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
            <script src="{{ asset('assets/js/owlcarousel/owl-custom.js') }}"></script>

            <script src="{{ asset('assets/js/landing_sticky.js') }}"></script>
            <script src="{{ asset('assets/js/landing.js') }}"></script>
            <script src="{{ asset('assets/js/jarallax_libs/libs.min.js') }}"></script>

            <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
            <script src="{{ asset('assets/js/slick/slick.min.js') }}"></script>
            <script src="{{ asset('assets/js/slick/slick.js') }}"></script>
            <script src="{{ asset('assets/js/header-slick.js') }}"></script>
            <script src="{{ asset('assets/js/chart/chartist/chartist.js') }}"></script>
            <script src="{{ asset('assets/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
            <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
            <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
            <script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
            <script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
            <script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
            <script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>
            <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
            <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
            <script src="{{ asset('assets/js/datatable/datatables/dataTables.select.min.js') }}"></script>
            <script src="{{ asset('assets/js/dashboard/dashboard_2.js') }}"></script>
            <script src="{{ asset('assets/js/animation/wow/wow.min.js') }}"></script>
            <!-- Plugins JS Ends-->
            <!-- Theme js-->
            <script src="{{ asset('assets/js/script.js') }}"></script>
            <script src="{{ asset('assets/js/theme-customizer/customizer.js') }}"></script>
            <script src="{{ asset('assets/js/custom-js/chat.js') }}"></script>
            <script>new WOW().init();</script>
    </body>
</html>
