<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <!-- <meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net"> -->

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>template/admin/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?= base_url() ?>template/admin/vendor/animate/animate.css">

    <link rel="stylesheet" href="<?= base_url() ?>template/admin/vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>template/admin/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="<?= base_url() ?>template/admin/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>template/admin/css/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>template/admin/css/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>template/admin/css/custom.css">

    <!-- Head Libs -->
    <script src="<?= base_url() ?>template/admin/vendor/modernizr/modernizr.js"></script>

</head>

<body>
    <!-- start: page -->
    <section class="body-sign">
        <div class="center-sign">
            <a href="<?= base_url() ?>" class="logo float-left">
                <img src="<?= base_url() ?>template/img/lentera-kecil.png" height="80" />
            </a>

            <div class="panel card-sign">
                <div class="card-title-sign mt-3 text-right">
                    <h2 class="title text-uppercase font-weight-bold m-0"><i class="fas fa-user mr-1"></i> Reset Password Anggota</h2>
                </div>
                <div class="card-body">
                    <form action="<?= site_url() ?>anggota/reset" method="post">
                        <!-- <div class="col-sm-12"> -->
                        <?= $this->session->flashdata('message') ?>
                        <!-- </div> -->
                        <div class="form-group mb-0">
                            <div class="input-group">
                                <input name="email" type="text" placeholder="E-mail" class="form-control form-control-lg" />
                                <span class="input-group-append">
                                    <button class="btn btn-success btn-lg" type="submit">Kirim email reset</button>
                                </span>
                            </div>
                            <?= form_error('email', '<p class="text-danger m-0">', '</p>'); ?>
                        </div>

                        <p class="text-center mt-3">Ingat password? <a href="<?= site_url(); ?>login">Masuk!</a></p>
                    </form>
                </div>
            </div>
            <!-- <p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2017. All Rights Reserved.</p> -->
        </div>
    </section>
    <!-- end: page -->

    <!-- Vendor -->
    <script src="<?= base_url() ?>template/admin/vendor/jquery/jquery.js"></script>
    <script src="<?= base_url() ?>template/admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="<?= base_url() ?>template/admin/vendor/popper/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>template/admin/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>template/admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?= base_url() ?>template/admin/vendor/common/common.js"></script>
    <script src="<?= base_url() ?>template/admin/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="<?= base_url() ?>template/admin/vendor/magnific-popup/jquery.magnific-popup.js"></script>
    <script src="<?= base_url() ?>template/admin/vendor/jquery-placeholder/jquery.placeholder.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="<?= base_url() ?>template/admin/js/theme.js"></script>

    <!-- Theme Custom -->
    <script src="<?= base_url() ?>template/admin/js/custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="<?= base_url() ?>template/admin/js/theme.init.js"></script>

</body>

</html>