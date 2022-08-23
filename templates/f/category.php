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
            <div class="container page__container page-section">

            
                <div class="row mb-32pt">
                    <div class="col-lg-8 d-flex align-items-center">
                        <div class="flex" style="max-width: 100%">
                            <div class="form-group">
                                <label class="form-label" for="exampleInputEmail1">Category Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter your category name ..">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
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