<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <meta name="keywords" content="Lentera Digital Indonesia" />
    <meta name="description" content="Koperasi Lentera Digital Indonesia">
    <meta name="author" content="Lentera Digital Indonesia">

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
            <a href="/" class="logo float-left">
                <img src="<?= base_url() ?>template/img/lentera-kecil.png" height="80" />
            </a>

            <div class="panel card-sign">
                <div class="card-title-sign mt-3 text-right">
                    <h2 class="title text-uppercase font-weight-bold m-0"><i class="fas fa-user mr-1"></i> Reset Password Pengurus</h2>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <form method="post" action="<?= site_url(); ?>pengurus/reset/createnewpassword/<?= $selector ?>/<?= $validator ?>">
                        <input type="hidden" name="selector" value="<?= $selector ?>">
                        <input type="hidden" name="validator" value="<?= $validator ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <label>Password</label>
                                    <input name="newpass" type="password" placeholder="Password" class="form-control" />
                                    <?= form_error('newpass', '<p class="text-danger m-0">', '</p>'); ?>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label>Konfirmasi Password</label>
                                    <input name="newpass2" type="password" placeholder="Ketik ulang password" class="form-control" />
                                    <?= form_error('newpass2', '<p class="text-danger m-0">', '</p>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-success mt-2">Submit</button>
                            </div>
                        </div>
                        <p class="text-center mt-3">Ingat password? <a href="<?= site_url(); ?>pengurus">Masuk!</a></p>
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