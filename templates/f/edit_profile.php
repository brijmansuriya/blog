<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <?php include('include/head.php'); ?>
    </head>

    <body class="layout-sticky-subnav layout-default">
        <!-- Header Layout -->
        <div class="mdk-header-layout js-mdk-header-layout">
            <!-- Header -->
            <?php include('include/header.php'); ?>
            <!-- // END Header -->

            <!-- Header Layout Content -->
            <div class="mdk-header-layout__content page-content">
                <div class="py-32pt navbar-submenu">
                    <div class="container page__container">
                        <div class="progression-bar progression-bar--active-accent">
                            <span class="progression-bar__item-content">
                                <i class="material-icons progression-bar__item-icon"></i>
                                <span class="progression-bar__item-text h5 mb-0 text-uppercase"
                                    >Teacher Registration details</span
                                >
                            </span>
                        </div>
                    </div>
                </div>

                <div class="pt-32pt pt-sm-64pt pb-32pt">
                    <div class="container page__container">
                        <div class="page-section container page__container">
                            <div class="col-md-7 p-0">
                                <div class="form-group">
                                    <label class="form-label">School photo</label>
                                    <div class="media align-items-center">
                                        <a href="" class="media-left mr-16pt">
                                            <img src="public/images/people/110/guy-3.jpg"
                                                alt="people"
                                                width="56"
                                                class="rounded-circle"/>
                                        </a>
                                        <div class="media-body">
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input"
                                                    id="inputGroupFile01" />
                                                <label
                                                    class="custom-file-label"
                                                    for="inputGroupFile01"
                                                    >Choose file</label
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">
                                        School name</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="Arena School"
                                        placeholder="Your profile name ..."
                                    />
                                    <small class="form-text text-muted"
                                        >Your profile name will be used as part
                                        of your public profile URL
                                        address.</small
                                    >
                                </div>

                                <div class="form-group">
                                    <label class="form-label">About you</label>
                                    <textarea
                                        rows="3"
                                        class="form-control"
                                        placeholder="About you ..."
                                    ></textarea>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input
                                            type="checkbox"
                                            class="custom-control-input"
                                            checked
                                            id="customCheck1"
                                        />
                                        <label
                                            class="custom-control-label"
                                            for="customCheck1"
                                            >Display your real name on your
                                            profile</label
                                        >
                                        <small class="form-text text-muted"
                                            >If unchecked, your profile name
                                            will be displayed instead of your
                                            full name.</small
                                        >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input
                                            type="checkbox"
                                            class="custom-control-input"
                                            checked
                                            id="customCheck2"
                                        />
                                        <label
                                            class="custom-control-label"
                                            for="customCheck2"
                                            >Allow everyone to see your
                                            profile</label
                                        >
                                        <small class="form-text text-muted"
                                            >If unchecked, your profile will be
                                            private and no one except you will
                                            be able to view it.</small
                                        >
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Save changes
                                </button>
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
