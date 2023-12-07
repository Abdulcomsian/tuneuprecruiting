<x-guest-layout>
    <div class="page-wrapper">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="login-card login-dark">
                        <div>
                            <div>
                                <a class="logo" href="index.html">
                                    <img class="img-fluid for-light" src="../assets/images/logo/logo-1.png" alt="looginpage">
                                    <img class="img-fluid for-dark" src="../assets/images/logo/logo.png" alt="looginpage">
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
                                <form class="theme-form" method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-form-label">Email</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            value="{{ old('email') }}"
                                            name="email"
                                            required placeholder="example@email.com">
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
