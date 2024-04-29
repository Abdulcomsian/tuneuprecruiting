<x-guest-layout>

    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <div class="page-wrapper">
        <!-- Page Body Start-->
        <!-- header start-->
        <header class="landing-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar navbar-light p-0" id="navbar-example2">
                            <a class="navbar-brand" href="javascript:void(0)">
                                <img class="img-fluid img-90" src="{{ asset('assets/images/logo/logo-1.png') }}" alt="">
                            </a>
{{--                            <ul class="landing-menu nav nav-pills">--}}
{{--                                <li class="nav-item menu-back">back<i class="fa fa-angle-right"></i></li>--}}
{{--                                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>--}}
{{--                                <li class="nav-item"><a class="nav-link" href="#demo">Layout</a></li>--}}
{{--                                <li class="nav-item"><a class="nav-link" href="#Applications">Applications</a></li>--}}
{{--                                <li class="nav-item"><a class="nav-link" href="#core-feature">Core Feature </a></li>--}}
{{--                                <li class="nav-item"><a class="nav-link" href="https://docs.pixelstrap.com/cion/document/" target="_blank">Documentation</a></li>--}}
{{--                                <li class="nav-item"><a class="nav-link" href="https://docs.google.com/forms/d/e/1FAIpQLSe6hKUXw_By-pg7yabL0FxoTM02ZPTxoXy8PE3yboRuUCuyeA/viewform" target="_blank">Hire us</a></li>--}}
{{--                            </ul>--}}
                            <div class="buy-block">
                                <div class="dropdown">
                                    <button class="btn-landing btn-white dropdown-toggle" type="button" id="loginDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        Login
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="loginDropdown">
                                        <li><a class="dropdown-item" href="{{ url('/login?user=student') }}">Student Login</a></li>
                                        <li><a class="dropdown-item" href="{{ url('/login?user=recruiter') }}">Recruiter Login</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- header end-->
        <!-- landing home start-->
        <section class="landing-home" id="home">
            <img class="img-fluid bg-img-cover" src="{{ asset('assets/images/landing/landing-home/home-bg.jpg') }}" alt="">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <ul class="shape">
                        <li><img class="img-fluid" src="{{ asset('assets/images/landing/landing-home/shape-1.png') }}" alt=""></li>
                        <li><img class="img-fluid" src="{{ asset('assets/images/landing/landing-home/shape-2.png') }}" alt=""></li>
                        <li><img class="img-fluid" src="{{ asset('assets/images/landing/landing-home/shape-3.png') }}" alt=""></li>
                    </ul>
                    <div class="col-lg-7 animat-block">
                        <figure class="cd-image-container"><img src="{{ asset('assets/images/landing/landing-home/03.png') }}" alt="Original Image"><span class="cd-image-label" data-type="original"> </span>
                            <div class="cd-resize-img"><img src="{{ asset('assets/images/landing/landing-home/02.png') }}" alt="Modified Image"><span class="cd-image-label" data-type="modified"> </span></div><span class="cd-handle"></span>
                        </figure>
                    </div>
                    <div class="col-lg-5">
                        <div class="landing-home-contain">
                            <div>
                                <h3 class="text-white">Revolutionize Your Recruitment Process</h3>
                                <p> Our Mission: At RecruitU, we simplify college recruitment. Our mission? To connect coaches with the ideal athletes and vice versa. With our technology, coaches can easily filter applications, sparing them from sifting through countless submissions. As for aspiring athletes, forget about hunting down programs and filling out multiple forms. With us, one click applies you to programs of your choice.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- landing home end-->
    </div>
</x-guest-layout>
