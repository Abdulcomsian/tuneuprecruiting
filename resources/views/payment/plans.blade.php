<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pricing Plans</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        body {
            margin-top: 20px;
            color: #bcd0f7;
            background: #1A233A;
            position: relative;
            height: 100%;
        }

        .pricing-plan {
            margin-bottom: 2rem;
            background: #272e48;
            border-radius: 4px;
            overflow: hidden;
        }

        .pricing-header {
            padding: 1rem;
            text-align: center;
            background: linear-gradient(120deg, #00b5fd 0%, #0047b1 100%);
            border-radius: 4px 4px 0 0;
        }

        .pricing-header.red {
            background: linear-gradient(120deg, #ff3434 0%, #a50000 100%);
        }

        .pricing-title {
            font-size: 1.5rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }

        .pricing-cost {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .pricing-save {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .pricing-features {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .pricing-features li {
            padding: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .pricing-features li:last-child {
            border-bottom: none;
        }

        .pricing-footer {
            text-align: center;
            padding: 1rem;
            border-radius: 0 0 4px 4px;
        }

        .spinner-grow {
            display: none;
        }

        .pricing-plan .pricing-header.secondary {
            background-image: linear-gradient(120deg, #c0d64a 0%, #35690f 100%);
        }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <div class="text-center">
                <h1 class="display-4 text-white mb-5">Our Pricing Plans</h1>
                <div class="row">
                    @foreach ($plans as $plan)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="pricing-plan">
                                <div
                                    class="pricing-header {{ $plan->slug === 'basic-monthly' ? '' : ($plan->slug === 'basic-daily' ? 'secondary' : 'red') }}">
                                    <h4 class="pricing-title">{{ $plan->name }}</h4>
                                    <div class="pricing-cost">${{ $plan->price }} only</div>
                                </div>

                                <p class="text-center text-white mb-4">{{ $plan->description }}</p>
                                <div class="pricing-footer">
                                    <form action="{{ route('checkout.create') }}" method="POST"
                                        onsubmit="showSpinner(this)">
                                        @csrf
                                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                        <button type="submit"
                                            class="btn {{ $plan->slug === 'basic-monthly' ? 'btn-primary' : ($plan->slug === 'basic-daily' ? 'btn-success' : 'btn-danger') }}">
                                            Subscribe
                                            <span class="spinner-grow spinner-grow-sm" role="status"
                                                aria-hidden="true"></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
</body>

</html>
