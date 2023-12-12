<div class="sidebar-wrapper" data-layout="stroke-svg">
    <div>
        <div class="logo-wrapper" style="background-color: #fff;">
            <a><img class="img-fluid" src="{{ asset('assets/images/logo/logo.png') }}" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left">   </i></div>
        </div>
        <nav class="sidebar-main">
            <div id="sidebar-menu">
                @php if (auth()->user()->role == 'coach'): @endphp
                    <ul class="sidebar-links" id="simple-bar">
                        <li class="back-btn"><a href="{{ url('/dashboard') }}"></a>
                            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                        </li>
                        <li class="sidebar-main-title">
                            <div></div>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="{{ url('/dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#home') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                                </svg><span>Home</span>
                            </a>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ url('applies') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#Ui-kites') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{asset('assets/svg/icon-sprite.svg#fill-ui')}}"></use>
                                </svg><span>Applies</span></a>
                        </li>

                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{asset('assets/svg/icon-sprite.svg#Form')}}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="../assets/svg/icon-sprite.svg#fill-Editor"></use>
                                </svg><span>Program</span></a>
                            <ul class="sidebar-submenu custom-scrollbar">
                                <li class="sidebar-head">Programs</li>

                                <li class="main-submenu">
                                    <a class="d-flex" href="{{ route('program.create') }}">
                                        <svg class="stroke-icon">
                                            <use href="../assets/svg/icon-sprite.svg#stroke-file"></use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="../assets/svg/icon-sprite.svg#fill-file"></use>
                                        </svg>Add new program
                                    </a>
                                </li>
                                <li class="main-submenu"><a class="d-flex" href="{{ route('program.index') }}">
                                        <svg class="stroke-icon">
                                            <use href="../assets/svg/icon-sprite.svg#stroke-board"></use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="../assets/svg/icon-sprite.svg#fill-board"></use>
                                        </svg>Program list</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ url('/chat/'.encrypt(null)) }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#Message') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{asset('assets/svg/icon-sprite.svg#Message')}}"></use>
                                </svg><span>Messages</span></a>
                        </li>
                    </ul>
                @php endif; @endphp

                @php if (auth()->user()->role == 'student'): @endphp
                    <ul class="sidebar-links" id="simple-bar">
                        <li class="back-btn"><a href="{{ url('student/dashboard') }}"></a>
                            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                        </li>
                        <li class="sidebar-main-title">
                            <div></div>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="{{ url('student/dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#home') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                                </svg><span>Home</span>
                            </a>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="{{ url('student/applies') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#Perk-Ui') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                                </svg><span>Applies</span>
                            </a>
                        </li>

                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ url('/chat/'.encrypt(null)) }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#Message') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{asset('assets/svg/icon-sprite.svg#Message')}}"></use>
                                </svg><span>Messages</span></a>
                        </li>
                    </ul>
                @php endif; @endphp
            </div>
        </nav>
    </div>
</div>
