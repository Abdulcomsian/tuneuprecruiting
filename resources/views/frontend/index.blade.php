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
                          
                            <div class="buy-block">
                                <div class="dropdown d-flex justify-content-between">
                                    <button class="px-3 py-2 bg-blue-500 text-white login-button" type="button"
                                        id="loginDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        Login
                                    </button>
                                    <div class="px-3 py-2 bg-blue-500 text-white angle_btn" id="loginDropdown"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </div>
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
                    <ul class="shape">
                        <!-- <li><img class="img-fluid" src="{{ asset('assets/images/landing/landing-home/shape-1.png') }}"
                                alt=""></li> -->
                        <li><img class="img-fluid" src="{{ asset('assets/images/landing/landing-home/shape-2.png') }}"
                                alt=""></li>
                        <li><img class="img-fluid" src="{{ asset('assets/images/landing/landing-home/shape-3.png') }}"
                                alt=""></li>
                    </ul>
                    <div class="row g-0 header-margin">
                        <h1 class="font-fraunces font-normal text-center fs-2 text-white  mb-3 mb-md-5">College Golf
                            <span class="text-blue underline">Recruitment</span> Agency</h1>
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

                                <h3 class="text-white font-fraunces fw-semibold mb-2 fs-4">Revolutionize Your
                                    Recruitment Process</h3>
                                <p class="font-nunito text-gray"> Our Mission: At RecruitU, we simplify college
                                    recruitment. Our
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
    <div class="bg-white py-5">
        <div class="container px-4">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0 img-container">
                    <img src="{{ asset('assets/images/girl.png') }}" alt="girl image" class="img-fluid img-responsive">
                </div>
                <div class="col-lg-1 d-none d-lg-block"></div>
                <div class="col-lg-6 col-md-6 ps-md-3">
                    <p class="font-fraunces font-normal text-3xl">
                        College <span class="text-blue text-decoration-underline">Golf Recruiting Agency</span> helps
                        <span class="text-gray">Student Athletes</span> achieve their
                        dreams of achieving an athletic scholarship to <span class="text-blue">play collegiate
                            golf</span>.
                    </p>
                    <ul class="list-style">
                        <li>A sincere and devoted approach, centered entirely on championing the athlete.</li>
                        <li>Run by experienced coaches and former Division 1 athletes.</li>
                        <li>A widespread network across major North American Universities, cultivating bonds with
                            coaches
                            across the athletic and educational landscapes.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!--Girls Section End-->
    <!--Revolutionized Section Starts-->
    <section class="bg-lightblue position-relative">
        <div class="background-image-div"></div>
        <div class="container py-10">
            <div class="row justify-content-end px-4 px-md-0">
                <div class="col-lg-5 mb-4 mb-md-0 px-4">
                    <h2 class="font-fraunces fs-2 font-normal mb-2">Revolutionize Your</h2>
                    <h3 class="text-blue font-fraunces fs-2 font-normal underline mb-3">
                        Recruitment
                        Process</h3>
                    <p class="font-nunito text-lg font-normal">At RecruitU, we simplify
                        college recruitment. Our mission? To connect coaches with the ideal athletes and vice versa.
                        With our technology, coaches can easily filter applications, sparing them from sifting through
                        countless submissions. As for aspiring athletes, forget about hunting down programs and filling
                        out multiple forms. With us, one click applies you to programs of your choice.</p>
                </div>

                <div class="col-lg-6  d-flex justify-content-center position-relative">
                    <div class="background-circle d-none d-lg-block"></div>
                    <div class="animat-block w-100 d-flex justify-content-center">
                        <figure class="cd-image-container is-visible">
                            <img src="{{ asset('assets/images/landing/landing-home/03.png') }}" alt="Original Image">
                            <span class="cd-image-label" data-type="original"> </span>
                            <div class="cd-resize-img" style="width: 56.353%;">
                                <img src="{{ asset('assets/images/landing/landing-home/02.png') }}"
                                    alt="Modified Image">
                                <span class="cd-image-label" data-type="modified"> </span>
                            </div>
                            <span class="cd-handle" style="left: 56.353%;"></span>
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
            <div class="row justify-content-center">
                <h2 class="font-fraunces text-center fw-normal text-4xl mb-2">Student Athlete Packages - <span
                        class="text-blue">Our Services</span></h2>
                <div class="col-lg-8 col-md-10 col-12 px-4 px-md-0">
                    <p class="text-darkGray text-center text-lg w-100 w-md-75 mx-auto">Lorem ipsum dolor sit amet
                        consectetur
                        adipisicing
                        elit. Magni cum enim itaque, velit eos voluptatem.</p>

                    <div class="d-flex justify-content-center align-items-center mb-3 mb-md-4">
                        <label for="flexSwitchCheckChecked"
                            class="fw-semibold text-lg mx-2 mb-0 text-lightBlack">Monthly</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch"
                                id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                        </div>
                        <label for="flexSwitchCheckChecked"
                            class="fw-semibold text-lg mx-2 mb-0 text-lightBlack">Annually</label>
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
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/dark-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack">Online Athlete Profile - Coaches View
                                            Each Profile</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/dark-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack">Personal Section</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/dark-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack">Athletic Section</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/dark-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack">Resume Upload</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/dark-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack">Highlight Video Upload</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/dark-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack">Ability to Apply for Programs on our
                                            platform</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/dark-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack">CGRA Contacting Coaches on your
                                            behalf</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/dark-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack">Access to College Golf Programs
                                            Information Page</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/dark-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack">College Recruitment Process Modeuls - 10
                                            Lessons</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/dark-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack">Essential Highlight</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/gray-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack text-decoration-line-through">Access to
                                            College Golf Coaches Contact Information Page</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/gray-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack text-decoration-line-through">Full Access
                                            to our platform</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/gray-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack text-decoration-line-through">30 Minute
                                            Zoom Consultation </span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/gray-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack text-decoration-line-through">Email
                                            Templates for College Coaches</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/gray-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack text-decoration-line-through">Resume
                                            Assistance</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/gray-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span
                                            class="text-sm text-lightBlack text-decoration-line-through">Professionally
                                            Edited Highlight Videos</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/gray-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack text-decoration-line-through">Live Chat
                                            Support</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/gray-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack text-decoration-line-through">Target list
                                            of programs that best fit your potential</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/gray-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-lightBlack text-decoration-line-through">Personal
                                            Coach for your Recrutiment Journey</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card bg-blue-700 px-3 py-4">
                                <h3 class="text-white fs-3 fw-bold text-center font-nunito">Exclusive</h3>
                                <p class="font-nunito text-base font-normal text-white text-center">The national
                                    average cost of buying coin easy.</p>
                                <p class="text-white font-nunito text-center"><span
                                        class="text-2xl fw-bold">$12</span><span class="text-base">/month</span></p>
                                <button
                                    class="bg-blue-500 rounded text-lightBlack border border-0 bg-white py-2 fw-bold mb-3 w-100">Select
                                    Plan</button>
                                <div
                                    class="d-flex justify-content-center border border-0 underline text-base fw-bold text-white mb-5 w-100">
                                    Why Choose Essential?</div>
                                <ul>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Online Athlete Profile - Coaches View
                                            Each Profile</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Personal Section</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Athletic Section</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Resume Upload</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Highlight Video Upload</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Ability to Apply for Programs on our
                                            platform</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">CGRA Contacting Coaches on your behalf</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Access to College Golf Programs Information
                                            Page</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">College Recruitment Process Modeuls - 10
                                            Lessons</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Essential Highlight</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Access to College Golf Coaches Contact
                                            Information Page</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Full Access to our platform</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">30 Minute Zoom Consultation </span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Email Templates for College Coaches</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Resume Assistance</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Professionally Edited Highlight Videos</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Live Chat Support</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Target list of programs that best fit your
                                            potential</span>
                                    </li>
                                    <li class="d-flex  align-items-center mb-3">
                                        <img src="{{ asset('assets/images/white-tick-icon.png') }}" alt=""
                                            class="me-2">
                                        <span class="text-sm text-white">Personal Coach for your Recrutiment
                                            Journey</span>
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
        <!-- <div class="d-flex flex-column align-items-center justify-content-center py-5"> -->
        <div class="row py-5 px-4">
            <div
                class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 mx-auto d-flex flex-column align-items-center justify-content-center">
                <img class="img-fluid img-90 mb-3" src="{{ asset('assets/images/white-logo.png') }}" alt="">
                <p class="text-white text-opacity-50 text-center font-nunito text-base mb-3">Lorem ipsum
                    dolor sit amet
                    consectetur adipisicing elit. Lorem ipsum
                    dolor sit amet</p>
                <h2 class="text-white text-center font-nunito fs-3">Subscribe to our Newsletter</h2>
                <p class="text-white text-opacity-50 text-center font-nunito text-base">Lorem ipsum dolor sit amet.
                </p>
                <form class="mb-4 w-100">
                    <div class="d-inline-flex w-100">
                        <input type="text" class="form-input-control" placeholder="Enter your mail">
                        <button class="form-input-btn fw-bold">Subscribe</button>
                    </div>
                </form>

                <div class="d-flex justify-content-between text-white social-icons">
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
            <!-- </div> -->
        </div>


        <div class="row text-gray px-5 py-3 footer-bottom text-center font-nunito text-lg">
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
