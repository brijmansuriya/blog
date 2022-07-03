<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{ url('/')}}">
        <img src="{{url('/uploads/site_setting')}}/{{$site_setting->site_logo}}" class="mr-2" alt="logo"  /></a>
        <a class="navbar-brand brand-logo-mini" href="{{ url('/')}}"><img src="{{url('/uploads/site_setting')}}/{{$site_setting->site_logo}}" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>


        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
             <a class="nav-link dropdown-toggle " href="#" data-toggle="dropdown" id="profileDropdown" aria-expanded="false">
                    <img src="{{ URL::asset('backend/images/logo.svg')}}" alt="profile" />
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown" id="test111">
                    <a class="dropdown-item"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ti-power-off text-primary"></i>
                        Logout
                    </a>
                </div>
            </li>
       

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>
