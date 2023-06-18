<div class="page-header">
    <div class="header-wrapper row m-0">
        <form class="form-inline search-full col" action="#" method="get">
            <div class="mb-3 w-100">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                            placeholder="Search Cuba .." name="q" title="" autofocus>
                        <div class="spinner-border Typeahead-spinner" role="status"><span
                                class="sr-only">Loading...</span></div>
                        <i class="close-search" data-feather="x"></i>
                    </div>
                    <div class="Typeahead-menu"></div>
                </div>
            </div>
        </form>
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href=""><img class="img-fluid" src="{{ asset('images/logo/logo.png') }}"
                        alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
            </div>
        </div>
        <div class="left-header col horizontal-wrapper ps-0">
            <ul class="horizontal-menu">
                <li class="level-menu outside">
                    <ul class="header-level-menu menu-to-be-close">
                        <li>
                            <a href="" data-original-title="" title=""> <i
                                    data-feather="git-pull-request"></i><span>File manager </span></a>
                        </li>
                        <li>
                            <a href="#!" data-original-title="" title=""> <i
                                    data-feather="users"></i><span>Users</span></a>
                            <ul class="header-level-sub-menu">
                                <li>
                                    <a href="" data-original-title="" title=""> <i
                                            data-feather="user"></i><span>User Profile</span></a>
                                </li>
                                <li>
                                    <a href="" data-original-title="" title=""> <i
                                            data-feather="user-minus"></i><span>User Edit</span></a>
                                </li>
                                <li>
                                    <a href="" data-original-title="" title=""> <i
                                            data-feather="user-check"></i><span>Users Cards</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="" data-original-title="" title=""> <i
                                    data-feather="airplay"></i><span>Kanban Board</span></a>
                        </li>
                        <li>
                            <a href="" data-original-title="" title=""> <i
                                    data-feather="heart"></i><span>Bookmark</span></a>
                        </li>
                        <li>
                            <a href="" data-original-title="" title=""> <i
                                    data-feather="zap"></i><span>Social App </span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">

                <li class="onhover-dropdown">
                    <div class="notification-box" id="notif-icon"><i data-feather="bell"> </i><span
                            class="badge rounded-pill badge-secondary" data-count="0" id="notification-count">0</span>
                    </div>
                    <ul class="notification-dropdown onhover-show-div" id="notification-wrapper">
                        <li>
                            <i data-feather="bell"></i>
                            <h6 class="f-18 mb-0">Notifikasi keterlambatan</h6>
                        </li>
                        {{-- <div style="background-color:white;">
              
            </div> --}}
                        {{-- <li>
                            <h6><i class="font-primary"> </i>Delivery processing <span
                                    class="pull-right">10 min.</span></h6>
                        </li> --}}
                        {{-- <li><a class="btn btn-primary" href="#">Check all notification</a></li> --}}
                    </ul>
                </li>
                <li class="profile-nav onhover-dropdown p-0 me-0">
                    <div class="media profile-media">
                        <img class="b-r-10"
                            src="{{ Auth::user()->jk == 'L' ? asset('images/dashboard/man.png') : asset('images/dashboard/woman.png') }}"
                            alt="">
                        <div class="media-body">
                            <span>{{ Auth::user()->nama }}</span>
                            <p class="mb-0 font-roboto">{{ Auth::user()->role->keterangan }} <i
                                    class="middle fa fa-angle-down"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li><a href="{{ route('update_akun.index') }}"><i data-feather="settings"></i><span>Pengaturan</span></a></li>
                        <li><a href="{{ route('logout') }}"><i data-feather="log-in"> </i><span>Logout</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <script class="result-template" type="text/x-handlebars-template">
      <div class="ProfileCard u-cf">                        
      <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
      <div class="ProfileCard-details">
      <div class="ProfileCard-realName">@{{name}}</div>
      </div>
      </div>
    </script>
        <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
    </div>
</div>
