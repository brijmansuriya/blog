<!doctype html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- favicon -->
    <link rel="icon" sizes="16x16" href="{{ asset('frontend/assets/img/favicon.png') }}">

    <!-- Title -->
    <title>  Blog  </title>
  
    <!-- CSS Plugins -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css') }}">

    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">
</head>

<body>
    <!--loading -->
    <div class="loader">
        <div class="loader-element"></div>
      </div>

     <!-- Header-->
     <header class="header navbar-expand-lg fixed-top ">
        <div class="container-fluid ">
            <div class="header-area ">
                <!--logo-->
                <div class="logo">
                    <a href="index.html">
                        <img src="{{ asset('frontend/assets/img/logo/logo-dark.png') }}" alt="" class="logo-dark">
                        <img src="{{ asset('frontend/assets/img/logo/logo-white.png') }}" alt="" class="logo-white">
                    </a>
                </div>
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
                <div class="header-right ">
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

                        <!--button-subsvribe-->
                    <div class="botton-sub">
                        <a href="signup.html" class="btn-subscribe">subscribe</a>
                    </div>
                        <!--navbar-toggler-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </div> 
    </header>

    <!--post-single-->
    <section class="post-single post-single-layout-2">
        <div class="post-single-image">
            <img src="{{ asset('frontend/assets/img/blog/lg-1.jpg') }}" style="height: 200px;width: 100%;" alt="">
        </div>
           
        <div class="container-fluid">
            <div class="row">
                <!--content-->
                <div class="col-lg-8 oredoo-content">
                    <div class="theiaStickySidebar">
                             <!--post-single-title-->
                             <div class="post-single-title">  
                                <h3> Brand is just a perception, and perception will match reality over time</h3>        
                                <ul class="entry-meta">
                                    <li class="post-author-img"><img src="{{ asset('frontend/assets/img/author/1.jpg') }}" alt=""></li>
                                    <li class="post-author"> <a href="author.html">Meriam Smith</a></li>
                                    <li class="entry-cat"> <a href="blog-layout-1.html" class="category-style-1"> <span class="line"></span> Livestyle</a></li>
                                    <li class="post-date"> <span class="line"></span> february 10 ,2022</li>
                                </ul>
                                
                            </div>

                            <!--post-single-content-->
                            <div class="post-single-content">
                                <p>
                                    Its sometimes her behaviour are contented. Do listening am eagerness oh objection collected. Together gay feelings continue
                                    juvenile had off Unknown may service 
                                    subject her letters one bed. Child years noise ye in forty. Loud in this in both
                                    hold. My entrance me is disposal bachelor remember relation
                                </p>
                                <h4> Make it simple, but significant. </h4>

                                <p>
                                    Oh acceptance apartments up sympathize astonished delightful. Waiting him new lasting towards. Continuing melancholy especially
                                    so to. Me unpleasing  impossible in attachment announcing so astonished. What ask leaf may nor upon door. Tended remain
                                    my do stairs. Oh smiling amiable am so visited cordial in offices hearted.
                                </p>
                            
                                <p>
                                    Oh acceptance apartments up sympathize astonished delightful. Waiting him new lasting towards. Continuing melancholy especially
                                    so to. Me unpleasing impossible in attachment announcing so astonished. What ask leaf may nor upon door. Tended remain
                                    my do stairs. Oh smiling amiable am so visited cordial in offices hearted.
                                        Oh acceptance apartments up sympathize astonished delightful. Waiting him new lasting towards. Continuing melancholy especially
                                    so to. Me unpleasing impossible in attachment announcing so astonished. What ask leaf may nor upon door. Tended remain my
                                    do stairs. Oh smiling amiable am so visited cordial in offices hearted.
                                        Waiting him new lasting towards. Continuing melancholy especially so to. Me unpleasing impossible in attachment announcing
                                    so astonished. What ask leaf may nor upon door. Tended remain my do stairs.
                                    
                                Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                    in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                    in culpa qui officia
                                    deserunt mollit anim id est laborum.
                                </p>
                                <h4>  Simplicity is the ultimate sophistication</h4>
                            
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                    cupidatat non proident.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                    non proident.
                                </p>
                                <div class="image-groupe">
                                    <div class="image">
                                        <img src="{{ asset('frontend/assets/img/blog/25.jpg') }}" alt="">
                                
                                    </div>
                                    <div class="image">
                                        <img src="{{ asset('frontend/assets/img/blog/21.jpg') }}" alt="">
                                        
                                    </div>
                                </div>
                        
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor Unknown may service in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                    cupidatat non proident.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                    dolor Unknown may service in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                                    occaecat cupidatat non proident.
                                </p>
                                
                                <div class="quote">
                                    <div>
                                        <i class="las la-quote-left"></i>
                                    </div>
                                    <div>
                                        <p>
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam corrupti voluptatum, tenetur tempore suscipit veniam molestiae
                                            exercitationem, praesentium ea molestias doloremque alias voluptatibus fuga quibusdam placeat aspernatur, harum
                                            blanditiis iure.
                                        </p>
                                        <small>Henry David Thoreau.</small>
                                    </div>

                                </div>
                            
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                    cupidatat non proident.
                                </p>
                                <h4> Leave it better than you found it </h4>
                                
                                <p>
                                    Oh acceptance apartments up sympathize astonished delightful. Waiting him new lasting towards. Continuing melancholy especially
                                    so to. Me unpleasing impossible in attachment announcing so astonished. What ask leaf may nor upon door. Tended remain
                                    my do stairs. Oh smiling amiable am so visited cordial in offices hearted.
                                </p>
                                <div class="image-groupe">
                                    <div class="image">
                                        <img src="{{ asset('frontend/assets/img/blog/13.jpg') }}" alt="">
                                
                                    </div>
                                    <div class="image">
                                        <img src="{{ asset('frontend/assets/img/blog/3.jpg') }}" alt="">
                                        
                                    </div>
                                       <div class="image">
                                            <img src="{{ asset('frontend/assets/img/blog/11.jpg') }}" alt="">
                                        </div>
                                </div>
                                        
                                <p>
                                    Oh acceptance apartments up sympathize astonished delightful. Waiting him new lasting towards. Continuing melancholy especially
                                    so to. Me unpleasing impossible in attachment announcing so astonished. What ask leaf may nor upon door.
                                    Tended remain my do stairs. Oh smiling amiable am so visited cordial in offices hearted. Oh acceptance apartments
                                    up sympathize astonished delightful. Waiting him new lasting towards. Continuing melancholy especially so
                                    to. Me unpleasing impossible in attachment announcing so astonished. What ask leaf may nor upon door. Tended
                                    remain my do stairs. Oh smiling amiable am so visited cordial in offices hearted. Waiting him new lasting
                                    towards. Continuing melancholy especially so to. Me unpleasing impossible in attachment announcing so astonished.
                                    What ask leaf may nor upon door. Tended remain my do stairs.
                                Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                    in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                    in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                            
                                <ul class="list">
                                    <li>Digital design is like painting, except the paint never dries. </li>
                                    <li>Creativity is only as obscure as your reference</li>
                                    <li>Whitespace is like air: it is necessary for design to breathe.</li>
                                    <li>You don’t have to be ‘a creative’ to be creative.</li>
                                    <li>The best way to predict the future is to create it</li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat 
                                    nulla pariatur.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                </p>
                            </div>
                            
                            <!--post-single-bottom-->
                            <div class="post-single-bottom"> 
                                <div class="tags">
                                    <p>Tags:</p>
                                    <ul class="list-inline">
                                        <li >
                                            <a href="blog-layout-2.html">brading</a>
                                        </li>
                                        <li >
                                            <a href="blog-layout-2.html">marketing</a>
                                        </li>
                                        <li >
                                            <a href="blog-layout-3.html">tips</a>
                                        </li>
                                        <li >
                                            <a href="blog-layout-4.html">design</a>
                                        </li>
                                        <li >
                                            <a href="blog-layout-5.html">business
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="social-media">
                                    <p>Share on :</p>
                                    <ul class="list-inline">
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" >
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" >
                                                <i class="fab fa-pinterest"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>                      
                            </div>

                            <!--post-single-author-->
                            <div class="post-single-author ">
                                <div class="authors-info">
                                    <div class="image">
                                        <a href="author.html" class="image">
                                            <img src="{{ asset('frontend/assets/img/author/1.jpg') }}" alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h4>sarah smith</h4>
                                        <p> Etiam vitae dapibus rhoncus. Eget etiam aenean nisi montes felis pretium donec veni. Pede vidi condimentum et aenean hendrerit.
                                            Quis sem justo nisi varius.
                                        </p>
                                        <div class="social-media">
                                            <ul class="list-inline">
                                                <li>
                                                    <a href="#">
                                                        <i class="fab fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fab fa-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" >
                                                        <i class="fab fa-youtube"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" >
                                                        <i class="fab fa-pinterest"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <!--post-single-Related posts-->
                             <div class="post-single-next-previous">
                                <div class="row ">
                                    <!--prevvious post-->
                                    <div class="col-md-6">
                                        <div class="small-post">
                                            <div class="small-post-image">
                                                <a href="post-single.html">
                                                    <img src="{{ asset('frontend/assets/img/blog/1.jpg') }}" alt="...">
                                                </a>
                                            </div>
                            
                                            <div class="small-post-content">
                                            <small>  <a href="post-single.html"> <i class="las la-arrow-left"></i>Previous post</a></small>
                                            <p>
                                                <a href="post-single.html">You can’t build a reputation on what you are going to do.</a>
                                            </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/-->

                                    <!--next post-->
                                    <div class="col-md-6">
                                        <div class="small-post">
                                            <div class="small-post-image">
                                                <a href="post-single.html">
                                                    <img src="{{ asset('frontend/assets/img/blog/2.jpg') }}" alt="...">
                                                </a>
                                            </div>
                            
                                            <div class="small-post-content">
                                                <small> <a href="post-single.html">Next post <i class="las la-arrow-right"></i></a> </small>
                                                <p>
                                                    <a href="post-single.html">Brand yourself for the career you want, not the job you have</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/-->
                                </div>
                            </div>
                            <!--post-single-Ads-->
                            <div class="post-single-ads ">
                                <div class="ads">
                                    <img src="{{ asset('frontend/assets/img/ads/ads.jpg') }}" alt="">
                                </div>
                            </div>
                            
                            <!--post-single-comments-->
                            <div class="post-single-comments">
                                <!--Comments-->
                                <h4 >3 Comments</h4>
                                <ul class="comments">
                                    <!--comment1-->
                                    <li class="comment-item pt-0">
                                        <img src="{{ asset('frontend/assets/img/other/user1.jpg') }}" alt="">
                                        <div class="content">
                                            <div class="meta">
                                                <ul class="list-inline">
                                                    <li><a href="#">Nirmaine Nicole</a> </li>
                                                    <li class="slash"></li>
                                                    <li>3 Months Ago</li>
                                                </ul>
                                            </div>
                                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus at doloremque adipisci eum placeat
                                                quod non fugiat aliquid sit similique!
                                            </p>
                                            <a href="#" class="btn-reply"><i class="las la-reply"></i> Reply</a>
                                        </div>
                                
                                    </li>
                                    <!--comment2-->
                                    <li class="comment-item">
                                        <img src="{{ asset('frontend/assets/img/other/use2.jpg') }}" alt="">
                                        <div class="content">
                                            <div class="meta">
                                                <ul class="list-inline">
                                                    <li><a href="#">adam smith</a> </li>
                                                    <li class="slash"></li>
                                                    <li>3 Months Ago</li>
                                                </ul>
                                            </div>
                                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus at doloremque adipisci eum placeat
                                                quod non fugiat aliquid sit similique!
                                            </p>
                                            <a href="#" class="btn-reply"><i class="las la-reply"></i> Reply</a>
                                        </div>
                                    </li>
                                       <!--comment3-->
                                    <li class="comment-item">
                                        <img src="{{ asset('frontend/assets/img/other/user3.jpg') }}" alt="">
                                        <div class="content">
                                            <div class="meta">
                                                <ul class="list-inline">
                                                    <li><a href="#">Emma david</a> </li>
                                                    <li class="slash"></li>
                                                    <li>3 Months Ago</li>
                                                </ul>
                                            </div>
                                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus at doloremque adipisci eum placeat
                                                quod non fugiat aliquid sit similique!
                                            </p>
                                            <a href="#" class="btn-reply"><i class="las la-reply"></i> Reply</a>
                                        </div>
                                    </li>
                                
                                </ul>
                                <!--Leave-comments-->
                              
                            </div>
                   </div>
                </div>

                <!--sidebar-->
                <div class="col-lg-4 oredoo-sidebar">
                    <div class="theiaStickySidebar">
                        <div class="sidebar">
                            <!--search-->
                           
 
                            <!--categories-->
                            <div class="widget ">
                                <div class="widget-title">
                                    <h5>Categories</h5>
                                </div>
                                <div class="widget-categories">
                                    <a class="category-item" href="#">
                                        <div class="image">
                                            <img src="{{ asset('frontend/assets/img/categories/1.jpg') }}" alt="">
                                        </div>
                                        
                                        <p>Design   </p>
                                    </a>
                        
                                    <a class="category-item" href="#">
                                        <div class="image">
                                            <img src="{{ asset('frontend/assets/img/categories/2.jpg') }}" alt="">
                                        </div>
                                        <p>Branding </p>
                                    </a>
                            
                                    <a class="category-item" href="#">
                                        <div class="image">
                                            <img src="{{ asset('frontend/assets/img/categories/3.jpg') }}" alt="">
                                        </div>
                                        <p>marketing </p>
                                    </a>
                            
                                    <a class="category-item" href="#">
                                        <div class="image">
                                            <img src="{{ asset('frontend/assets/img/categories/4.jpg') }}" alt="">
                                        </div>
                                        <p>food </p>
                                    </a>
                        
                                    <a class="category-item" href="#">
                                        <div class="image">
                                            <img src="{{ asset('frontend/assets/img/categories/5.jpg') }}" alt="">
                                        </div>
                                        <p>technology </p>
                                    </a>
                            
                                    <a class="category-item" href="#">
                                        <div class="image">
                                            <img src="{{ asset('frontend/assets/img/categories/6.jpg') }}" alt="">
                                        </div>
                                        <p>fashion </p>
                                    </a>
                        
                                    <a class="category-item" href="#">
                                        <div class="image">
                                            <img src="{{ asset('frontend/assets/img/categories/7.jpg') }}" alt="">
                                        </div>
                                        <p>mobile </p>
                                    </a>
                        
                                    <a class="category-item" href="#">
                                        <div class="image">
                                            <img src="{{ asset('frontend/assets/img/categories/8.jpg') }}" alt="">
                                        </div>
                                        <p>livestyle</p>
                                    </a>
                        
                                    <a class="category-item" href="#">
                                        <div class="image">
                                            <img src="{{ asset('frontend/assets/img/categories/9.jpg') }}" alt="">
                                        </div>
                                        <p>healty </p>
                                    </a>
                                </div>
                            </div>

                            <!--newslatter-->
                           

                            <!--stay connected-->
                            <div class="widget ">
                                <div class="widget-title">
                                    <h5>Stay connected</h5>
                                </div>
                                
                                <div class="widget-stay-connected">
                                    <div class="list">
                                        <div class="item color-facebook">
                                            <a href="#"><i class="fab fa-facebook"></i></a>
                                            <p>Facebook 12k</p>
                                        </div>

                                        <div class="item color-instagram">
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                            <p>instagram 102k</p>
                                        </div>

                                        <div class="item color-twitter">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            <p>twitter 22k</p>
                                        </div>

                                        <div class="item color-youtube">
                                            <a href="#"><i class="fab fa-youtube"></i></a>
                                            <p>Youtube 120k</p>
                                        </div>

                                        <div class="item color-dribbble">
                                            <a href="#"><i class="fab fa-dribbble"></i></a>
                                            <p>dribbble 17k</p> 
                                        </div>

                                        <div class="item color-pinterest">
                                            <a href="#"><i class="fab fa-pinterest"></i></a>
                                            <p>pinterest 10k</p> 
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--Tags-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Tags</h5>
                                </div>
                                <div class="tags">
                                    <ul class="list-inline">
                                        <li>
                                            <a href="#">Travel</a>
                                        </li>
                                        <li>
                                            <a href="#">Nature</a>
                                        </li>
                                        <li>
                                            <a href="#">tips</a>
                                        </li>
                                        <li>
                                            <a href="#">forest</a>
                                        </li>
                                        <li>
                                            <a href="#">beach</a>
                                        </li>
                                        <li>
                                            <a href="#">fashion</a>
                                        </li>
                                        <li>
                                            <a href="#">livestyle</a>
                                        </li>
                                        <li>
                                            <a href="#">healty</a>
                                        </li>
                                        <li>
                                            <a href="#">food</a>
                                        </li>
                                        <li>
                                            <a href="#">interior</a>
                                        </li>
                                        <li>
                                            <a href="#">branding</a>
                                        </li>
                                        <li>
                                            <a href="#">web</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
        
                            <!--popular-posts-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>popular Posts</h5>
                                </div>
                            
                                <ul class="widget-popular-posts">
                                    <!--post1-->
                                    <li class="small-post">
                                        <div class="small-post-image">
                                            <a href="post-single.html">
                                                <img src="{{ asset('frontend/assets/img/blog/1.jpg') }}" alt="">
                                                <small class="nb">1</small>
                                            </a>
                                        </div>
                                        <div class="small-post-content">
                                            <p>
                                                <a href="post-single.html">Everything is designed. Few things are designed well.</a>
                                            </p>
                                            <small> <span class="slash"></span>3 mounth ago</small>
                                        </div>
                                    </li>
                                    <!--post2-->
                                    <li class="small-post">
                                        <div class="small-post-image">
                                            <a href="post-single.html">
                                                <img src="{{ asset('frontend/assets/img/blog/5.jpg') }}" alt="">
                                                <small class="nb">2</small>
                                            </a>
                                        </div>
                                        <div class="small-post-content">
                                            <p>
                                                <a href="post-single.html">Brand yourself for the career you want, not the job you </a>
                                            </p>
                                            <small> <span class="slash"></span>3 mounth ago</small>
                                        </div>
                                    </li>
                                   
                                    <!--post3-->
                                    <li class="small-post">
                                        <div class="small-post-image">
                                            <a href="post-single.html">
                                                <img src="{{ asset('frontend/assets/img/blog/13.jpg') }}" alt="">
                                                <small class="nb">3</small>
                                            </a>
                                        </div>
                                        <div class="small-post-content">
                                            <p>
                                                <a href="post-single.html">It’s easier to ask forgiveness than it is to get permission.</a>
                                            </p>
                                            <small> <span class="slash"></span> 3 mounth ago</small>
                                        </div>
                                    </li>
                                   
                                    <!--post4-->
                                    <li class="small-post">
                                        <div class="small-post-image">
                                            <a href="post-single.html">
                                                <img src="{{ asset('frontend/assets/img/blog/16.jpg') }}" alt="">
                                                <small class="nb">4</small>
                                            </a>
                                        </div>
                                        <div class="small-post-content">
                                            <p>
                                                <a href="post-single.html">All happiness depends on a leisurely breakfast</a>
                                            </p>
                                            <small> <span class="slash"></span>3 mounth ago</small>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            
                            <!--Ads-->
                            {{-- <div class="widget">
                                <div class="widget-ads">
                                    <img src="{{ asset('frontend/assets/img/ads/ads2.jpg') }}" alt="">
                                </div>
                            </div> --}}
                         </div>
                   </div>
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
                                            <input type="email" class="form-control" placeholder="Your Email Adress" required="required">
                                        </div>
                                        <button class="submit-btn" type="submit">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!--newslatter-->
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyright">
                            <p>© 2022,  AssiaGroupe, All Rights Reserved.</p>
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
        <div class="container-fluid">
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
    <script  src="{{ asset('frontend/assets/js/theia-sticky-sidebar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/ajax-contact.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/switch.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.marquee.js') }}"></script>
    
    <!-- JS main  -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

</body>

</html>