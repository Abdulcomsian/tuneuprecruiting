<x-guest-layout>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-xl-7"><img class="bg-img-cover bg-center" src="{{ asset('assets/images/login/1.jpg') }}" alt="looginpage"></div>
            <div class="col-xl-5 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div><a class="logo text-start" href="{{ url('/') }}"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo-1.png') }}" alt="looginpage"><img class="img-fluid for-dark" src="../assets/images/logo/logo.png" alt="looginpage"></a></div>
                        <div class="login-main">
                            <form class="theme-form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <h3>Create your account</h3>
                                <p>Enter your personal details to create account</p>

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
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <label class="col-form-label pt-0">Your Name</label>
                                            <input class="form-control" name="name" value="{{ old('name') }}" type="text" required="" placeholder="name">
                                        </div>
                                        <div class="col-6">
                                            <label class="col-form-label pt-0">Email</label>
                                            <input class="form-control" name="email" value="{{ old('email') }}" type="email" required="" placeholder="Test@gmail.com">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Type</label>
                                    <div class="form-input position-relative">
                                        <select name="role" id="" class="form-control" required>
                                            <option value="">Choose</option>
                                            <option value="student">Student</option>
                                            <option value="coach">Coach</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <label class="col-form-label">Password</label>
                                            <div class="form-input position-relative">
                                                <input class="form-control" type="password" name="password" required="" placeholder="*********">
                                                <div class="show-hide"><span class="show"></span></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label class="col-form-label">Confirm Password</label>
                                            <div class="form-input position-relative">
                                                <input class="form-control" type="password" name="password_confirmation" required="" placeholder="*********">
                                                <div class="show-hide"><span class="show"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox" required>
                                        <label class="text-muted" for="checkbox1">Agree with<a class="ms-2" href="#">Privacy Policy</a></label>
                                    </div>
                                    <button class="btn btn-primary btn-block w-100" type="submit">Create Account</button>
                                </div>
                                <p class="mt-4 mb-0 text-center">Already have an account?<a class="ms-2" href="{{ route('login') }}">Sign in</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
