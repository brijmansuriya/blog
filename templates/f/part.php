<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
<?php include('include/head.php'); ?>
   
</head>

<body class="layout-sticky-subnav layout-default ">
    <div class="preloader">
        <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>
    </div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->
        <?php include('include/header.php'); ?>

        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page-content ">

            <div class="page-section border-bottom-2">
                <div class="container page__container">
                   
                <div class="page-separator">
                        <div class="page-separator__text">Start Now</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-xl-6">
                        <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary js-overlay mdk-reveal js-mdk-reveal "
                            data-partial-height="44"
                            data-toggle="popover"
                            data-trigger="click">
                            <a href="story.php"
                            class="js-image"
                            data-position="">
                                <img src="public/images/paths/sketch_430x168.png"
                                    alt="course">
                                <span class="overlay__content align-items-start justify-content-start">
                                    <span class="overlay__action card-body d-flex align-items-center">
                                        <i class="material-icons mr-4pt">edit</i>
                                        <span class="card-title text-white">Edit</span>
                                    </span>
                                </span>
                            </a>
                            <div class="mdk-reveal__content">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex">
                                            <a class="card-title mb-4pt"
                                            href="story.php">Story</a>
                                        </div>
                                        <a href="instructor-edit-course.html"
                                        class="ml-4pt material-icons text-20 card-course__icon-favorite">edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-xl-6">
                            <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary js-overlay mdk-reveal js-mdk-reveal "
                                 data-partial-height="44"
                                 data-toggle="popover"
                                 data-trigger="click">
                                <a href="game.php"
                                   class="js-image"
                                   data-position="">
                                    <img src="public/images/paths/sketch_430x168.png"
                                         alt="course">
                                    <span class="overlay__content align-items-start justify-content-start">
                                        <span class="overlay__action card-body d-flex align-items-center">
                                            <i class="material-icons mr-4pt">edit</i>
                                            <span class="card-title text-white">Edit</span>
                                        </span>
                                    </span>
                                </a>
                                <div class="mdk-reveal__content">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex">
                                                <a class="card-title mb-4pt"
                                                   href="game.php">Game</a>
                                            </div>
                                            <a href="game.php"
                                               class="ml-4pt material-icons text-20 card-course__icon-favorite">edit</a>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
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