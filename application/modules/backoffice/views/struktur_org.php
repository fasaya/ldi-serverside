<section role="main" class="content-body">
    <header class="page-header">
        <h2>Halaman</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-3">
                <li><i class="fas fa-home"></i></li>
                <li><span>Halaman</span></li>
                <li><span>Struktur Organisasi</span></li>
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

                    <h2 class="card-title">Nama</h2>
                </header>
                <div class="card-body">
                    <?= $this->session->flashdata('message_1'); ?>
                    <div class="mb-3">
                        <form class="" action="<?= base_url() ?>backoffice/adminpanel/strukturorg/f" method="post">
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Pembina</label>
                                <div class="col-sm-5">
                                    <input type="text" placeholder="Nama" class="form-control form-control-lg py-3 text-3" name="nama_a" value="<?= $this->Helper->isi_web('struktur_a1'); ?>">
                                    <?= form_error('nama_a', '<p class="text-danger mb-0">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Pengawas</label>
                                <div class="col-sm-5">
                                    <input type="text" placeholder="Nama" class="form-control form-control-lg py-3 text-3" name="nama_b" value="<?= $this->Helper->isi_web('struktur_b1'); ?>">
                                    <?= form_error('nama_b', '<p class="text-danger mb-0">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Ketua Umum</label>
                                <div class="col-sm-5">
                                    <input type="text" placeholder="Nama" class="form-control form-control-lg py-3 text-3" name="nama_c" value="<?= $this->Helper->isi_web('struktur_c1'); ?>">
                                    <?= form_error('nama_c', '<p class="text-danger mb-0">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Sekretaris</label>
                                <div class="col-sm-5">
                                    <input type="text" placeholder="Nama" class="form-control form-control-lg py-3 text-3" name="nama_d" value="<?= $this->Helper->isi_web('struktur_d1'); ?>">
                                    <?= form_error('nama_d', '<p class="text-danger mb-0">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Bendahara</label>
                                <div class="col-sm-5">
                                    <input type="text" placeholder="Nama" class="form-control form-control-lg py-3 text-3" name="nama_e" value="<?= $this->Helper->isi_web('struktur_e1'); ?>">
                                    <?= form_error('nama_e', '<p class="text-danger mb-0">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2"></label>
                                <div class="col-sm-4">
                                    <button type="submit" class="mb-1 mt-1 mr-1 btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Gambar</h2>
                    <p class="mb-0">Ukuran gambar yang disarankan 1000x1000px</p>
                </header>
                <div class="card-body">
                    <?= $this->session->flashdata('message_2'); ?>
                    <div class="mb-3">
                        <form class="" action="<?= base_url() ?>backoffice/adminpanel/strukturorg/a" enctype="multipart/form-data" method="post">
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Pembina</label>
                                <div class="col-sm-5">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fas fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-exists">Change</span>
                                                <span class="fileupload-new">Select file</span>
                                                <input type="file" name="gambar" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                    <p class="mb-0 text-danger"><?= $this->Helper->isi_web('struktur_a2'); ?></p>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="mb-1 mt-1 mr-1 btn btn-primary">Submit Gambar 1</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="mb-3">
                        <form class="" action="<?= base_url() ?>backoffice/adminpanel/strukturorg/b" enctype="multipart/form-data" method="post">
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Pengawas</label>
                                <div class="col-sm-5">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fas fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-exists">Change</span>
                                                <span class="fileupload-new">Select file</span>
                                                <input type="file" name="gambar" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                    <p class="mb-0 text-danger"><?= $this->Helper->isi_web('struktur_b2'); ?></p>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="mb-1 mt-1 mr-1 btn btn-primary">Submit Gambar 2</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="mb-3">
                        <form class="" action="<?= base_url() ?>backoffice/adminpanel/strukturorg/c" enctype="multipart/form-data" method="post">
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Ketua Umum</label>
                                <div class="col-sm-5">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fas fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-exists">Change</span>
                                                <span class="fileupload-new">Select file</span>
                                                <input type="file" name="gambar" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                    <p class="mb-0 text-danger"><?= $this->Helper->isi_web('struktur_c2'); ?></p>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="mb-1 mt-1 mr-1 btn btn-primary">Submit Gambar 3</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="mb-3">
                        <form class="" action="<?= base_url() ?>backoffice/adminpanel/strukturorg/d" enctype="multipart/form-data" method="post">
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Sekretaris</label>
                                <div class="col-sm-5">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fas fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-exists">Change</span>
                                                <span class="fileupload-new">Select file</span>
                                                <input type="file" name="gambar" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                    <p class="mb-0 text-danger"><?= $this->Helper->isi_web('struktur_d2'); ?></p>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="mb-1 mt-1 mr-1 btn btn-primary">Submit Gambar 4</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="mb-3">
                        <form class="" action="<?= base_url() ?>backoffice/adminpanel/strukturorg/e" enctype="multipart/form-data" method="post">
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Bendahara</label>
                                <div class="col-sm-5">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fas fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-exists">Change</span>
                                                <span class="fileupload-new">Select file</span>
                                                <input type="file" name="gambar" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                    <p class="mb-0 text-danger"><?= $this->Helper->isi_web('struktur_e2'); ?></p>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="mb-1 mt-1 mr-1 btn btn-primary">Submit Gambar 5</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->
</section>