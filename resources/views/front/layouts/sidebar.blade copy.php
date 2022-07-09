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

            @foreach($sidebardata['categorys'] as  $category)
                 <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse" href="#enterprise_menu">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">add_to_queue</span> {{$category->name}}
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    @foreach($sidebardata['subcategorys'] as  $subcategory)
                        @if($subcategory->cid == $category->id)
                        <ul class="sidebar-submenu collapse sm-indent" id="enterprise_menu">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="{{route('subcategoryview',['category'=> $category->id,'subcategory'=>$subcategory->id])}}">
                                    <span class="sidebar-menu-text">{{$subcategory->name}}</span>
                                </a>
                        @foreach($sidebardata['storyandgames'] as  $storyandgame)
                            @if($storyandgame->scid == $subcategory->id)
                                <ul class="sidebar-submenu collapse sm-indent" id="enterprise_menu">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="{{route('storyandgameview',['category'=> $category->id,'subcategory'=>$subcategory->id,'storyandgame'=>$storyandgame->id])}}">{{$storyandgame->name}}</a>
                                    </li>
                                    {{-- <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="part.php">Game</a>
                                    </li> --}}
                                </ul>
                            @endif
                        @endforeach
                            </li>
                            {{-- <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="part.php">
                                    <span class="sidebar-menu-text">Part 2</span>
                                </a>
                            </li> --}}
                        </ul>
                        @endif
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
