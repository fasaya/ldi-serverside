<!DOCTYPE html>
<html class="fixed sidebar-light">

<head>

	<!-- Basic -->
	<meta charset="UTF-8">

	<title>Admin Lentera Digital Indonesia</title>
	<!-- <meta name="keywords" content="Lentera Digital Indonesia" />
	<meta name="description" content="Koperasi Lentera Digital Indonesia">
	<meta name="author" content="Lentera Digital Indonesia"> -->

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
	<link rel="stylesheet" href="<?= base_url() ?>template/admin/vendor/jquery-ui/jquery-ui.css" />
	<link rel="stylesheet" href="<?= base_url() ?>template/admin/vendor/jquery-ui/jquery-ui.theme.css" />
	<link rel="stylesheet" href="<?= base_url() ?>template/admin/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
	<link rel="stylesheet" href="<?= base_url() ?>template/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>template/admin/vendor/morris/morris.css" />
	<link rel="stylesheet" href="<?= base_url() ?>template/admin/vendor/chartist/chartist.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>template/admin/vendor/datatables/media/css/dataTables.bootstrap4.css" />

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
				<a href="<?= base_url() ?>pengurus/dashboard" class="logo">
					<img src="<?= base_url() ?>template/img/lentera-kecil.png" height="40" />
				</a>
				<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
					<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
				</div>
			</div>

			<!-- start: search & user box -->
			<div class="header-right">

				<!-- <form action="pages-search-results.html" class="search nav-form">
					<div class="input-group">
						<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
						<span class="input-group-append">
							<button class="btn btn-default" type="submit"><i class="fas fa-search"></i></button>
						</span>
					</div>
				</form> -->

				<span class="separator"></span>

				<ul class="notifications">
					<!-- <li>
						<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
							<i class="fas fa-tasks"></i>
							<span class="badge">3</span>
						</a>

						<div class="dropdown-menu notification-menu large">
							<div class="notification-title">
								<span class="float-right badge badge-default">3</span>
								Tasks
							</div>

							<div class="content">
								<ul>
									<li>
										<p class="clearfix mb-1">
											<span class="message float-left">Generating Sales Report</span>
											<span class="message float-right text-dark">60%</span>
										</p>
										<div class="progress progress-xs light">
											<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
										</div>
									</li>

									<li>
										<p class="clearfix mb-1">
											<span class="message float-left">Importing Contacts</span>
											<span class="message float-right text-dark">98%</span>
										</p>
										<div class="progress progress-xs light">
											<div class="progress-bar" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100" style="width: 98%;"></div>
										</div>
									</li>

									<li>
										<p class="clearfix mb-1">
											<span class="message float-left">Uploading something big</span>
											<span class="message float-right text-dark">33%</span>
										</p>
										<div class="progress progress-xs light mb-1">
											<div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%;"></div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</li>
					<li>
						<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
							<i class="fas fa-envelope"></i>
							<span class="badge">4</span>
						</a>

						<div class="dropdown-menu notification-menu">
							<div class="notification-title">
								<span class="float-right badge badge-default">230</span>
								Messages
							</div>

							<div class="content">
								<ul>
									<li>
										<a href="#" class="clearfix">
											<figure class="image">
												<img src="img/!sample-user.jpg" alt="Joseph Doe Junior" class="rounded-circle" />
											</figure>
											<span class="title">Joseph Doe</span>
											<span class="message">Lorem ipsum dolor sit.</span>
										</a>
									</li>
									<li>
										<a href="#" class="clearfix">
											<figure class="image">
												<img src="img/!sample-user.jpg" alt="Joseph Junior" class="rounded-circle" />
											</figure>
											<span class="title">Joseph Junior</span>
											<span class="message truncate">Truncated message. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam, nec venenatis risus. Vestibulum blandit faucibus est et malesuada. Sed interdum cursus dui nec venenatis. Pellentesque non nisi lobortis, rutrum eros ut, convallis nisi. Sed tellus turpis, dignissim sit amet tristique quis, pretium id est. Sed aliquam diam diam, sit amet faucibus tellus ultricies eu. Aliquam lacinia nibh a metus bibendum, eu commodo eros commodo. Sed commodo molestie elit, a molestie lacus porttitor id. Donec facilisis varius sapien, ac fringilla velit porttitor et. Nam tincidunt gravida dui, sed pharetra odio pharetra nec. Duis consectetur venenatis pharetra. Vestibulum egestas nisi quis elementum elementum.</span>
										</a>
									</li>
									<li>
										<a href="#" class="clearfix">
											<figure class="image">
												<img src="img/!sample-user.jpg" alt="Joe Junior" class="rounded-circle" />
											</figure>
											<span class="title">Joe Junior</span>
											<span class="message">Lorem ipsum dolor sit.</span>
										</a>
									</li>
									<li>
										<a href="#" class="clearfix">
											<figure class="image">
												<img src="img/!sample-user.jpg" alt="Joseph Junior" class="rounded-circle" />
											</figure>
											<span class="title">Joseph Junior</span>
											<span class="message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet lacinia orci. Proin vestibulum eget risus non luctus. Nunc cursus lacinia lacinia. Nulla molestie malesuada est ac tincidunt. Quisque eget convallis diam.</span>
										</a>
									</li>
								</ul>

								<hr />

								<div class="text-right">
									<a href="#" class="view-more">View All</a>
								</div>
							</div>
						</div>
					</li> -->
					<li>
						<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
							<i class="fas fa-bell"></i>
							<span class="badge"><?= $total_alert ?></span>
						</a>

						<div class="dropdown-menu notification-menu">
							<div class="notification-title">
								<span class="float-right badge badge-default"><?= $total_alert ?></span>
								Alerts
							</div>

							<div class="content">
								<ul>
									<?php if ($this->Alert->alert_calon_anggota() > 0) { ?>
										<li>
											<a href="<?= base_url() ?>pengurus/keanggotaan/pendaftaranreferral" class="clearfix">
												<div class="image">
													<i class="fas fa-users bg-success text-light"></i>
												</div>
												<span class="title"><?= $this->Alert->alert_calon_anggota() ?> anggota belum di verifikasi</span>
											</a>
										</li>
									<?php }  ?>
									<?php if ($this->Alert->alert_deposit_new() > 0) { ?>
										<li>
											<a href="<?= base_url() ?>pengurus/deposit/newrequest" class="clearfix">
												<div class="image">
													<i class="fas fa-sign-in-alt bg-success text-light"></i>
												</div>
												<span class="title"><?= $this->Alert->alert_deposit_new() ?> permintaan deposit baru</span>
											</a>
										</li>
									<?php }  ?>
									<?php if ($this->Alert->alert_deposit_pending() > 0) { ?>
										<li>
											<a href="<?= base_url() ?>pengurus/deposit/pending" class="clearfix">
												<div class="image">
													<i class="fas fa-sign-in-alt bg-warning text-light"></i>
												</div>
												<span class="title"><?= $this->Alert->alert_deposit_pending() ?> permintaan deposit pending</span>
											</a>
										</li>
									<?php }  ?>
									<?php if ($this->Alert->alert_withdraw_pending() > 0) { ?>
										<li>
											<a href="<?= base_url() ?>pengurus/withdrawal/onprocess" class="clearfix">
												<div class="image">
													<i class="fas fa-sign-out-alt bg-warning text-light"></i>
												</div>
												<span class="title"><?= $this->Alert->alert_withdraw_pending() ?> permintaan withdraw</span>
											</a>
										</li>
									<?php }  ?>
									<?php if ($this->Alert->alert_pengajuan_pinjaman() > 0) { ?>
										<li>
											<a href="<?= base_url() ?>pengurus/pinjaman/permohonan" class="clearfix">
												<div class="image">
													<i class="fas fa-money-check bg-success text-light"></i>
												</div>
												<span class="title"><?= $this->Alert->alert_pengajuan_pinjaman() ?> permohonan pinjaman</span>
											</a>
										</li>
									<?php }  ?>
									<?php if ($this->Alert->alert_belum_bayar_pinjaman() > 0) { ?>
										<li>
											<a href="<?= base_url() ?>pengurus/pinjaman/pinjaman" class="clearfix">
												<div class="image">
													<i class="fas fa-money-check bg-danger text-light"></i>
												</div>
												<span class="title"><?= $this->Alert->alert_belum_bayar_pinjaman() ?> Anggota belum membayar pinjaman</span>
											</a>
										</li>
									<?php }  ?>
									<?php if ($this->Alert->jumlah_belum_bayar_simpanan_wajib() > 0) { ?>
										<li>
											<a href="<?= base_url() ?>pengurus/dashboard/peringatansimpananwajib" class="clearfix">
												<div class="image">
													<i class="fas fa-wallet bg-danger text-light"></i>
												</div>
												<span class="title"><?= $this->Alert->jumlah_belum_bayar_simpanan_wajib() ?> Anggota belum membayar simpanan wajib</span>
											</a>
										</li>
									<?php }  ?>
									<?php if ($this->Alert->jumlah_belum_bayar_simpanan_pokok() > 0) { ?>
										<li>
											<a href="<?= base_url() ?>pengurus/dashboard/peringatansimpananpokok" class="clearfix">
												<div class="image">
													<i class="fas fa-wallet bg-danger text-light"></i>
												</div>
												<span class="title"><?= $this->Alert->jumlah_belum_bayar_simpanan_pokok()  ?> Anggota belum membayar simpanan pokok</span>
												<!-- <span class="message">Just now</span> -->
											</a>
										</li>
									<?php }  ?>
								</ul>

								<!-- <hr /> -->

								<!-- <div class="text-right">
									<a href="#" class="view-more">View All</a>
								</div> -->
							</div>
						</div>
					</li>
				</ul>

				<span class="separator"></span>

				<div id="userbox" class="userbox">
					<a href="#" data-toggle="dropdown">
						<figure class="profile-picture">
							<img src="<?= base_url() ?>template/admin/img/user.png" class="rounded-circle" data-lock-picture="<?= base_url() ?>template/admin/img/user.png" />
						</figure>
						<div class=" profile-info">
							<span class="name"><?= $user['username'] ?></span>
							<!-- <span class="role"><?= $keterangan ?></span> -->
						</div>

						<i class="fa custom-caret"></i>
					</a>

					<div class="dropdown-menu">
						<ul class="list-unstyled mb-2">
							<li class="divider"></li>
							<li>
								<a role="menuitem" tabindex="-1" href="<?= base_url() ?>pengurus/akun/edit"><i class="fas fa-user"></i> Akun Saya</a>
							</li>
							<li>
								<a role="menuitem" tabindex="-1" href="<?= base_url() ?>pengurus/logout"><i class="fas fa-power-off"></i> Logout</a>
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
						<!-- <hr class="separator" /> -->
						<!-- <div class="sidebar-widget widget-tasks mt-3">
							<div class="widget-header">
								<h6>Account</h6>
								<div class="widget-toggle">+</div>
							</div>
							<div class="widget-content">
								<figure class="profile-picture">
									<div class="row">
										<div class="col-lg-3">
											<img src="<?= base_url() ?>template/admin/img/user.png" class="rounded-circle" data-lock-picture="<?= base_url() ?>template/admin/img/user.png" height="50px" />
										</div>
										<div class="col-lg-9">
											<span class="name"><?= $user['nama'] ?></span><br>
										</div>
									</div>
								</figure>
							</div>
						</div> -->

						<nav id="menu" class="nav-main" role="navigation">
							<ul class="nav nav-main">
								<li>
									<a class="nav-link" href="<?= base_url() ?>pengurus/dashboard">
										<i class="fas fa-home" aria-hidden="true"></i>
										<span>Halaman Utama</span>
									</a>
								</li>
								<li class="nav-parent">
									<a class="nav-link" href="#">
										<i class="fas fa-users" aria-hidden="true"></i>
										<span>Keanggotaan</span>
									</a>
									<ul class="nav nav-children">
										<li class="nav-parent">
											<a class="nav-link" href="#">
												Pendaftaran
											</a>
											<ul class="nav nav-children">
												<li>
													<a href="<?= base_url() ?>pengurus/keanggotaan/pendaftaran">
														Form Pendaftaran
													</a>
												</li>
												<li>
													<a href="<?= base_url() ?>pengurus/keanggotaan/pendaftaranreferral">
														Data Pendaftar
													</a>
												</li>
											</ul>
										</li>
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/keanggotaan/anggota">
												Daftar Semua Anggota
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/keanggotaan/calonanggota">
												Daftar Semua Calon Anggota
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/keanggotaan/transaksianggota">
												Semua Transaksi Anggota
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a class="nav-link" href="#">
										<i class="fas fa-wallet" aria-hidden="true"></i>
										<span>Simpanan Anggota</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/simpanan">
												Semua Simpanan Anggota
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/simpanan/pokok">
												Simpanan Pokok
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/simpanan/wajib">
												Simpanan Wajib
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/simpanan/sukarela">
												Simpanan Sukarela
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/simpanan/bagiuntung">
												Bagi Untung
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/simpanan/komisipromosi">
												Komisi Promosi
											</a>
										</li>
									</ul>
								</li>
								<!-- <li>
									<a class="nav-link" href="#">
										<i class="fas fa-sign-in-alt" aria-hidden="true"></i>
										<span>Deposito</span>
									</a>
								</li> -->
								<li class="nav-parent">
									<a class="nav-link" href="#">
										<i class="fas fa-chart-area" aria-hidden="true"></i>
										<span>Deposito</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/deposito">
												Deposito
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/deposito/deviden">
												Deviden
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/deposito/royalti">
												Royalti
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a class="nav-link" href="#">
										<i class="fas fa-money-check" aria-hidden="true"></i>
										<span>Pinjaman</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/pinjaman/permohonan">
												Permohonan Pengajuan Pinjaman
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/pinjaman/pinjaman">
												Semua Pinjaman
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/pinjaman/pembayaran">
												Semua Pembayaran Pinjaman
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a class="nav-link" href="#">
										<i class="fas fa-sign-in-alt" aria-hidden="true"></i>
										<span>Deposit</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/deposit/newrequest">
												Deposit Baru
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/deposit/processed">
												Deposit Telah Diproses
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/deposit/pending">
												Deposit Pending
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a class="nav-link" href="#">
										<i class="fas fa-sign-out-alt" aria-hidden="true"></i>
										<span>Withdrawal</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/withdrawal/onprocess">
												Permintaan Withdrawal
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/withdrawal/processed">
												Withdrawal Telah Diproses
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/withdrawal/cancelled">
												Withdrawal Dibatalkan
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-parent">
									<a class="nav-link" href="#">
										<i class="fas fa-users" aria-hidden="true"></i>
										<span>Pengurus</span>
									</a>
									<ul class="nav nav-children">
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/pengurus/tambahpengurus">
												Tambah Pengurus
											</a>
										</li>
										<li>
											<a class="nav-link" href="<?= base_url() ?>pengurus/pengurus/semuapengurus">
												Semua Pengurus
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a class="nav-link" href="<?= base_url() ?>pengurus/setting">
										<i class="fas fa-cogs" aria-hidden="true"></i>
										<span>Pengaturan</span>
									</a>
								</li>
								<li>
									<a class="nav-link" href="<?= base_url() ?>pengurus/setting/aturan">
										<i class="fas fa-cogs" aria-hidden="true"></i>
										<span>AD/RT, Aturan dan Sanksi</span>
									</a>
								</li>
							</ul>
						</nav>

						<hr class="separator" />
					</div>

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