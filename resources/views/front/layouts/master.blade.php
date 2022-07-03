<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    @include('front.layouts.head')
</head>

<body class="layout-sticky-subnav layout-default ">
    <div class="mdk-header-layout js-mdk-header-layout">
            {{-- @include('front.layouts.topbar') --}}
            @include('front.layouts.sidebar')
                @yield('content')
            @include('front.layouts.footer')
    </div>
    @include('front.layouts.footer-script')
</body>

</html>
