<div class="sidebar-wrapper" data-layout="stroke-svg">
    <div style="width: 120px;">
        <div class="logo-wrapper" style="background-color: #fff; width: 120px; padding-top: 1px;">
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
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{asset('assets/svg/icon-sprite.svg#Form')}}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="../assets/svg/icon-sprite.svg#fill-Editor"></use>
                                </svg><span>Programs</span></a>
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
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ url('applies') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#Perk-Ui') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{asset('assets/svg/icon-sprite.svg#Perk-Ui')}}"></use>
                                </svg><span>Applications</span></a>
                        </li>

                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ url('/chat/'.encrypt(null)) }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#Message') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{asset('assets/svg/icon-sprite.svg#Message')}}"></use>
                                </svg><span>Messages</span></a>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{asset('assets/svg/icon-sprite.svg#Ui-kites')}}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#Ui-kites') }}"></use>
                                </svg><span>Reports</span></a>
                            <ul class="sidebar-submenu custom-scrollbar">
                                <li class="sidebar-head">Reports</li>
                                <li class="main-submenu">
                                    <form method="POST" action="{{ route('report.recruiter') }}">
                                        @csrf
                                        <a href="#" onclick="$(this).closest('form').submit();">
                                            <svg class="stroke-icon">
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-board') }}"></use>
                                            </svg>
                                            <svg class="fill-icon">
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-board') }}"></use>
                                            </svg>Recruiter Report
                                        </a>
                                    </form>
                                </li>
                                <li class="main-submenu">
                                    <form method="POST" action="{{ route('report.application') }}">
                                        @csrf
                                        <a href="#" onclick="$(this).closest('form').submit();">
                                            <svg class="stroke-icon">
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-board') }}"></use>
                                            </svg>
                                            <svg class="fill-icon">
                                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-board') }}"></use>
                                            </svg>Applications Report
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#Grid') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ assert('assets/svg/icon-sprite.svg#fill-Grid') }}"></use>
                                </svg><span>Setting</span></a>
                            <ul class="sidebar-submenu custom-scrollbar">
                                <li class="sidebar-head">Settings</li>
                                <li class="main-submenu"><a class="d-flex sidebar-menu" href="javascript:void(0)">
                                        <svg class="stroke-icon">
                                            <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-email') }}"></use>
                                        </svg>
                                        <svg class="fill-icon">
                                            <use href="{{ asset('assets/svg/icon-sprite.svg#fill-email') }}"></use>
                                        </svg>Email Template
                                        <svg class="arrow">
                                            <use href="{{ asset('assets/svg/icon-sprite.svg#Arrow-right') }}"></use>
                                        </svg></a>
                                    <ul class="submenu-wrapper">
                                        <li><a href="{{ route('template.index') }}">Email Templates</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="{{ url('/applies/trash') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                <span>Trash</span>
                            </a>
                        </li>
                    </ul>
                @php endif; @endphp

                @php if (auth()->user()->role == 'admin'): @endphp
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="{{ url('admin/dashboard') }}"></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div></div>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="{{ url('admin/dashboard') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#home') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                            </svg><span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <svg class="stroke-icon">
                                <use href="{{asset('assets/svg/icon-sprite.svg#stroke-user')}}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="../assets/svg/icon-sprite.svg#fill-user"></use>
                            </svg><span>Recruiter</span></a>
                        <ul class="sidebar-submenu custom-scrollbar">
                            <li class="sidebar-head">Recruiter</li>

                            <li class="main-submenu">
                                <a class="d-flex" href="{{ route('recuriter.create') }}">
                                    <i data-feather="user-plus"></i> Add new Recruiter
                                </a>
                            </li>
                            <li class="main-submenu"><a class="d-flex" href="{{ route('recuriter.index') }}">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-board') }}"></use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#fill-board') }}"></use>
                                    </svg>Recruiter list</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="{{ url('request/info/all') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-layout') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-layout') }}"></use>
                            </svg><span>Demo Requests</span>
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

                    {{-- <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                        <svg class="stroke-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#Message') }}"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="{{asset('assets/svg/icon-sprite.svg#Message')}}"></use>
                        </svg><span>Coaches</span></a>

                        <ul class="sidebar-submenu custom-scrollbar">
                            <li class="sidebar-head">Coaches</li>

                            <li class="main-submenu">
                                <a class="d-flex" href="{{ route('manage.coach') }}">
                                    <i data-feather="user-plus"></i> Manage Coaches
                                </a>
                            </li>

                            <li class="main-submenu"><a class="d-flex" href="{{ route('manage.university') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-board') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-board') }}"></use>
                                </svg>Manage Universities</a>
                            </li>
                        </ul>
                    </li> --}}

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="{{ route('manage.coach') }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#Perk-Ui') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-videos') }}"></use>
                            </svg>
                            <span>Coaches</span>
                        </a>
                    </li>

                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#Grid') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ assert('assets/svg/icon-sprite.svg#fill-Grid') }}"></use>
                            </svg><span>Setting</span></a>
                        <ul class="sidebar-submenu custom-scrollbar">
                            <li class="sidebar-head">Settings</li>
                            <li class="main-submenu"><a class="d-flex sidebar-menu" href="javascript:void(0)">
                                    <svg class="stroke-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-email') }}"></use>
                                    </svg>
                                    <svg class="fill-icon">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#fill-email') }}"></use>
                                    </svg>Email Template
                                    <svg class="arrow">
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#Arrow-right') }}"></use>
                                    </svg></a>
                                <ul class="submenu-wrapper">
                                    <li><a href="{{ url('/admin/setting/emails') }}">Email Templates</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="javascript:void(0)">
                        <svg class="stroke-icon">
                            <use href="{{asset('assets/svg/icon-sprite.svg#stroke-user')}}"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="../assets/svg/icon-sprite.svg#fill-user"></use>
                        </svg><span>Videos</span></a>
                    <ul class="sidebar-submenu custom-scrollbar">
                        <li class="sidebar-head">Videos</li>
                        <li class="main-submenu">
                            <a class="d-flex" href="{{ route('medias.create') }}">
                                <i class="fa fa-plus-circle" style="margin-right: 8px;"></i> Add new Video
                            </a>
                        </li>
                        <li class="main-submenu">
                            <a class="d-flex" href="{{ route('medias.index') }}">
                                <i class="fa fa-list" style="margin-right: 8px;"></i> Video List
                            </a>
                        </li>
                        <li class="main-submenu">
                            <a class="d-flex" href="{{ route('medias.images-create') }}">
                                <i class="fa fa-plus-circle" style="margin-right: 8px;"></i> Manage Images
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title" href="{{ route('manage-plan.index') }}">
                        <svg class="stroke-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#Perk-Ui') }}"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#fill-videos') }}"></use>
                        </svg>
                        <span>Plans</span>
                    </a>
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
                                </svg><span>Available Programs</span>
                            </a>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="{{ url('student/applies') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#Perk-Ui') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                                </svg><span>My Applications</span>
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

                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="{{ url('student/videos') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#Perk-Ui') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-videos') }}"></use>
                                </svg>
                                <span>Videos</span>
                            </a>
                        </li>

                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="{{ route('coach.list') }}">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#Perk-Ui') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#fill-videos') }}"></use>
                                </svg>
                                <span>Coaches</span>
                            </a>
                        </li>
                    </ul>
                @php endif; @endphp
            </div>
        </nav>
    </div>
</div>
