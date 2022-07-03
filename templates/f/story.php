<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <?php include('include/head.php'); ?>
</head>

<body class="layout-sticky-subnav layout-default ">
    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">
        <!-- Header -->
        <?php include('include/header.php'); ?>
        <!-- // END Header -->
        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page-content ">

               
                <div class="bg-primary pb-lg-64pt py-32pt">
                    <div class="container page__container">
                        
                        <div class="js-player embed-responsive embed-responsive-16by9 mb-32pt">
                            <div class="player embed-responsive-item">
                                <div class="player__content">
                                    <div class="player__image"
                                         style="--player-image: url(public/images/illustration/player.svg)"></div>
                                    <a href=""
                                       class="player__play bg-primary">
                                        <span class="material-icons">play_arrow</span>
                                    </a>
                                </div>
                                <div class="player__embed d-none">
                                    <iframe class="embed-responsive-item"
                                            src="https://player.vimeo.com/video/97243285?title=0&amp;byline=0&amp;portrait=0"
                                            allowfullscreen=""></iframe>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap align-items-end mb-16pt">
                            <h1 class="text-white flex m-0">Introduction to Day 2 Day English</h1>
                            <p class="h1 text-white-50 font-weight-light m-0">50:13</p>
                        </div>

                        <p class="hero__lead measure-hero-lead text-white-50 mb-24pt">day2day is now used to power backends, create hybrid mobile applications, architect cloud solutions, design neural networks and even control robots. Enter TypeScript: a superset of JavaScript for scalable, secure, performant and feature-rich applications.</p>

                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-start">
                            <a href="#"
                               class="btn btn-outline-white mb-16pt mb-sm-0 mr-sm-16pt">Watch Next <i class="material-icons icon--right">play_circle_outline</i></a>
                            <a href="#"
                               class="btn btn-white">Go Back</a>
                        </div>
                    </div>
                </div>
               

            </div>
        <!-- // END Header Layout Content -->
        <!-- Footer -->
        <?php include('include/footer.php'); ?>
        <!-- // END Footer -->
    </div>
    <!-- // END Header Layout -->
    <!-- Drawer -->
    <?php include('include/sidebar.php'); ?>
    <?php include('include/footerjs.php'); ?>
</body>

</html>