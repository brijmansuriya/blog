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
     <div class="py-32pt navbar-submenu">
                            <div class="container page__container">
                                <div class="progression-bar progression-bar--active-accent">
                                    <span class="progression-bar__item-content">
                                            
                                            <span class="progression-bar__item-text h5 mb-0 text-uppercase">Teacher LOGIN details</span>
                                    </span>
                            
                                </div>
                            </div>
                        </div>

<div class="pt-32pt pt-sm-64pt pb-32pt">

        

    <div class="container page__container">
        <form action="index.php"
              class="col-md-5 p-0 mx-auto">
            <div class="form-group">
                <label class="form-label"
                       for="email">Email:</label>
                <input id="email"
                       type="text"
                       class="form-control"
                       placeholder="Your email address ...">
            </div>
            <div class="form-group">
                <label class="form-label"
                       for="password">Password:</label>
                <input id="password"
                       type="password"
                       class="form-control"
                       placeholder="Your first and last name ...">
                <p class="text-right"><a href="reset-password.html"
                       class="small">Forgot your password?</a></p>
            </div>
            <div class="text-center">
                <button class="btn btn-primary">Login</button>
            </div>
        </form>
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