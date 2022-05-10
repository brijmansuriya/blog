

<!doctype html>
<html lang="en">

<head>
      @include('front.layouts.head')
</head>

<body>
    <div class="loader">
        <div class="loader-element"></div>
    </div>

        @include('front.layouts.topbar')
        @yield('content')
   
    <!--footer-->
    @include('front.layouts.footer')
    <!--Back-to-top-->
    <div class="back">
        <a href="#" class="back-top">
            <i class="las la-long-arrow-alt-up"></i>
        </a>
    </div>
   
    {{-- <div class="search">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-10 m-auto">
                    <div class="search-width">
                        <button type="button" class="close">
                            <i class="far fa-times"></i>
                        </button>
                        <form class="search-form" action="/">
                            <input type="search" value="" placeholder="What are you looking for?">
                            <button type="submit" class="search-btn"> search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
      @include('front.layouts.footer-script')
</body>

</html>