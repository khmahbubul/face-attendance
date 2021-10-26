<div class="header app-header">
    <div id="particles-js" class="zindex1"></div>
    <div class="container-fluid">
        <div class="d-flex header-nav">
            <div class="color-headerlogo">
                <a class="header-desktop" href="index.html"></a>
                <a class="header-mobile" href="index.html"></a>
            </div><!-- Color LOGO -->
            <a href="#" data-toggle="sidebar" class="nav-link icon toggle"><i class="fe fe-align-justify"></i></a>
            <div class="d-flex order-lg-2 ml-auto header-right-icons header-search-icon">
                <div class="dropdown  header-fullscreen">
                    <a class="nav-link icon full-screen-link nav-link-bg" id="fullscreen-button">
                        <i class="fe fe-minimize" ></i>
                    </a>
                </div><!-- FULL-SCREEN -->
                <div class="dropdown header-user">
                    <a href="#" class="nav-link icon" data-toggle="dropdown">
                        <span><img src="{{ asset('assets/images/users/female/7.jpg') }}" alt="profile-user" class="avatar brround cover-image mb-0 ml-0"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <div class=" dropdown-header noti-title text-center border-bottom p-3">
                            <div class="header-usertext">
                                <h5 class="mb-1">{{ auth()->user()->name }}</h5>
                                <p class="mb-0">{{ auth()->user()->roles->first()->name }}</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="profile.html">
                            <i class="mdi mdi-account-outline mr-2"></i> <span>My profile</span>
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <i class="mdi  mdi-logout-variant mr-2"></i> <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                <!-- SIDE-MENU -->
            </div>
        </div>
    </div>
</div>