<x-guest-layout>
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <div class="page-wrapper" id="pageWrapper">
        <!-- error-400 start-->
        <div class="error-wrapper">
            <div class="container"><img src="../assets/images/other-images/sad.gif" alt="">
                <div class="error-heading">
                    <h2 class="headline font-info">400</h2>
                </div>
                <div class="col-md-8 offset-md-2">
                    <p class="sub-content">{{ $errorMessage }}</p>
                </div>
                <div><a class="btn btn-info-gradien btn-lg" href="{{ url('/') }}">BACK TO HOME PAGE</a></div>
            </div>
        </div>
        <!-- error-400 end-->
    </div>
</x-guest-layout>
