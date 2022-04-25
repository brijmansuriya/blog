<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layouts.head')
</head>
<body>
    <div id="wrapper">
        @include('admin.layouts.topbar')
        @include('admin.layouts.sidebar')
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                @include('admin.layouts.footer')
            </div>
        </div>
    </div>
    @include('admin.layouts.footer-script')
</body>
</html>