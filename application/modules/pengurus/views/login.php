<!doctype html>
<html class="fixed">

<head>

	<!-- Basic -->
	<meta charset="UTF-8">

	<title>Masuk Pengurus</title>
	<meta name="keywords" content="Masuk Pengurus Koperasi Lentera Digital Indonesia" />
	<!-- <meta name="description" content="Porto Admin - Responsive HTML5 Template">
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
					<h2 class="title text-uppercase font-weight-bold m-0"><i class="fas fa-user mr-1"></i> Masuk Pengurus</h2>
				</div>
				<div class="card-body">
					<form action="<?= site_url() ?>pengurus/login/login" method="post">
						<!-- <div class="col-sm-12"> -->
						<?= $this->session->flashdata('message') ?>
						<!-- </div> -->
						<div class="form-group mb-3">
							<label>Username</label>
							<div class="input-group">
								<input name="username" type="text" class="form-control form-control-lg" />
								<span class="input-group-append">
									<span class="input-group-text">
										<i class="fas fa-user"></i>
									</span>
								</span>
							</div>
							<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group mb-3">
							<div class="clearfix">
								<label class="float-left">Password</label>
								<a href="<?= site_url() ?>pengurus/reset" class="float-right">Lupa Password?</a>
							</div>
							<div class="input-group">
								<input name="password" type="password" class="form-control form-control-lg" />
								<span class="input-group-append">
									<span class="input-group-text">
										<i class="fas fa-lock"></i>
									</span>
								</span>
							</div>
							<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="row">
							<div class="col-sm-12 text-right">
								<button type="submit" class="btn btn-login mt-2">Sign In</button>
							</div>
						</div>

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