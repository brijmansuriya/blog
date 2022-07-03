<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
        <div class="mdk-drawer__content">
            <div class="sidebar sidebar-dark-pickled-bluewood sidebar-left" data-perfect-scrollbar>
                <!-- Sidebar Content -->
                <a href="#" class="sidebar-brand ">
                    <span class="avatar avatar-xl sidebar-brand-icon h-auto">
                        <span class="avatar-title rounded bg-primary"><img
                                src="{{url('/uploads/site_setting')}}/{{$site_setting->site_logo}}" class="img-fluid"
                                alt="logo" /></span>
                    </span>
                    <span>{{$site_setting->site_title}}</span>
                </a>
                <div class="sidebar-heading">Admin</div>
                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item active">
                        <a class="sidebar-menu-button" href="{{ route('home') }}">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">home</span>
                            <span class="sidebar-menu-text">Home</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item active">
                        <a class="sidebar-menu-button" href="{{ route('category.index') }}">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">donut_large</span>
                            <span class="sidebar-menu-text">Category</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item ">
                        <a class="sidebar-menu-button" href="{{ route('home') }}">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">donut_large</span>
                            <span class="sidebar-menu-text">Sub Category</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse"
                            href="#enterprise_menu">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">donut_large</span>
                            Part 1
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse sm-indent" id="enterprise_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{ route('home') }}">
                                    <span class="sidebar-menu-text">Episode 1</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{ route('home') }}">
                                    <span class="sidebar-menu-text">Episode 2</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse"
                            href="#enterprise_menu">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">donut_large</span>
                            Part 2
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse sm-indent" id="enterprise_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{ route('home') }}">
                                    <span class="sidebar-menu-text">Episode 1</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{ route('home') }}">
                                    <span class="sidebar-menu-text">Episode 2</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
