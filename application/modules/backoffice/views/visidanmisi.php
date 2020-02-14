<section role="main" class="content-body">
    <header class="page-header">
        <h2>Halaman</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-3">
                <li><i class="fas fa-home"></i></li>
                <li><span>Halaman</span></li>
                <li><span>Visi dan Misi</span></li>
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

                    <h2 class="card-title">Keterangan</h2>
                </header>
                <div class="card-body">
                    <?= $this->session->flashdata('message_1') ?>
                    <form class="" action="<?= base_url() ?>backoffice/adminpanel/halamanvisimisi/1" method="post">
                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Title</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Title" class="form-control form-control-lg py-3 text-3" name="1_title1" id="name" value="<?= $this->Helper->isi_web('visimisi_1_title1'); ?>">
                                <?= form_error('1_title1', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Sub Title</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Sub Title" class="form-control form-control-lg py-3 text-3" name="1_title2" id="name" value="<?= $this->Helper->isi_web('visimisi_1_title2'); ?>">
                                <?= form_error('1_title2', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Visi</label>
                            <div class="col-lg-9">
                                <textarea name="1_visi" id="summernote" class="summernote" data-plugin-summernote data-plugin-options='{ "height": 300, "codemirror": { "theme": "ambiance" } }'>
                                <?= $this->Helper->isi_web('visimisi_1_visi'); ?>
								</textarea>
                                <?= form_error('1_visi', '<p class="text-danger">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Misi</label>
                            <div class="col-lg-9">
                                <textarea name="1_misi" id="summernote" class="summernote" data-plugin-summernote data-plugin-options='{ "height": 300, "codemirror": { "theme": "ambiance" } }'>
                                <?= $this->Helper->isi_web('visimisi_1_misi'); ?>
								</textarea>
                                <?= form_error('1_misi', '<p class="text-danger">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Pengutip</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Sub Title" class="form-control form-control-lg py-3 text-3" name="1_quote2" id="name" value="<?= $this->Helper->isi_web('visimisi_1_quotes2'); ?>">
                                <?= form_error('1_quote2', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Kutipan</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Title" class="form-control form-control-lg py-3 text-3" name="1_quote1" id="quote1" value="<?= $this->Helper->isi_web('visimisi_1_quotes1'); ?>">
                                <?= form_error('1_quote1', '<p class="text-danger mb-0">', '</p>'); ?>
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

    <div class="row" id="gambar">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Gambar Kegiatan</h2>
                    <p class="mb-0">Ukuran gambar yang disarankan 184x145px</p>
                </header>
                <div class="card-body">
                    <?= $this->session->flashdata('message_2'); ?>
                    <div class="mb-3">
                        <form class="" action="<?= base_url() ?>backoffice/adminpanel/halamanvisimisi/2a" enctype="multipart/form-data" method="post">
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Gambar 1</label>
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
                                    <p class="mb-0 text-danger"><?= $this->Helper->isi_web('visimisi_2_img2a'); ?></p>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="mb-1 mt-1 mr-1 btn btn-primary">Submit Gambar 1</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="mb-3">
                        <form class="" action="<?= base_url() ?>backoffice/adminpanel/halamanvisimisi/2b" enctype="multipart/form-data" method="post">
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Gambar 2</label>
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
                                    <p class="mb-0 text-danger"><?= $this->Helper->isi_web('visimisi_2_img2b'); ?></p>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="mb-1 mt-1 mr-1 btn btn-primary">Submit Gambar 2</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="mb-3">
                        <form class="" action="<?= base_url() ?>backoffice/adminpanel/halamanvisimisi/2c" enctype="multipart/form-data" method="post">
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Gambar 3</label>
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
                                    <p class="mb-0 text-danger"><?= $this->Helper->isi_web('visimisi_2_img2c'); ?></p>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="mb-1 mt-1 mr-1 btn btn-primary">Submit Gambar 3</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="mb-3">
                        <form class="" action="<?= base_url() ?>backoffice/adminpanel/halamanvisimisi/2d" enctype="multipart/form-data" method="post">
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Gambar 4</label>
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
                                    <p class="mb-0 text-danger"><?= $this->Helper->isi_web('visimisi_2_img2d'); ?></p>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="mb-1 mt-1 mr-1 btn btn-primary">Submit Gambar 4</button>
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