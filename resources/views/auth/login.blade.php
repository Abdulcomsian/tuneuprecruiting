<x-guest-layout>
    <div class="container-fluid">
        <div class="row">
            @if($userType == 'student' || $userType == 'recruiter')
                <div class="col-xl-7" style="background: url('{{ asset('assets/images/login/login_bg.jpg') }}');">
                    <div class=" h-100 d-flex justify-content-center align-items-center">
                        <div class="container">
                            @if($userType == 'student')
                                <h2 class="f-w-700 mb-4">Prospective Student Athletes</h2>
                                <p class="f-w-400">
                                    Becoming a prospective student athlete mirrors the demands of a full-time occupation. Balancing academics, rigorous training sessions, and constant preparation for athletic competitions becomes a daily routine. Amidst this whirlwind, navigating the recruitment journey adds another layer of complexity. The quest to find the perfect college fit demands hours of sifting through various program websites and completing countless questionnaires.
                                </p>

                                <p class="f-w-400">
                                    Enter RecruitU-a game-changer in simplifying this daunting process. By consolidating your personal, academic, and athletic information into a comprehensive profile, RecruitU revolutionizes how you engage with potential college programs. With just a few clicks, you can explore diverse programs, delve into their offerings, and seamlessly apply. RecruitU empowers you to streamline your journey, ensuring you find the ideal fit for your next chapter both academically and athletically.
                                </p>
                            @elseif($userType == 'recruiter')
                                <h2 class="f-w-700 mb-4">University/College Coaches</h2>
                                <p class="f-w-400">
                                    At RecruitU we’re dedicated to revolutionizing your recruitment process. With our cutting-edge technology, your recruitment process becomes a seamless experience, empowering you to effortlessly pinpoint athletes who perfectly align with your program’s requirements.
                                </p>

                                <p class="f-w-400">
                                    Gone are the days of sifting through countless emails and multiple platforms in search of prospective talent. We provide you with comprehensive student profiles, encompassing their personal, academic, and athletic details.
                                </p>

                                <p class="f-w-400">
                                    What sets us apart? The simplicity of it all. By simply inputting your desired criteria such as SAT Scores, ACT Scores, GPA, Location, Graduation year, athletic information, and more, and watch as a tailored selection of athletes who match your needs materialize before your eyes. Once they appear, the ball is in your court to delve into their profiles and monitor their journey towards collegiate athletic success.
                                </p>
                            @else
                                <img class="bg-img-cover bg-center" src="{{ asset('assets/images/login/1.jpg') }}" alt="looginpagesss" style="">
                            @endif
                        </div>
                    </div>
                </div>
            @endif
            @php
                $columnSize = ($userType == 'student' || $userType == 'recruiter') ? '5' : '12';
            @endphp
            <div class="col-xl-{{ $columnSize }} p-0">
                <div class="login-card login-dark" style="background: url('{{ asset('assets/images/login/login_bg.jpg') }}');">
                    <div>
                        <div><a class="logo text-start" href="{{ url('/') }}"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo-1.png') }}" alt="looginpage"><img class="img-fluid for-dark" src="../assets/images/logo/logo.png" alt="looginpage"></a></div>
                        <div class="login-main">
                            <form class="theme-form"  method="POST" action="{{ route('login') }}">
                                @csrf
                                @if($userType == 'student')
                                    <h3>Prospective Student Athletes</h3>
                                @elseif($userType == 'recruiter')
                                    <h3>University/College Coaches</h3>
                                @else
                                    <h3>Sign in to account</h3>
                                @endif

                                @if($userType == 'student')
                                    <p>Sign in or create account</p>
                                @elseif($userType == 'recruiter')
                                    <p>Sign in or Request Login Information</p>
                                @else
                                    <p>Enter your email & password to login</p>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input
                                        class="form-control"
                                        name="email"
                                        type="email"
                                        value="{{ old('email') }}"
                                        placeholder="Test@gmail.com"
                                        autocomplete="email">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input
                                            class="form-control"
                                            type="password"
                                            name="password"
                                            required=""
                                            placeholder="*********"
                                            autocomplete="current-password">
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" name="remember" type="checkbox">
                                        <label class="text-muted" for="checkbox1">Remember password</label>
                                    </div>
                                    <a class="link" href="{{ route('password.request') }}">Forgot password?</a>
                                    <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                                </div>
                                @if($userType == 'student')
                                    <p class="mt-4 mb-0 text-center">Don't have a student account?<a class="ms-2" href="{{ route('register') }}">Create an Account</a></p>
                                @endif
                                @if($userType == 'recruiter')
                                    <p class="mt-4 mb-0 text-center"><a class="ms-2" href="{{ url('request/info') }}">Click here to request a demo or to receive login information</a></p>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
