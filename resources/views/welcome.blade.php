<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" sizes="16x16" href="assets/img/favicon.png">
    <title> Blog</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">
</head>

<body>
    <div class="loader">
        <div class="loader-element"></div>
    </div>
    <header class="header navbar-expand-lg fixed-top ">
        <div class="container-fluid ">
            <div class="header-area ">
                <!--logo-->
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset('frontend/assets/img/logo/logo-dark.png') }}" alt="" class="logo-dark">
                        <img src="{{ asset('frontend/assets/img/logo/logo-white.png') }}" alt=""
                            class="logo-white">
                    </a>
                </div>
                <!--/-->
                <div class="header-navbar">
                    <nav class="navbar">
                        <!--navbar-collapse-->
                        <div class="collapse navbar-collapse" id="main_nav">
                            <ul class="navbar-nav ">
                                <li class="nav-item">
                                    <a class="nav-link" href="/"> Home </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('blog') }}"> Blog </a>
                                </li>
                            </ul>
                        </div>
                        <!--/-->
                    </nav>
                </div>
                <!--header-right-->
                <div class="header-right">
                    <!--theme-switch-->
                    {{-- <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox" />
                            <span class="slider round ">
                                <i class="lar la-sun icon-light"></i>
                                <i class="lar la-moon icon-dark"></i>
                            </span>
                        </label>
                    </div> --}}
                    <!--search-icon-->
                    <div class="search-icon">
                        <i class="las la-search"></i>
                    </div>

                    <!--button-subscribe-->
                    <div class="botton-sub">
                        <a href="/" class="btn-subscribe">subscribe</a>
                    </div>

                    <!--navbar-toggler-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <!--section-scroll-->
    <div class="section-scroll wrapper-full no-margin">
        <div class="container-fluid">
            <div class="section-scroll-marquee">
                <div class="marquee page-title">***********Latest Blog Post*********</div>
            </div>
        </div>
    </div>
    <!--Blog-home-->
    <section class="blog-home6">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 ">
                    <!--post1-->
                    <div class="post-list post-list-style4">
                        <div class="post-list-image">
                            <a href="/">
                                <img class="img-br" src="{{ asset('frontend/assets/img/blog/21.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="post-list-content">
                            <ul class="entry-meta">
                                <li class="entry-cat">
                                    <a href="/" class="category-style-1">Branding</a>
                                </li>
                                <li class="post-date"> <span class="line"></span> february 10 ,2022</li>
                            </ul>
                            <h4 class="entry-title">
                                <a href="/">Products are made in a factory but brands are created</a>
                            </h4>
                            <div class="post-btn">
                                <a href="/" class="btn-read-more">Continue Reading <i
                                        class="las la-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                        <div class="post-list-exerpt">
                            <div class="post-exerpt">
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Sapiente nesciunt dicta minima iure ducimus id fugit tenetur qui quo eum pariatur
                                    suscipit rerum minus deserunt,
                                    obcaecati, quidem libero. Quis officiis maiores quia distinctio tempore natus,
                                </p>
                            </div>
                        </div>
                    </div>

                    <!--post2-->
                    <div class="post-list post-list-style4">
                        <div class="post-list-image">
                            <a href="/">
                                <img class="img-br" src="{{ asset('frontend/assets/img/blog/21.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="post-list-content">
                            <ul class="entry-meta">
                                <li class="entry-cat">
                                    <a href="/" class="category-style-1">marketing</a>
                                </li>
                                <li class="post-date"> <span class="line"></span> february 10 ,2022</li>
                            </ul>
                            <h4 class="entry-title">
                                <a href="/">The best marketing doesn't feel like marketing</a>
                            </h4>
                            <div class="post-btn">
                                <a href="/" class="btn-read-more">Continue Reading <i
                                        class="las la-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                        <div class="post-list-exerpt">
                            <div class="post-exerpt">
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Sapiente nesciunt dicta minima iure ducimus id fugit tenetur qui quo eum pariatur
                                    suscipit rerum minus deserunt,
                                    obcaecati, quidem libero. Quis officiis maiores quia distinctio tempore natus,
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--pagination-->
                    {{-- <div class="pagination">
                        <div class="pagination-area">
                            <div class="pagination-list">
                                <ul class="list-inline">
                                    <li><a href="#"><i class="las la-arrow-left"></i></a></li>
                                    <li><a href="#" class="active">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#"><i class="las la-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    <!--/-->
                </div>
            </div>
        </div>
    </section>
    <!--footer-->
    <div class="footer">
        <div class="footer-area">
            <div class="footer-area-content">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-md-3">
                            <div class="menu">
                                <h6>Menu</h6>
                                <ul>
                                    <li><a href="#">Homepage</a></li>
                                    <li><a href="#">about us</a></li>
                                    <li><a href="#">contact us</a></li>
                                    <li><a href="#">privarcy</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--newslatter-->
                        <div class="col-md-6">
                            <div class="newslettre">
                                <div class="newslettre-info">
                                    <h3>Subscribe To OurNewsletter</h3>
                                    <p>Sign up for free and be the first to get notified about new posts.</p>
                                </div>

                                <form action="#" class="newslettre-form">
                                    <div class="form-flex">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Your Email Adress"
                                                required="required">
                                        </div>
                                        <button class="submit-btn" type="submit">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--/-->
                        <div class="col-md-3">
                            <div class="menu">
                                <h6>Follow us</h6>
                                <ul>
                                    <li><a href="#">facebook</a></li>
                                    <li><a href="#">instagram</a></li>
                                    <li><a href="#">youtube</a></li>
                                    <li><a href="#">twitter</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer-copyright-->
            <div class="footer-area-copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyright">
                                <p>© 2022, AssiaGroupe, All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/-->
        </div>
    </div>
    <!--Back-to-top-->
    <div class="back">
        <a href="#" class="back-top">
            <i class="las la-long-arrow-alt-up"></i>
        </a>
    </div>
    <!--Search-form-->
    <div class="search">
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
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <!-- JS Plugins  -->
    <script src="{{ asset('frontend/assets/js/theia-sticky-sidebar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/ajax-contact.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/switch.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.marquee.js') }}"></script>
    <!-- JS main  -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
</body>

</html>
