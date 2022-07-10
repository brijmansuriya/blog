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
                <li class="sidebar-menu-item">
                @foreach($category1 as $category)
                    <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse" href="#enterprise_menu">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">add_to_queue</span>{{$category->name}}
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse sm-indent" id="enterprise_menu">
                        <li class="sidebar-menu-item">
                        @foreach($subcategory1 as $subcategory)
                            <a class="sidebar-menu-button" href="part.php">
                                <span class="sidebar-menu-text">{{$subcategory->name}}</span>
                            </a>
                            <ul class="sidebar-submenu collapse sm-indent" id="enterprise_menu">
                                <li class="sidebar-menu-item">
                                    @foreach($storyandgame1 as $storyandgame)
                                        <a class="sidebar-menu-button" href="{{route('subcategoryview',['category'=> $category->id,'subcategory'=>$subcategory->id])}}">{{$storyandgame->name}}</a>
                                    @endforeach
                                </li>
                            </ul>
                        @endforeach
                        </li>
                    </ul>
                @endforeach
                </li>
            </ul>
            @endauth
            </ul>
        </div>
    </div>
</div>
