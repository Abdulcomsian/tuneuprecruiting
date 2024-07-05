<x-guest-layout>
    <style>
        .spinner-grow {
            display: none;
        }
    </style>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-xl-6"><img class="bg-img-cover bg-center" src="{{ asset('assets/images/login/1.jpg') }}"
                    alt="looginpage"></div>
            <div class="col-xl-6 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div class="d-flex justify-content-center mb-5">
                            <a class="logo text-start" href="{{ url('/') }}">
                                <img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo-1.png') }}"
                                    alt="looginpage">
                                <img class="img-fluid for-dark" src="{{ asset('assets/images/white-logo.png') }}"
                                    alt="looginpage">
                            </a>
                        </div>
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <div class="col-form-label">Step 2/2</div>
                        </div>
                        <h1 class="text-center mb-4 col-form-label">Select Pricing Plans</h1>
                        <div class="row row-cols-1 row-cols-md-3">
                            @foreach ($plans as $plan)
                                <div class="col mb-4">
                                    <div class="card h-100">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title text-center col-form-label">{{ $plan->name }}</h5>
                                            <h6 class="card-subtitle col-form-label mt-3" style="margin-left: 20%;">
                                                ${{ $plan->price }}
                                                only
                                            </h6>
                                            <div class="mt-auto">
                                                @if ($plan->slug != 'exclusive-annual')
                                                    <form action="{{ route('checkout.create') }}" method="POST"
                                                        onsubmit="showSpinner(this)">
                                                        @csrf
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ $plan->id }}">
                                                        <button type="submit" class="btn btn-primary btn-block">Select
                                                            <span class="spinner-grow spinner-grow-sm d-none"
                                                                role="status" aria-hidden="true"></span>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('onetimePay.create') }}" method="POST"
                                                        onsubmit="showSpinner(this)">
                                                        @csrf
                                                        <input type="hidden" name="plan_id"
                                                            value="{{ $plan->id }}">
                                                        <button type="submit" class="btn btn-primary btn-block">Select
                                                            <span class="spinner-grow spinner-grow-sm d-none"
                                                                role="status" aria-hidden="true"></span>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showSpinner(form) {
            var button = form.querySelector('button[type="submit"]');
            button.disabled = true;
            var spinner = button.querySelector('.spinner-grow');
            spinner.style.display = 'inline-block';

            form.submit();
        }
    </script>
</x-guest-layout>
