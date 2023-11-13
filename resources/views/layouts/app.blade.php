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

        <!-- latest jquery-->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <!-- Bootstrap js-->
        <script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
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
            <script src="{{ asset('assets/js/height-equal.js') }}"></script>
            <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
            <script src="{{ asset('assets/js/modalpage/validation-modal.js') }}"></script>

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

            <script>
                function makeAjaxCall() {
                    $.ajax({
                        url: '/notification/messages',
                        method: 'GET',
                        success: function(response) {
                            var ul = $('#message-notification'); // Assuming you have only one ul, adjust this selector as needed

                            // Clear the existing content in the ul
                            ul.empty();

                            response.forEach(function(message) {
                                var li = $('<li>').attr('data-id', message.id)
                                    .attr('data-coach', message.coach_id)
                                    .attr('class', 'li-notification')
                                    .attr('data-student', message.student_id);
                                var div = $('<div class="d-flex align-items-start">');

                                var imgSrc = 'uploads/common/'+message.profile_image; // Use profile image if available, else a default

                                var img = $('<img>').attr('src', imgSrc).attr('alt', 'User Image');
                                var imgDiv = $('<div class="message-img bg-light-primary">').append(img);

                                var flexDiv = $('<div class="flex-grow-1">');
                                var h5 = $('<h5 class="mb-1">').html('<a>' + message.first_name + '</a>');
                                var p = $('<p>').text(message.message);
                                var notificationRight = $('<div class="notification-right">').html('<i data-feather="x"></i>');

                                // Append all elements to the li
                                flexDiv.append(h5, p);
                                div.append(imgDiv, flexDiv, notificationRight);
                                li.append(div);

                                // Append the created li to the ul
                                ul.append(li);
                            });

                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX call error: ' + error);
                        }
                    });
                }

                makeAjaxCall();

                // Set an interval to call the function every minute (60,000 milliseconds)
                setInterval(makeAjaxCall, 60000);

                $(document).on('click', '.li-notification', function() {
                    const id = $(this).data('id');
                    const coachId = $(this).data('coach');
                    const studentId = $(this).data('student');
                    console.log(id, coachId, studentId);
                    const userType = $('#user-type').val();

                    if (userType == 'coach') {
                        var url = '/chat/' + studentId + '/' + userType + '/' + id;
                    } else {
                        var url = '/chat/' + coachId + '/' + userType + '/' + id;
                    }

                    window.location.href = url;
                });

            </script>
    </body>
</html>
