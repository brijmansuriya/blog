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
                                    <i class="material-icons progression-bar__item-icon"></i>
                                    <span class="progression-bar__item-text h5 mb-0 text-uppercase">Teacher Registration details</span>
                            </span>
                       
                        </div>
                    </div>
                </div>


<div class="pt-32pt pt-sm-64pt pb-32pt">
    <div class="container page__container">
    <form action="signup-payment.html">
                                    <div class="form-group">
                                        <label class="form-label"
                                               for="name">Your first and last name:</label>
                                        <input id="name"
                                               type="text"
                                               class="form-control"
                                               placeholder="Your first and last name ...">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label"
                                               for="email">Your email:</label>
                                        <input id="email"
                                               type="email"
                                               class="form-control"
                                               placeholder="Your email address ...">
                                    </div>
                                    <div class="form-group mb-24pt">
                                        <label class="form-label"
                                               for="password">Password:</label>
                                        <input id="password"
                                               type="password"
                                               class="form-control"
                                               placeholder="Your password ...">
                                    </div>
                                    <button class="btn btn-primary">Create account</button>
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