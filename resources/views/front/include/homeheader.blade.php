<div id="header" class="mdk-header mdk-header--bg-dark bg-dark js-mdk-header mb-0"
    data-effects="parallax-background waterfall" data-fixed data-condenses>
    <div class="mdk-header__bg">
        <div class="mdk-header__bg-front" style="background-image: url(public_front/images/photodune-4161018-group-of-students-m.jpg);"></div>
    </div>
    <div class="mdk-header__content justify-content-center">
        <div class="navbar navbar-expand navbar-dark-pickled-bluewood bg-transparent will-fade-background"
            id="default-navbar" data-primary>
            <!-- Navbar toggler -->
            <button class="navbar-toggler w-auto mr-16pt d-block rounded-0" type="button" data-toggle="sidebar">
                <span class="material-icons"></span>
            </button>
            <a href="{{ route('fronthome') }}" class="navbar-brand mr-16pt">
                <span class="avatar avatar-sm navbar-brand-icon mr-0 mr-lg-8pt">
                    <span class="rounded">
                @auth
                    @if(file_exists(public_path().'/uploads/courses/'.auth()->user()->image))
                        <img src="{{ url('/uploads/courses/'.auth()->user()->image)}}" alt="logo" class="img-fluid" style="height: 45px;"/>
                    @else
                        <img src="{{url('/uploads/site_setting/'.$site_setting->logow)}}" alt="logo" class="img-fluid" style="height: 45px;"/>
                    @endif
                @else
                    <img src="{{url('/uploads/site_setting/'.$site_setting->logow)}}" alt="logo" class="img-fluid" style="height: 45px;"/>
                @endauth
                </span>
                </span>
            </a>
           
             <ul class="nav navbar-nav d-none d-sm-flex flex justify-content-start ml-8pt">
                 @auth
                    <li class="nav-item active">
                        <a href="{{ route('fronthome') }}" class="nav-link"> 
                        My Courses</a>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ route('editprofile',auth()->user()->id) }}" class="nav-link">My Profile</a>
                    </li>
                 @endauth
                <li class="nav-item active">
                    <a href="{{ route('fronthome') }}" class="nav-link">About Newrit</a>
                </li> 
                <li class="nav-item active">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto mr-0">
                {{-- <li class="nav-item">
                    <a href="#"
                    class="btn btn-outline-white">Asia Primary School</a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="login.php"
                    class="btn btn-outline-white">Login</a>
                </li> --}}
            </ul>
            <ul class="nav navbar-nav ml-auto mr-0">
            @if (Route::has('login'))
                @auth
                    {{-- <li class="nav-item active">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">Logout</a>
                    </li> --}}
                     <li class="nav-item">
                        <a href="#"
                        class="btn btn-outline-white">{{auth()->user()->name}}</a>
                    </li>
                    <li class="nav-item" style="margin-left: 1rem;">
                        <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-outline-white">Logout</a>
                    </li>
                @else
                        {{-- <li class="nav-item active">
                            <a href="{{ route('login') }}" class="nav-link">Log in</a>
                        </li> --}}

                    <li class="nav-item" style="margin-left: 1rem;">
                        <a href="{{ route('login') }}" class="btn btn-outline-white">Login</a>
                    </li>
                @endauth
            @endif
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </div>
      
        @if(isset($homepage))
         @include('front.include.banner')
        @endif
    </div>
</div>