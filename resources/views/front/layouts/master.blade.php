
  
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    @include('front.layouts.head')
</head>
<body class="layout-sticky-subnav layout-default ">
    <div class="mdk-header-layout js-mdk-header-layout">
        @include('front.include.homeheader')
        {{-- @include('front.layouts.topbar') --}}
        <div class="mdk-header-layout__content page-content ">
            @yield('content')
        </div>
        @include('front.layouts.footer')
    </div>
    @include('front.layouts.sidebar')
    @include('front.layouts.footer-script')
</body>
</html>
