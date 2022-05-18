<!-- Header -->
<div class="hor-header header">
    <div class="container">
        <div class="d-flex">
            <a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a>
            <a class="header-brand" href="{{route('admin.index')}}">
                <img src="{{$setting->logo}}" class="header-brand-img mobile-icon" alt="logo">
                <img src="{{$setting->logo}}" class="header-brand-img desktop-logo mobile-logo" alt="logo">
            </a>
            <div class="d-flex mr-auto header-right-icons header-search-icon">
                <div class="dropdown d-none d-lg-flex">
                    <a class="nav-link icon full-screen-link nav-link-bg">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" class="fullscreen-button"><path d="M0 0h24v24H0V0z" fill="none"/><circle cx="12" cy="12" opacity=".3" r="3"/><path d="M7 12c0 2.76 2.24 5 5 5s5-2.24 5-5-2.24-5-5-5-5 2.24-5 5zm8 0c0 1.65-1.35 3-3 3s-3-1.35-3-3 1.35-3 3-3 3 1.35 3 3zM3 19c0 1.1.9 2 2 2h4v-2H5v-4H3v4zM3 5v4h2V5h4V3H5c-1.1 0-2 .9-2 2zm18 0c0-1.1-.9-2-2-2h-4v2h4v4h2V5zm-2 14h-4v2h4c1.1 0 2-.9 2-2v-4h-2v4z"/></svg>
                    </a>
                </div><!-- FULL-SCREEN -->
                <div class="dropdown profile-1">
                    <a href="#" data-toggle="dropdown" class="nav-link pl-2 pr-2  leading-none d-flex">
										<span>
											<img src="{{url('assets/admin/images/users/user.gif')}}" alt="profile-user" class="avatar  ml-xl-3 profile-user brround cover-image">
										</span>
                        <div class="text-center mt-1 d-none d-xl-block">
                            <h6 class="text-dark mb-0 fs-13 font-weight-semibold">{{admin()->user()->name}}</h6>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow">
                        <a class="dropdown-item" href="#">
                            <i class="dropdown-icon mdi mdi-account-outline"></i> My Profile
                        </a>
                        <a class="dropdown-item" href="{{route('admin.logout')}}">
                            <i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
