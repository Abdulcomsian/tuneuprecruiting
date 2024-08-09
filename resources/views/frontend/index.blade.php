<x-guest-layout>
    <style>
        .card {
            border-radius: 4px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
            transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
            padding: 14px 36px;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
        }

        .card-content {
            flex: 1;
        }

        .card h3 {
            margin-bottom: 1rem;
        }

        .card p {
            margin-bottom: 0;
        }

        .card img {
            position: absolute;
            top: 20px;
            right: 15px;
            max-height: 120px;
        }

        .custom-hr {
            width: 15%;
            background: black;
            margin-top: 27px;
            border-radius: 1px;
            height: 2px;
            border: none;
            margin-left: auto;
            margin-right: auto;
        }

        @media(max-width: 990px) {
            .card {
                margin: 20px 0;
            }
        }

        .list-styles {
            list-style-type: disc;
            padding-left: 20px;
        }

        .text-black {
            color: #000;
        }
    </style>
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
                            <!-- {{-- <ul class="landing-menu nav nav-pills"> --}}
                            {{-- <li class="nav-item menu-back">back<i class="fa fa-angle-right"></i></li> --}}
                            {{-- <li class="nav-item"><a class="nav-link" href="#home">Home</a></li> --}}
                            {{-- <li class="nav-item"><a class="nav-link" href="#demo">Layout</a></li> --}}
                            {{-- <li class="nav-item"><a class="nav-link" href="#Applications">Applications</a></li> --}}
                            {{-- <li class="nav-item"><a class="nav-link" href="#core-feature">Core Feature </a></li> --}}
                            {{-- <li class="nav-item"><a class="nav-link" href="https://docs.pixelstrap.com/cion/document/" target="_blank">Documentation</a></li> --}}
                            {{-- <li class="nav-item"><a class="nav-link" href="https://docs.google.com/forms/d/e/1FAIpQLSe6hKUXw_By-pg7yabL0FxoTM02ZPTxoXy8PE3yboRuUCuyeA/viewform" target="_blank">Hire us</a></li> --}}
                            {{-- </ul> --}} -->
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
                        {{-- <!-- <li><img class="img-fluid" src="{{ asset('assets/images/landing/landing-home/shape-1.png') }}"
                                alt=""></li> --> --}}
                        <li><img class="img-fluid" src="{{ asset('assets/images/landing/landing-home/shape-2.png') }}"
                                alt=""></li>
                        <li><img class="img-fluid" src="{{ asset('assets/images/landing/landing-home/shape-3.png') }}"
                                alt=""></li>
                    </ul>
                    <div class="row g-0 header-margin">
                        <h1 class="font-fraunces font-normal text-center fs-2 text-white mb-5">College Golf <span
                                class="text-blue underline">Recruitment</span> Portal</h1>
                        <div class="col-lg-6 responsive-header">
                            <div class="d-flex flex-column justify-content-center mx-auto px-4">
                                <p class="text-white mb-2" style="font-weight: 600;">Get Started with CGRP
                                </p>
                                <h1 class="font-nunito text-white">Technology to Streamline <br> your Recruitment <br>
                                    Journey
                                </h1>
                                <p class="font-nunito text-white mt-3">Trusted by college golf programs – CGRP connects
                                    college coaches with aspiring collegiate athletes.</p>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center">

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
        <section class="container bg-white px-4">
            <div class="row align-items-center">
                <div class="col-md-5 mb-4 mb-md-0 img-container">
                    <img src="{{ asset('assets/images/girl.png') }}" alt="girl image" class="img-fluid img-responsive">
                </div>
                <div class="col-md-1 d-none d-md-block"></div>
                <div class="col-md-6">
                    <p class="text-black font-fraunces font-normal fs-md-5">
                        <span class="text-blue underline">Aspiring Collegiate Golfers</span>
                    </p>
                    <p class="text-black font-fraunces font-normal fs-md-2">
                        Revolutionize your recruiting journey with CGRP! No more chasing down programs or drowning in
                        research and emails. With a single click, apply to your preferred programs hassle-free. Our
                        advanced technology simplifies the entire process, guiding you through each stage: Our
                        technology provides you with the following:
                    </p>
                    <ul class="list-styles">
                        <li class="text-black">Our dedicated team proactively promotes your profile to college golf
                            programs bi-monthly, ensuring maximum exposure and interest.</li>
                        <li class="text-black">View information on college golf programs</li>
                        <li class="text-black">Easily apply for college golf programs</li>
                        <li class="text-black">Have access to our 12 step recruitment videos and documents.</li>
                        <li class="text-black">Access to all Division 1, Division 2, Division 3, NAIA, Junior Colleges
                            coaches name and email list.</li>
                        <li class="text-black">Easily communicate with college coaches in our portal.</li>
                        <li class="text-black">With our exclusive platform, you receive assistance from one of our
                            experts to help you each step of the way.</li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
    
    <!--Girls Section End-->
    <!--Revolutionized Section Starts-->
    <section class="bg-lightblue">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0 px-4"> 
                    <h2 class="font-fraunces fs-2 font-normal mb-2 text-align-center-md-left">Revolutionize Your</h2>
                    <h3 class="text-blue font-fraunces fs-2 font-normal underline mb-3 text-align-center-md-left">
                        Recruitment
                        Process</h3>
                    <p class="font-nunito text-lg font-normal text-black">CGRP offers college golf coaches a
                        comprehensive portal
                        to discover and evaluate aspiring collegiate golfers. Our cutting-edge technology empowers
                        coaches with advanced search filters to pinpoint athletes who perfectly align with your
                        program's needs. By centralizing the entire recruitment process within our platform, we ensure
                        seamless organization and efficiency for coaches.</p>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="animat-block">
                        {{-- <figure class="cd-image-container is-visible"><img
                                src="{{ asset('assets/images/landing/landing-home/03.png') }}"
                                alt="Original Image"><span class="cd-image-label" data-type="original"> </span>
                            <div class="cd-resize-img" style="width: 56.353%;"><img
                                    src="{{ asset('assets/images/landing/landing-home/02.png') }}"
                                    alt="Modified Image"><span class="cd-image-label" data-type="modified"> </span>
                            </div><span class="cd-handle" style="left: 56.353%;"></span>
                        </figure> --}}
                        <img src="{{ asset('assets/images/landing/landing-home/06.png') }}" alt="Original Image"
                            width="100%;" height="300px;">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--Revolutionized Section Ends-->
    <!--Athelete Package Section Starts-->
    <div class="bg-white py-5">
        <section class="container">

            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="card bg-blue-700 px-3 py-4">
                        <div class="card-content">
                            <h3 class="text-white fw-bold text-center font-nunito">Online Athlete Profile</h3>
                            <p class="font-nunito text-base font-normal text-white text-center mt-2">Our athletes
                                enter their personal information, athletic information and academic information to
                                allow college coaches to review their potential.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-blue-700 px-3 py-4">
                        <div class="card-content">
                            <h3 class="text-white fw-bold text-center font-nunito">College Coaches Information Page
                            </h3>
                            <p class="font-nunito text-base font-normal text-white text-center mt-2">Contacting
                                college coaches directly can be a pain, especially when you need to locate over 900
                                emails.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-blue-700 px-3 py-4">
                        <div class="card-content">
                            <h3 class="text-white fw-bold text-center font-nunito">CGRA Notifying All College
                                Coaches</h3>
                            <p class="font-nunito text-base font-normal text-white text-center mt-2">Our staff will
                                be reaching out 2-3 times per month, notifying all college golf coaches about your
                                profile to begin conversation with you.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-blue-700 px-3 py-4">
                        <div class="card-content">
                            <h3 class="text-white fw-bold text-center font-nunito">Coaches Interests</h3>
                            <p class="font-nunito text-base font-normal text-white text-center mt-2">We send your
                                profile to all coaches and when coaches want to connect with you, they will connect
                                with you through CGRA.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-3 mb-3">
                    <div class="card bg-blue-700 px-3 py-4 d-flex align-items-stretch">
                        <div class="card-content">
                            <h3 class="text-white fw-bold text-center font-nunito">College Recruitment Modules</h3>
                            <p class="font-nunito text-base font-normal text-white text-center mt-2">Our team provides
                                step by step instructional video modules for the 12 most important steps to the college
                                recruitment process.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-blue-700 px-3 py-4 d-flex align-items-stretch">
                        <div class="card-content">
                            <h3 class="text-white fw-bold text-center font-nunito">Resume Upload</h3>
                            <p class="font-nunito text-base font-normal text-white text-center mt-2">Athletes will
                                upload their athletic resume to their profile. <b>When updates are made to the resume,
                                    coaches are notified.</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card bg-blue-700 px-3 py-4 d-flex align-items-stretch">
                        <div class="card-content">
                            <h3 class="text-white fw-bold text-center font-nunito">Highlight Video Upload</h3>
                            <p class="font-nunito text-base font-normal text-white text-center mt-2">Athletes will
                                upload their highlights for coaches to view and review.</p>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="custom-hr">
            <div class="row justify-content-center px-4 mt-4">
                <div class="col-lg-8 col-md-10 col-12">
                    <p class="text-darkGray text-center text-lg w-100 w-md-75 mx-auto">Lorem ipsum dolor sit amet
                        consectetur
                        adipisicing
                        elit. Magni cum enim itaque, velit eos voluptatem.</p>

                    <div class="d-flex justify-content-center align-items-center mb-2 mb-md-4">
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
                                {{-- <ul>
                                    <li class="d-flex  align-items-center mb-2">
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
                                </ul> --}}
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
                                {{-- <ul>
                                    <li class="d-flex  align-items-center mb-2">
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
                                </ul> --}}
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
            <div class="col-lg-4 mx-auto d-flex flex-column align-items-center justify-content-center">
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
