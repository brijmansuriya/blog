<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item" id="dashbord-tab"> 
            <a class="nav-link" id="dashbord-tab" href="{{ route('home') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item" id="courses-tab">
            <a class="nav-link" href="{{ route('courses.index') }}"  id="courses-tab-a">
                <i class="fas fa-atlas  menu-icon"></i>
                <span class="menu-title">Courses</span>
            </a>
        </li>
        <li class="nav-item" id="category-tab">
            <a class="nav-link" href="{{ route('category.index') }}"  id="category-tab-a">
                <i class="fa-solid fa-boxes-packing menu-icon"></i>
                <span class="menu-title">Episode</span>
            </a>
        </li>
        <li class="nav-item" id="subcategory-tab">
            <a class="nav-link" href="{{ route('subcategory.index') }}"  id="subcategory-tab-a">
              <i class="fa-solid fa-box-archive menu-icon"></i>
                <span class="menu-title">Part </span>
            </a>
        </li>

        <li class="nav-item" id="storyandgame-tab">
            <a class="nav-link" href="{{ route('storyandgame.index') }}"  id="storyandgame-tab-a">
                <i class="fa-solid fa-puzzle-piece  menu-icon"></i>
                <span class="menu-title">Story & Game</span>
            </a>
        </li>
        <li class="nav-item" id="video-tab">
            <a class="nav-link" href="{{ route('video.index') }}"  id="video-tab-a">
                <i class="fa-solid fa-puzzle-piece  menu-icon"></i>
                <span class="menu-title">Video</span>
            </a>
        </li>

        <li class="nav-item" id="school-tab">
            <a class="nav-link" href="{{ route('school.index') }}"  id="school-tab-a">
                <i class="fa-solid fa-school  menu-icon"></i>
                <span class="menu-title">School</span>
            </a>
        </li>
        <li class="nav-item" id="count-tab">
            <a class="nav-link" href="{{ route('count') }}" id="count-tab-a">
                <i class="fa-solid fa-school menu-icon"></i>
                <span class="menu-title">Count</span>
            </a>
        </li>

        {{-- <li class="nav-item" id="site-tab">
            <a class="nav-link" href="{{ route('site-setting') }}" id="site-tab-a">
                <i class="fas fa-cogs menu-icon"></i>
                <span class="menu-title"> Site Setting </span>
            </a>
        </li> --}}
     
    </ul>
</nav>


