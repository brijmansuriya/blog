


<div id="header" class="mdk-header mdk-header--bg-dark bg-dark js-mdk-header mb-0"
    data-effects="parallax-background waterfall" data-fixed data-condenses>
    <div class="mdk-header__bg">
        <div class="mdk-header__bg-front"></div>
    </div>
    <div class="mdk-header__content justify-content-center">
        <div class="navbar navbar-expand navbar-dark-pickled-bluewood bg-transparent will-fade-background" id="default-navbar" data-primary>
            <!-- Navbar toggler -->
            <button class="navbar-toggler w-auto mr-16pt d-block rounded-0" type="button" data-toggle="sidebar">
                <span class="material-icons">short_text</span>
            </button>
            <!-- Navbar Brand -->
            <a href="#" class="navbar-brand mr-16pt">
                <span class="avatar avatar-sm navbar-brand-icon mr-0 mr-lg-8pt" style="width: 169px;">
                    <span class="rounded">
                    <img src="{{url('/uploads/site_setting')}}/{{$site_setting->site_logo}}" alt="logo" class="img-fluid" width="200" /></span>
                </span>
                <span class="d-none d-lg-block"></span>
            </a>
            <ul class="nav navbar-nav d-none d-sm-flex flex justify-content-start ml-8pt">
          
             

                 @if (Route::has('login'))
              
                    @auth
                        <li class="nav-item active">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">Logout</a>
                        </li>
                    @else

                        <li class="nav-item active">
                            <a href="{{ route('login') }}" class="nav-link">Log in</a>
                        </li>
                      
                    @endauth
              
            @endif
            
            </ul>
          


          

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
