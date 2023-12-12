<x-guest-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7">
                <img class="bg-img-cover bg-center" src="../assets/images/login/1.jpg" alt="looginpage">
            </div>
            <div class="col-xl-5 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div><a class="logo text-start" href="{{ url('/') }}"><img class="img-fluid for-light" src="../assets/images/logo/logo-1.png" alt="looginpage"><img class="img-fluid for-dark" src="../assets/images/logo/logo.png" alt="looginpage"></a></div>
                        <div class="login-main">
                            <form class="theme-form"  method="POST" action="{{ route('login') }}">
                                @csrf
                                <h3>Sign in to account</h3>
                                <p>Enter your email & password to login</p>

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
                                    <input class="form-control" name="email" type="email" value="{{ old('email') }}" placeholder="Test@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" name="password" required="" placeholder="*********">
                                        <div class="show-hide"><span class="show">                         </span></div>
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
                                <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="{{ route('register') }}">Create Account</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
