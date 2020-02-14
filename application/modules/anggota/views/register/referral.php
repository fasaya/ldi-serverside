<!doctype html>
<html class="fixed">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!-- Basic -->
    
    <title>Register</title>
    <meta name="keywords" content="Lentera Digital" />
    <meta name="description" content="Register">
    <meta name="author" content="fasaya">

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
                    <h2 class="title text-uppercase font-weight-bold m-0"><i class="fas fa-user mr-1"></i> Daftar Calon Anggota</h2>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message') ?>
                    <form method="post" action="<?= base_url() ?>anggota/register/referral/<?= $kode_ref; ?>">

                        <div class="form-group mb-3">
                            <label>Nama Lengkap</label>
                            <input name="nama" type="text" placeholder="Nama lengkap" class="form-control" value="<?= set_value('nama'); ?>" />
                            <?= form_error('nama', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                        </div>

                        <div class="form-group mb-3">
                            <label>Username</label>
                            <input name="username" type="text" placeholder="Username" class="form-control" value="<?= set_value('username'); ?>" />
                            <?= form_error('username', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                        </div>

                        <div class="form-group mb-3">
                            <label>Alamat E-mail</label>
                            <input name="email" type="email" placeholder="E-mail" class="form-control" value="<?= set_value('email'); ?>" />
                            <?= form_error('email', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                        </div>

                        <div class="form-group mb-3">
                            <label>Nomor HP</label>
                            <input name="no_hp" type="no_hp" placeholder="No HP" class="form-control" value="<?= set_value('no_hp'); ?>" />
                            <?= form_error('no_hp', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                        </div>

                        <div class="form-group mt-2 mb-3">
                            <label>Referral</label>
                            <input name="kode_ref" type="text" class="form-control" value="<?= $kode_ref; ?>" readonly />
                            <?= form_error('kode_ref', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-success mt-2">Daftar</button>
                            </div>
                        </div>

                        <p class="text-center">Sudah memiliki akun? <a href="<?= base_url() ?>login">Masuk!</a></p>

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