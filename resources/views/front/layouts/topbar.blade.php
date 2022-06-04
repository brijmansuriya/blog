
    <header class="header navbar-expand-lg fixed-top ">
        <div class="container-fluid ">
            <div class="header-area ">
                <!--logo-->
                <div class="logo">
                    <a href="/">
                        <img src="{{url('/uploads/site_setting')}}/{{$site_setting->site_logo}}" alt="" class="logo-dark">
                        <img src="{{url('/uploads/site_setting')}}/{{$site_setting->site_logo}}" alt=""
                            class="logo-white">
                    </a>
                </div>
                <!--/-->
                <div class="header-navbar">
                    <nav class="navbar">
                        <!--navbar-collapse-->
                        <div class="collapse navbar-collapse" id="main_nav">
                            <ul class="navbar-nav ">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/')}}"> Home </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about') }}"> About </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('team') }}"> Team </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact') }}"> Contact </a>
                                </li>
                                
                            </ul>
                        </div>
                        <!--/-->
                    </nav>
                </div>
                <!--header-right-->
                <div class="header-right">
                    <!--theme-switch-->
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox" />
                            <span class="slider round ">
                                <i class="lar la-sun icon-light"></i>
                                <i class="lar la-moon icon-dark"></i>
                            </span>
                        </label>
                    </div>
                    <!--search-icon-->
                    <!--<div class="search-icon">-->
                    <!--    <i class="las la-search"></i>-->
                    <!--</div>-->

                    <!--button-subscribe-->
                    <div class="botton-sub">
                        <a href="{{ route('contactus') }}" class="btn-subscribe">Contact Us</a>
                    </div>

                    <!--navbar-toggler-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </header>
