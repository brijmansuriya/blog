<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('category.index') }}">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Category</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('posts.index') }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Post</span>
            </a>
        </li>
        <li class="nav-item" id="site-tab">
            <a class="nav-link" href="{{ route('site-setting') }}" id="site-tab-a">
                <i class="fas fa-cogs menu-icon"></i>
                <span class="menu-title"> Site Setting </span>
            </a>
        </li>
    </ul>
</nav>
