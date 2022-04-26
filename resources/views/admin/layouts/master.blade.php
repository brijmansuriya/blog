<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.head')
</head>

<body>
    <div class="container-scroller">
        @include('admin.layouts.topbar')
        <div class="container-fluid page-body-wrapper">
            @include('admin.layouts.sidebar')
            <div class="main-panel">
                @yield('content')
                @include('admin.layouts.footer')
            </div>
        </div>
    </div>
    @include('admin.layouts.footer-script')
</body>
</html>