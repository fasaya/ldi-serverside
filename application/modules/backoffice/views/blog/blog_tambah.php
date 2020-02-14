<section role="main" class="content-body">
	<header class="page-header">
		<h2>Program Kami</h2>

		<div class="right-wrapper text-right">
			<ol class="breadcrumbs mr-3">
				<li><i class="fas fa-home"></i></li>
				<li><span>Program Kami</span></li>
				<li><span>Tambah baru</span></li>
			</ol>
		</div>
	</header>

	<!-- start: page -->

	<div class="row">
		<div class="col">
			<section class="card">
				<header class="card-header">
					<div class="card-actions">
						<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
						<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
					</div>

					<h2 class="card-title">Tambah Program</h2>
				</header>
				<div class="card-body">
					<?= $this->session->flashdata('message') ?>
					<form class="" action="<?= base_url() ?>backoffice/adminpanel/tambahprogram" enctype="multipart/form-data" method="post">
						<div class="form-group row">
							<label class="col-sm-3 control-label text-sm-right pt-2">Judul</label>
							<div class="col-sm-9">
								<input type="text" placeholder="Nama Lengkap" class="form-control form-control-lg py-3 text-3" name="judul" id="name" value="<?= set_value('judul'); ?>">
								<?= form_error('judul', '<p class="text-danger">', '</p>'); ?>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-3 control-label text-sm-right pt-2">Gambar</label>
							<div class="col-sm-9">
								<div class="fileupload fileupload-new" data-provides="fileupload">
									<div class="input-append">
										<div class="uneditable-input">
											<i class="fas fa-file fileupload-exists"></i>
											<span class="fileupload-preview"></span>
										</div>
										<span class="btn btn-default btn-file">
											<span class="fileupload-exists">Change</span>
											<span class="fileupload-new">Select file</span>
											<input type="file" name="gambarblog" />
										</span>
										<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 control-label text-lg-right pt-2">Keterangan</label>
							<div class="col-lg-9">
								<textarea name="keterangan" id="summernote" class="summernote" data-plugin-summernote data-plugin-options='{ "height": 300, "codemirror": { "theme": "ambiance" } }'>

								</textarea>
								<?= form_error('keterangan', '<p class="text-danger">', '</p>'); ?>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-3 control-label text-sm-right pt-2"></label>
							<div class="col-sm-9">
								<button type="submit" class="mb-1 mt-1 mr-1 btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</section>
		</div>
	</div>

	<!-- end: page -->
</section>