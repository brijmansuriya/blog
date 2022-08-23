<div class="mdk-drawer js-mdk-drawer" id="default-drawer" @if(isset($deropdwuan)) {{$deropdwuan}} @endif>
    <div class="mdk-drawer__content" style="margin-top:65px">
        <div class="sidebar sidebar-dark-pickled-bluewood sidebar-left" data-perfect-scrollbar>
            <a href="#" class="sidebar-brand ">
                <span class="avatar avatar-xl sidebar-brand-icon h-auto">
                    <span class="rounded"><img src="{{url('/uploads/site_setting')}}/{{$site_setting->logob}}" class="img-fluid" alt="logo" /></span>
                </span>
            </a>
            @auth
            <div class="sidebar-heading"> <?php 
           if(\Session::has('course_id')){
            $course_id =  App\Helpers\SidebarHelper::getCourses(\Session::get('course_id'));
           }
             ?>{{ $course_id ?? ''}}</div>
            <ul class="sidebar-menu">
             @if(isset($sidebardata))
                @foreach($sidebardata as $episod)
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button js-sidebar-collapse" data-toggle="collapse" href="#enterprise_menu_<?=$episod->id?>">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">add_to_queue</span>{{ $episod->name}}
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse sm-indent" id="enterprise_menu_<?=$episod->id?>">
                        @foreach($episod->subcategory as $part)
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="{{ route('partview',$part->id) }}">
                                <span class="sidebar-menu-text">{{ $part->name}}</span>
                            </a>
                            <ul class="sidebar-submenu collapse sm-indent" id="enterprise_menu_<?=$episod->id?>">
                                @foreach($part->game as $subpart)
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="{{ route('gameandstory',$subpart->id) }}">{{ $subpart->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>

                </li>
                @endforeach
              @endif
            </ul>
            @endauth
            </ul>
        </div>
    </div>
</div>

<script>
$('li.sidebar-submenu a').on('click', function (event) {
    $(this).parent().toggleClass('close');
});
</script>




























