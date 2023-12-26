<x-guest-layout>
    <div class="page-wrapper">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="login-card login-dark">
                        <div>
                            <div>
                                <a class="logo" href="{{ url('/') }}">
                                    <img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo-1.png') }}" alt="looginpage">
                                    <img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo.png') }}" alt="looginpage">
                                </a>
                            </div>
                            <div class="login-main">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="theme-form" method="POST" action="{{ route('password.store') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                    <h4>Create Your Password</h4>
                                    <div class="form-group">
                                        <label class="col-form-label">Email</label>
                                        <div class="form-input position-relative">
                                            <input
                                                class="form-control"
                                                type="email"
                                                name="email"
                                                value="{{ old('email', $request->email) }}"
                                                required
                                                readonly
                                                autocomplete="username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">New Password</label>
                                        <div class="form-input position-relative">
                                            <input class="form-control" type="password" name="password" required placeholder="*********">
                                            <div class="show-hide"><span class="show"></span></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Retype Password</label>
                                        <input class="form-control" type="password" name="password_confirmation" required placeholder="*********">
                                    </div>
                                    <div class="form-group mb-0">
                                        <button class="btn btn-primary btn-block w-100" type="submit">Done</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
