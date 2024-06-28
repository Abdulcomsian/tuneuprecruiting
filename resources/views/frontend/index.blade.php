<x-guest-layout>

    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <div class="page-wrapper">
        <!-- Page Body Start-->
        <!-- header start-->
        <header class="landing-header">
            <div class="container-fluid">
                <div class="row g-0">
                    <div class="col-12">
                        <nav class="navbar navbar-light p-0" id="navbar-example2">
                            <a class="navbar-brand" href="javascript:void(0)">
                                <img class="img-fluid img-90" src="{{ asset('assets/images/white-logo.png') }}"
                                    alt="">
                            </a>
                            <!-- {{--                            <ul class="landing-menu nav nav-pills"> --}}
                            {{--                                <li class="nav-item menu-back">back<i class="fa fa-angle-right"></i></li> --}}
                            {{--                                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li> --}}
                            {{--                                <li class="nav-item"><a class="nav-link" href="#demo">Layout</a></li> --}}
                            {{--                                <li class="nav-item"><a class="nav-link" href="#Applications">Applications</a></li> --}}
                            {{--                                <li class="nav-item"><a class="nav-link" href="#core-feature">Core Feature </a></li> --}}
                            {{--                                <li class="nav-item"><a class="nav-link" href="https://docs.pixelstrap.com/cion/document/" target="_blank">Documentation</a></li> --}}
                            {{--                                <li class="nav-item"><a class="nav-link" href="https://docs.google.com/forms/d/e/1FAIpQLSe6hKUXw_By-pg7yabL0FxoTM02ZPTxoXy8PE3yboRuUCuyeA/viewform" target="_blank">Hire us</a></li> --}}
                            {{--                            </ul> --}} -->
                            <div class="buy-block">
                                <div class="dropdown">
                                    <button class="login-btn dropdown-toggle" type="button"id="loginDropdown"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Login
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="loginDropdown">
                                        <li><a class="dropdown-item" href="{{ url('/login?user=student') }}">Student
                                                Login</a></li>
                                        <li><a class="dropdown-item" href="{{ url('/login?user=recruiter') }}">Recruiter
                                                Login</a></li>
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
            <img class="img-fluid bg-img-cover" src="{{ asset('assets/images/landing/landing-home/home-bg.jpg') }}"
                alt="">
            <div class="container">
                <div class="row g-0">
                    <!-- <ul class="shape">
                        <li><img class="img-fluid" src="{{ asset('assets/images/landing/landing-home/shape-1.png') }}"
                                alt=""></li>
                        <li><img class="img-fluid" src="{{ asset('assets/images/landing/landing-home/shape-2.png') }}"
                                alt=""></li>
                        <li><img class="img-fluid" src="{{ asset('assets/images/landing/landing-home/shape-3.png') }}"
                                alt=""></li>
                    </ul> -->
                    <div class="row g-0 header-margin">
                        <h1 class="font-fraunces text-center fs-2 text-white mb-5">College Golf <span class="text-blue underline">Recruitment</span> Agency</h1>
                        <div class="col-lg-6 responsive-header">
                            <figure class="cd-image-container"><img
                                    src="{{ asset('assets/images/landing/landing-home/03.png') }}"
                                    alt="Original Image"><span class="cd-image-label" data-type="original"> </span>
                                <div class="cd-resize-img"><img
                                        src="{{ asset('assets/images/landing/landing-home/02.png') }}"
                                        alt="Modified Image"><span class="cd-image-label" data-type="modified"> </span>
                                </div><span class="cd-handle"></span>
                            </figure>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center">
                            <div class="d-flex flex-column justify-content-center mx-auto px-4">

                                <h3 class="text-white font-fraunces fw-semibold mb-2 fs-4">Revolutionize Your Recruitment Process</h3>
                                <p class="font-nunito text-gray"> Our Mission: At RecruitU, we simplify college recruitment. Our
                                    mission? To connect
                                    coaches with the ideal athletes and vice versa. With our technology, coaches can
                                    easily filter applications, sparing them from sifting through countless submissions.
                                    As for aspiring athletes, forget about hunting down programs and filling out
                                    multiple forms. With us, one click applies you to programs of your choice.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- landing home end-->
        <!--Agency Info Section-->
    </div>
    <!--Girls Section Start-->
    <section class="container my-5 px-4">
        <div class="row align-items-center">
            <div class="col-md-4 mb-4 mb-md-0 img-container">
                <img src="{{ asset('assets/images/girl.png') }}" alt="girl image" class="img-fluid img-responsive">
            </div>
            <div class="col-md-1 d-none d-md-block"></div>
            <div class="col-md-6">
                <p class="font-fraunces fw-normal fs-2 text-wrap">College <span
                        class="text-blue text-decoration-underline">Golf
                        Recruiting Agency</span> helps <span class="text-gray">Student Athletes</span> achieve their
                    dreams of achieving an athletic scholarship to <span class="text-blue">play collegiate golf</span>.
                </p>
                <ul class="list-style">
                    <li>A sincere and devoted approach, centered entirely on championing the athlete.</li>
                    <li>Run by experienced coaches and former Division 1 athletes.</li>
                    <li>A widespread network across major North American Universities, cultivating bonds with coaches
                        across the athletic and educational landscapes.</li>
                </ul>
            </div>
        </div>
    </section>
    <!--Girls Section End-->
    <!--Revolutionized Section Starts-->
    <section class="bg-lightblue">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h2 class="font-fraunces fs-2 mb-2 text-align-center-md-left">Revolutionize Your</h2>
                    <h3 class="text-blue font-fraunces fs-2 underline mb-2 text-align-center-md-left">Recruitment
                        Process</h3>
                    <p class="font-nunito text-lg font-normal text-align-center-md-left">At RecruitU, we simplify
                        college recruitment. Our mission? To connect coaches with the ideal athletes and vice versa.
                        With our technology, coaches can easily filter applications, sparing them from sifting through
                        countless submissions. As for aspiring athletes, forget about hunting down programs and filling
                        out multiple forms. With us, one click applies you to programs of your choice.</p>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="animat-block">
                        <figure class="cd-image-container is-visible"><img
                                src="http://127.0.0.1:8000/assets/images/landing/landing-home/03.png"
                                alt="Original Image"><span class="cd-image-label" data-type="original"> </span>
                            <div class="cd-resize-img" style="width: 56.353%;"><img
                                    src="http://127.0.0.1:8000/assets/images/landing/landing-home/02.png"
                                    alt="Modified Image"><span class="cd-image-label" data-type="modified"> </span>
                            </div><span class="cd-handle" style="left: 56.353%;"></span>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Revolutionized Section Ends-->
    <!--Athelete Package Section Starts-->
    <div class="bg-white py-5">
        <section class="container">
            <div class="row justify-content-center px-4">
                <div class="col-lg-8 col-md-10 col-12">
                    <h2 class="font-fraunces text-center fw-normal fs-2 mb-2">Student Athlete Packages - <span
                            class="text-blue">Our Services</span></h2>
                    <p class="text-darkGray text-center text-lg">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Magni cum enim itaque, velit eos voluptatem.</p>

                    <div class="d-flex justify-content-center align-items-center mb-4">
                        <label for="flexSwitchCheckChecked" class="fw-semibold me-2 text-lightBlack">Monthly</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch"
                                id="flexSwitchCheckChecked" checked>
                        </div>
                        <label for="flexSwitchCheckChecked" class="fw-semibold text-lightBlack">Annually</label>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card bg-lightblue px-3 py-4">
                                <h3 class="text-dark-indigo fs-3 fw-bold text-center font-nunito">Essential</h3>
                                <p class="font-nunito text-base font-normal text-lightGray text-center">The national
                                    average cost of buying coin easy.</p>
                                <p class="text-dark-indigo font-nunito text-center"><span
                                        class="text-2xl fw-bold">$5</span><span class="text-base">/month</span></p>
                                <button
                                    class="bg-blue-500 rounded border border-0 text-white py-2 fw-bold mb-3 w-100">Select
                                    Plan</button>
                                <button class="text-blue border border-0 underline text-base fw-bold mb-5 w-100">Why
                                    Choose Essential?</button>
                                <ul>
                                    <li class="d-flex  align-items-center mb-2">
                                        <img src="{{ asset('assets/images/dark-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack">Online Athlete Profile - Coaches View
                                            Each Profile</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-2">
                                        <img src="{{ asset('assets/images/dark-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack">Online Athlete Profile - Coaches View
                                            Each Profile</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-2">
                                        <img src="{{ asset('assets/images/dark-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack">Online Athlete Profile - Coaches View
                                            Each Profile</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-2">
                                        <img src="{{ asset('assets/images/dark-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack">Online Athlete Profile - Coaches View
                                            Each Profile</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-2">
                                        <img src="{{ asset('assets/images/gray-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack text-decoration-line-through">Online
                                            Athlete Profile - Coaches View Each Profile</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-2">
                                        <img src="{{ asset('assets/images/gray-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack text-decoration-line-through">Online
                                            Athlete Profile - Coaches View Each Profile</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-2">
                                        <img src="{{ asset('assets/images/gray-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack text-decoration-line-through">Online
                                            Athlete Profile - Coaches View Each Profile</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-2">
                                        <img src="{{ asset('assets/images/gray-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack text-decoration-line-through">Online
                                            Athlete Profile - Coaches View Each Profile</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card bg-blue-700 px-3 py-4">
                                <h3 class="text-white fs-3 fw-bold text-center font-nunito">Essential</h3>
                                <p class="font-nunito text-base font-normal text-white text-center">The national
                                    average cost of buying coin easy.</p>
                                <p class="text-white font-nunito text-center"><span
                                        class="text-2xl fw-bold">$5</span><span class="text-base">/month</span></p>
                                <button
                                    class="bg-blue-500 rounded text-lightBlack border border-0 bg-white py-2 fw-bold mb-3 w-100">Select
                                    Plan</button>
                                <div
                                    class="d-flex justify-content-center border border-0 underline text-base fw-bold text-white mb-5 w-100">
                                    Why Choose Essential?</div>
                                <ul>
                                    <li class="d-flex  align-items-center mb-2">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Online Athlete Profile - Coaches View Each
                                            Profile</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-2">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Online Athlete Profile - Coaches View Each
                                            Profile</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-2">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Online Athlete Profile - Coaches View Each
                                            Profile</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-2">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Online Athlete Profile - Coaches View Each
                                            Profile</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-2">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Online Athlete Profile - Coaches View Each
                                            Profile</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-2">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Online Athlete Profile - Coaches View Each
                                            Profile</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-2">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Online Athlete Profile - Coaches View Each
                                            Profile</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-2">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Online Athlete Profile - Coaches View Each
                                            Profile</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--Athelete Package Section Starts-->
    <!--Footer Starts-->
    <div class="bg-black-700">
        <div class="container d-flex flex-column align-items-center justify-content-center py-5">
            <div class="row">
                <div class="col-lg-6 mx-auto d-flex flex-column align-items-center justify-content-center">
                <img class="img-fluid img-90 mb-2" src="{{ asset('assets/images/white-logo.png') }}"
                alt="" >
                    <p class="text-white text-opacity-50 text-center font-nunito text-base w-100 mb-3">Lorem ipsum
                        dolor sit amet
                        consectetur adipisicing elit. Ex facilis accusamus architecto iusto ad temporibus.</p>
                    <h2 class="text-white text-center font-nunito fs-3">Subscribe to our Newsletter</h2>
                    <p class="text-white text-opacity-50 text-center font-nunito text-base">Lorem ipsum dolor sit amet.
                    </p>
                    <form class="mb-4 w-100">
                        <div class="d-inline-flex w-100">
                            <input type="text" class="form-input-control" placeholder="Enter your mail">
                            <button class="form-input-btn">Subscribe</button>
                        </div>
                    </form>

                    <div class="d-flex justify-content-between text-white w-100">
                        <div class="font-fraunces text-lg fw-bold">Facebook</div>
                        <div class="font-fraunces text-lg fw-bold">Instagram</div>
                        <div class="d-flex align-items-center">
                            <div class="youtube-icon">
                                <svg width="100%" height="100%" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="24" height="24" rx="4" fill="white" />
                                    <polygon points="10,8 16,12 10,16" fill="black" />
                                </svg>
                            </div>
                            <span class="ms-1 font-fraunces text-lg fw-bold">YouTube</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row text-gray px-5 py-3 footer-bottom font-nunito text-lg">
            <div class="col-md-6 d-flex justify-content-md-start justify-content-center mb-2 mb-md-0">
                ©Tuneup 2024. All rights reserved.
            </div>
            <div class="col-md-6 d-flex flex-column flex-md-row justify-content-md-end align-items-center">
                <div class="mb-2 mb-md-0 me-md-3">Privacy Policy</div>
                <div>Terms of Conditions</div>
            </div>
        </div>
    </div>
    <!--Footer Ends-->
</x-guest-layout>
