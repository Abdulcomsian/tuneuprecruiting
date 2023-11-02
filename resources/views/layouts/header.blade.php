<div class="page-header">
    <div class="header-wrapper row">
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="{{asset('assets/images/logo/logo.png')}}" alt=""></a></div>
        <svg class="stroke-icon toggle-sidebar">
            <use class="status_toggle middle sidebar-toggle" href="{{asset('assets/svg/icon-sprite.svg#Grid')}}"> </use>
        </svg>
        <form class="col-auto form-inline search-full" action="#" method="get">
            <div class="form-group">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Type to Search .." name="q" title="" autofocus>
                        <svg class="search-bg svg-color">
                            <use href="{{asset('assets/svg/icon-sprite.svg#Search')}}"></use>
                        </svg>
                    </div>
                    <div class="Typeahead-menu"></div>
                </div>
            </div>
        </form>
        <div class="nav-right col-auto pull-right right-header p-0 ms-auto">
            <ul class="nav-menus">
                <li class="serchinput">
                    <div class="serchbox">
                        <svg>
                            <use href="{{asset('assets/svg/icon-sprite.svg#Search')}}"></use>
                        </svg>
                    </div>
                    <div class="form-group search-form">
                        <input type="text" placeholder="Search here...">
                    </div>
                </li>
                <li class="onhover-dropdown">
                    <div class="notification-box">
                        <svg>
                            <use href="{{asset('assets/svg/icon-sprite.svg#Bell')}}"></use>
                        </svg>
                    </div>
                    <div class="onhover-show-div notification-dropdown">
                        <h6 class="f-18 mb-0 dropdown-title">Notitications</h6>
                        <ul>
                            <li class="b-l-primary border-4 mt-3"><a href="email-application.html">
                                    <p>New Review Receive<span class="font-danger">10 min.</span></p></a></li>
                            <li class="b-l-success border-4 mt-3"><a href="invoice.html">
                                    <p>Transaction $250 Success<span class="font-success">1 hr </span></p></a></li>
                            <li class="b-l-secondary border-4 mt-3"><a href="email-compose.html">
                                    <p>Order Place Success<span class="font-secondary">3 hr</span></p></a></li>
                            <li class="b-l-warning border-4 mt-3"><a href="email-application.html">
                                    <p>Netflix Subscription...<span class="font-warning">6 hr</span></p></a></li>
                            <li><a class="f-w-700" href="email-application.html">Check all</a></li>
                        </ul>
                    </div>
                </li>
                <li class="onhover-dropdown">
                    <svg>
                        <use href="{{asset('assets/svg/icon-sprite.svg#Bookmark')}}"></use>
                    </svg>
                    <div class="onhover-show-div bookmark-flip">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="front">
                                    <h6 class="f-18 mb-0 dropdown-title">Bookmark</h6>
                                    <ul class="bookmark-dropdown">
                                        <li>
                                            <div class="row">
                                                <div class="col-4 text-center"><a href="form-validation.html">
                                                        <div class="bookmark-content">
                                                            <div class="bookmark-icon"><i data-feather="file-text"></i></div><span>Forms </span>
                                                        </div></a></div>
                                                <div class="col-4 text-center"><a href="user-profile.html">
                                                        <div class="bookmark-content">
                                                            <div class="bookmark-icon"><i data-feather="user"></i></div><span>Profile </span>
                                                        </div></a></div>
                                                <div class="col-4 text-center"><a href="bootstrap-basic-table.html">
                                                        <div class="bookmark-content">
                                                            <div class="bookmark-icon"><i data-feather="server"></i></div><span>Tables </span>
                                                        </div></a></div>
                                            </div>
                                        </li>
                                        <li class="text-centermedia-body"> <a class="flip-btn f-w-700" id="flip-btn" href="javascript:void(0)">Add New Bookmark</a></li>
                                    </ul>
                                </div>
                                <div class="back">
                                    <ul>
                                        <li>
                                            <div class="bookmark-dropdown flip-back-content">
                                                <input type="text" placeholder="search...">
                                            </div>
                                        </li>
                                        <li><a class="f-w-700 d-block flip-back" id="flip-back" href="javascript:void(0)">Back</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="onhover-dropdown message-box">
                    <div class="message notification-box">
                        <svg>
                            <use href="{{asset('assets/svg/icon-sprite.svg#Message')}}"></use>
                        </svg><span class="rounded-pill badge-secondary"> </span>
                    </div>
                    <div class="onhover-show-div message-dropdown">
                        <h6 class="f-18 mb-0 dropdown-title">Message                               </h6>
                        <ul>
                            <li>
                                <div class="d-flex align-items-start">
                                    <div class="message-img bg-light-primary"><img src="{{asset('assets/images/user/3.jpg')}}" alt=""></div>
                                    <div class="flex-grow-1">
                                        <h5 class="mb-1"><a href="email-application.html">Emay Walter</a></h5>
                                        <p>Do you want to go see movie?</p>
                                    </div>
                                    <div class="notification-right"><i data-feather="x"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-start">
                                    <div class="message-img bg-light-primary"><img src="{{asset('assets/images/user/6.jpg')}}" alt=""></div>
                                    <div class="flex-grow-1">
                                        <h5 class="mb-1"><a href="email-application.html">Jason Borne</a></h5>
                                        <p>Thank you for rating us.</p>
                                    </div>
                                    <div class="notification-right"><i data-feather="x"></i></div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-start">
                                    <div class="message-img bg-light-primary"><img src="{{asset('assets/images/user/10.jpg')}}" alt=""></div>
                                    <div class="flex-grow-1">
                                        <h5 class="mb-1"><a href="email-application.html">Sarah Loren</a></h5>
                                        <p>What`s the project report update?</p>
                                    </div>
                                    <div class="notification-right"><i data-feather="x"></i></div>
                                </div>
                            </li>
                            <li><a class="f-w-700" href="chat.html">Check all</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="mode">
                        <svg>
                            <use href="{{asset('assets/svg/icon-sprite.svg#moon')}}"></use>
                        </svg>
                    </div>
                </li>
                <li class="profile-nav onhover-dropdown pe-0 py-0">
                    <div class="d-flex align-items-center profile-media"><img class="b-r-25" src="{{asset('assets/images/dashboard/profile.png')}}" alt="">
                        <div class="flex-grow-1 user"><span>Helen Walter</span>
                            <p class="mb-0 font-nunito">Admin
                                <svg>
                                    <use href="{{asset('assets/svg/icon-sprite.svg#header-arrow-down')}}"></use>
                                </svg>
                            </p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li><a href="{{ url('profile') }}"><i data-feather="user"></i><span>Account </span></a></li>
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i data-feather="log-in"> </i><span>Logout</span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">
                <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
                <div class="ProfileCard-details">
                    <div class="ProfileCard-realName">Admin</div>
                </div>
            </div>
        </script>
        <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
    </div>
</div>
