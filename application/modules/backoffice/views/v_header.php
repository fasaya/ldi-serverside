<!DOCTYPE html>
<html class="fixed">

<head>

	<!-- Basic -->
	<meta charset="UTF-8">

	<title>Admin Lentera Digital Indonesia</title>
	<!-- <meta name="keywords" content="Lentera Digital Indonesia" /> -->
	<!-- <meta name="description" content="Koperasi Lentera Digital Indonesia"> -->
	<!-- <meta name="author" content="okler.net"> -->

	<link rel="shortcut icon" href="<?= base_url() ?>template/images/logo-4.png" type="image/x-icon" />

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

	<!-- Specific Page Vendor CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>template/admin/vendor/select2/css/select2.css" />
	<link rel="stylesheet" href="<?= base_url() ?>template/admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>template/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />
	<link rel="stylesheet" href="<?= base_url() ?>template/admin/vendor/pnotify/pnotify.custom.css" />
	<link rel="stylesheet" href="<?= base_url() ?>template/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>template/admin/vendor/summernote/summernote-bs4.css" />

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
	<section class="body">

		<!-- start: header -->
		<header class="header">
			<div class="logo-container">
				<a href="<?= base_url() ?>adminpanel" class="logo">
					<img src="<?= base_url() ?>template/img/logo-1.jpeg" height="40" alt="Lentera Digital Indonesia" />
				</a>
				<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
					<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
				</div>
			</div>

			<!-- start: search & user box -->
			<div class="header-right">

				<span class="separator"></span>

				<div id="userbox" class="userbox">
					<a href="#" data-toggle="dropdown">
						<figure class="profile-picture">
							<img src="<?= base_url() ?>template/admin/img/logged-user.jpg" class="rounded-circle" data-lock-picture="<?= base_url() ?>template/admin/img/logged-user.jpg" />
						</figure>
						<div class="profile-info">
							<span class="name"><?= $user['username']; ?></span>
							<span class="role"><?= $user['keterangan']; ?></span>
						</div>

						<i class="fa custom-caret"></i>
					</a>

					<div class="dropdown-menu">
						<ul class="list-unstyled mb-2">
							<li class="divider"></li>
							<!-- <li>
									<a role="menuitem" tabindex="-1" href="#"><i class="fas fa-user"></i> My Profile</a>
								</li> -->
							<li>
								<a role="menuitem" tabindex="-1" href="<?= base_url() ?>webadmin/logout"><i class="fas fa-power-off"></i> Logout</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- end: search & user box -->
		</header>
		<!-- end: header -->

		<div class="inner-wrapper">
			<!-- start: sidebar -->
			<aside id="sidebar-left" class="sidebar-left">

				<div class="sidebar-header">
					<div class="sidebar-title">
						Navigation
					</div>
					<div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
						<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>

				<div class="nano">
					<div class="nano-content">
						<nav id="menu" class="nav-main" role="navigation">
							<ul class="nav nav-main">
								<li>
									<a class="nav-link" href="<?= site_url() ?>backoffice/adminpanel">
										<i class="fas fa-home" aria-hidden="true"></i>
										<span>Dashboard</span>
									</a>
								</li>

								<!-- <hr class="separator" /> -->

								<li class="nav-parent">
									<a class="nav-link" href="#">
										<i class="fas fa-copy" aria-hidden="true"></i>
										<span>Halaman</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a class="nav-link" href="<?= site_url() ?>backoffice/adminpanel/halamanhome">
												Home
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= site_url() ?>backoffice/adminpanel/halamantentang">
												Tentang
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= site_url() ?>backoffice/adminpanel/halamanvisimisi">
												Visi dan Misi
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= site_url() ?>backoffice/adminpanel/halamanadrt">
												AD/aRT
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= site_url() ?>backoffice/adminpanel/strukturorg">
												Struktur Organisasi
											</a>
										</li>
										<li class="nav-parent">
											<a class="nav-link" href="#">
												Program Kami
											</a>
											<ul class="nav nav-children">
												<li>
													<a href="<?= site_url() ?>backoffice/adminpanel/program">
														Semua
													</a>
												</li>
												<li>
													<a href="<?= site_url() ?>backoffice/adminpanel/tambahprogram">
														Tambah
													</a>
												</li>
												<li>
													<a href="<?= site_url() ?>backoffice/adminpanel/settingprogram">
														Setting
													</a>
												</li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a class="nav-link" href="#">
										<i class="fas fa-cogs" aria-hidden="true"></i>
										<span>Pengaturan</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a class="nav-link" href="<?= site_url() ?>backoffice/adminpanel/kontak">
												Kontak
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= site_url() ?>backoffice/adminpanel/lainnya">
												Lainnya
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= site_url() ?>backoffice/adminpanel/datalogin">
												Data Login
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</nav>

						<!-- <hr class="separator" /> -->

						<script>
							// Maintain Scroll Position
							if (typeof localStorage !== 'undefined') {
								if (localStorage.getItem('sidebar-left-position') !== null) {
									var initialPosition = localStorage.getItem('sidebar-left-position'),
										sidebarLeft = document.querySelector('#sidebar-left .nano-content');

									sidebarLeft.scrollTop = initialPosition;
								}
							}
						</script>


					</div>

			</aside>
			<!-- end: sidebar -->