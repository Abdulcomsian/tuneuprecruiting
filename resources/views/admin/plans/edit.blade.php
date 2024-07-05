<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Update Plan</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(['Add new Recruiter']) !!}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid basic_table">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success') || session('danger'))
                                @php $className = (session('success')) ? 'success' : 'danger'; @endphp
                                @php $message = (session('success')) ? session('success') : session('danger'); @endphp
                                <div class="alert alert-{{ $className }}">
                                    {{ $message }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('manage-plan.update', $plan->id) }}" class="row g-3">
                                @csrf
                                @method('PUT')
                                <div class="col-md-3">
                                    <x-dynamic-input id="name" type="text" name="name"
                                        value="{{ old('name', $plan->name) }}" placeholder="Name" required="true" />
                                </div>
                                <div class="col-md-3">
                                    <x-dynamic-input id="slug" type="text" name="slug"
                                        value="{{ old('slug', $plan->slug) }}" placeholder="Slug" required="true"
                                        disable=true />
                                </div>
                                <div class="col-md-3">
                                    <x-dynamic-input id="stripe-plan" type="text" name="stripe-plan"
                                        value="{{ old('stripe-plan', $plan->stripe_plan) }}" placeholder="Stripe Plan"
                                        required="true" />
                                </div>
                                <div class="col-md-3">
                                    <x-dynamic-input id="price" type="text" name="price"
                                        value="{{ old('price', $plan->price) }}" placeholder="Price" required="true" />
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary float-end mt-3" id="btn-from-add"
                                        type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
