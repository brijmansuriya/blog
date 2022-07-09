<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-dark-pickled-bluewood sidebar-left" data-perfect-scrollbar>
            <a href="#" class="sidebar-brand ">
                <span class="avatar avatar-xl sidebar-brand-icon h-auto">
                    <span class="avatar-title rounded bg-white"><img src="{{url('/uploads/site_setting')}}/{{$site_setting->site_logo}}" class="img-fluid" alt="logo" /></span>
                </span>
            </a>


            @auth
            <div class="sidebar-heading">Teacher</div>
            <ul class="sidebar-menu">

            @foreach($sidebardata as $category)
         
                 <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse" href="#enterprise_menu">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">add_to_queue</span> {{$category->name}}
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    @foreach($category->subcategory as  $subcategorys)
                     
                        <ul class="sidebar-submenu collapse sm-indent" id="enterprise_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="">
                                    <span class="sidebar-menu-text">{{$subcategorys->name}}</span>
                                </a>
                        @foreach($subcategorys->game as  $game)
                           
                                <ul class="sidebar-submenu collapse sm-indent" id="enterprise_menu">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="">{{$game->name}}</a>
                                    </li>
                                    {{-- <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="part.php">Game</a>
                                    </li> --}}
                                </ul>
                          
                        @endforeach
                            </li>
                            {{-- <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="part.php">
                                    <span class="sidebar-menu-text">Part 2</span>
                                </a>
                            </li> --}}
                        </ul>
                   
                    @endforeach
                </li>
            @endforeach

            @endauth 
                {{-- <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse" href="#enterprise_menu">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">add_to_queue</span>
                        Language - English
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse sm-indent" id="enterprise_menu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="part.php">
                                <span class="sidebar-menu-text">Category - 1-10</span>
                            </a>

                            <ul class="sidebar-submenu collapse sm-indent" id="enterprise_menu">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="part.php">Fast</a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="part.php">Slow</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="part.php">
                                <span class="sidebar-menu-text">Part 2</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
