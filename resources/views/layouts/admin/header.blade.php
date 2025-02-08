<div id="header" class="app-header">
    <!-- BEGIN navbar-header -->
    <div class="navbar-header">
        <button type="button" class="navbar-desktop-toggler" data-toggle="app-sidebar-minify">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="/" class="navbar-brand" target="_blank">
            Personal Portforlio
        </a>
    </div>
    <!-- END navbar-header -->
    <!-- BEGIN header-nav -->
    <div class="navbar-nav">
        <div class="navbar-item">
            <a href="#" data-toggle="app-header-floating-form" class="navbar-link icon">
                <i class="material-icons">search</i>
            </a>
        </div>

        <div class="navbar-item dropdown">
            <a href="#" data-bs-toggle="dropdown" class="navbar-link dropdown-toggle icon">
            <i class="material-icons">notifications</i>
                <span class="badge">5</span>
            </a>
            <div class="dropdown-menu media-list dropdown-menu-end">
                <div class="dropdown-header">NOTIFICATIONS (5)</div>
                <a href="javascript:;" class="dropdown-item media">
                    <div class="media-left">
                        <i class="fa fa-bug media-object bg-silver-600"></i>
                    </div>
                    <div class="media-body">
                        <h6 class="media-heading">Server Error Reports <i
                                class="fa fa-exclamation-circle text-danger"></i></h6>
                        <div class="text-muted fs-11px">3 minutes ago</div>
                    </div>
                </a>
                
                <div class="dropdown-footer text-center">
                    <a href="javascript:;" class="text-decoration-none">View more</a>
                </div>
            </div>
        </div>
        <div class="navbar-item navbar-user dropdown">
            <a href="#" class="navbar-link dropdown-toggle d-flex" data-bs-toggle="dropdown">
                <span class="d-none d-md-inline">Hi, {{Auth::user()->name}}</span>
                <img src="{{Auth::user()->profile_image_path}}" alt="" />
            </a>
            <div class="dropdown-menu dropdown-menu-end me-1">
                <a href="extra_profile.html" class="dropdown-item">Edit Profile</a>
               
               
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <!-- END header navigation right -->

    <div class="navbar-floating-form">
        <button class="search-btn" type="submit"><i class="material-icons">search</i></button>
        <input type="text" class="form-control" placeholder="Search Something..." />
        <a href="#" class="close" data-dismiss="app-header-floating-form"><i class="material-icons">close</i></a>
    </div>
</div>