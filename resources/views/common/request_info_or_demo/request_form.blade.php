<x-guest-layout>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-xl-7"><img class="bg-img-cover bg-center" src="{{ asset('assets/images/login/1.jpg') }}" alt="looginpage"></div>
            <div class="col-xl-5 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div><a class="logo text-start" href="{{ url('/') }}"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo-1.png') }}" alt="looginpage"><img class="img-fluid for-dark" src="../assets/images/logo/logo.png" alt="looginpage"></a></div>
                        <div class="login-main">
                            @if(session('success') || session('danger'))
                                @php $className = (session('success')) ? 'success' : 'danger'; @endphp
                                @php $message = (session('success')) ? session('success') : session('danger'); @endphp
                                <div class="alert alert-{{ $className }}">
                                    {{ $message }}
                                </div>
                            @endif
                            <form class="theme-form" method="POST" action="{{ url('/request/info/submit') }}">
                                @csrf
                                <h3>Request Info or Demo</h3>
                                <p></p>

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
                                        <div class="col-12">
                                            <x-dynamic-input
                                                type="text"
                                                placeholder="College/University Name"
                                                name="university_name"
                                                required="true"
                                                value="{{ old('university_name') }}"
                                                class="form-control"
                                                id="university-name" />
                                        </div>
                                        <div class="col-12">
                                            <x-dynamic-input
                                                type="text"
                                                placeholder="Contact Name"
                                                name="contact_name"
                                                required="true"
                                                value="{{ old('contact_name') }}"
                                                class="form-control"
                                                id="text" />
                                        </div>
                                        <div class="col-12">
                                            <x-dynamic-input
                                                type="text"
                                                placeholder="Email"
                                                name="email"
                                                required="true"
                                                value="{{ old('email') }}"
                                                class="form-control"
                                                id="email" />
                                        </div>
                                        <div class="col-12">
                                            <x-dynamic-input
                                                type="text"
                                                placeholder="Phone Number"
                                                name="phone_number"
                                                required="true"
                                                value="{{ old('phone_number') }}"
                                                class="form-control"
                                                id="text" />
                                        </div>
                                        <div class="col-12">
                                            @component('components.select-list', [
                                                'options' => ['College', 'University'],
                                                'selected' => old('college_or_university'),
                                                'name' => 'college_or_university',
                                                'id' => 'college-or-university',
                                                'arrayKey' => false,
                                                'required' => true,
                                                'label' => 'College/University',
                                                'inputClass' => 'form-control'
                                                ])
                                            @endcomponent
                                        </div>
                                        <div class="col-12">
                                            <x-input-textarea name="info" label="Info " required="true" id="info " className="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block w-100" type="submit">Request</button>
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
