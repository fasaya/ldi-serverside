<section role="main" class="content-body">
    <header class="page-header">
        <h2>Halaman</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-3">
                <li><i class="fas fa-home"></i></li>
                <li><span>Halaman</span></li>
                <li><span>Tentang</span></li>
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
                    <form class="" action="<?= base_url() ?>backoffice/adminpanel/halamantentang/1" enctype="multipart/form-data" method="post">

                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Gambar</label>
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
                                <!-- <p class="mb-0">Ukuran gambar yang disarankan 803x763px</p> -->
                            </div>
                            <div class="col-sm-4">
                                <p class="mb-0 text-danger"><?= $this->Helper->isi_web('tentang_1_img'); ?></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Judul</label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Judul tebal" class="form-control form-control-lg py-3 text-3" name="1_judul1" id="name" value="<?= $this->Helper->isi_web('tentang_1_judul1'); ?>">
                                <?= form_error('1_judul1', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" placeholder="lanjutan judul" class="form-control form-control-lg py-3 text-3" name="1_judul2" id="name" value="<?= $this->Helper->isi_web('tentang_1_judul2'); ?>">
                                <?= form_error('1_judul2', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea maxlength="5000" placeholder="Keterangan" rows="5" class="form-control form-control-lg py-3 text-3" name="1_keterangan1" id="message"><?= $this->Helper->isi_web('tentang_1_isi1'); ?></textarea>
                                <?= form_error('1_keterangan1', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Sub Keterangan</label>
                            <div class="col-sm-9">
                                <textarea maxlength="5000" placeholder="Sub Keterangan" rows="5" class="form-control form-control-lg py-3 text-3" name="1_keterangan2" id="message"><?= $this->Helper->isi_web('tentang_1_isi2'); ?></textarea>
                                <?= form_error('1_keterangan2', '<p class="text-danger mb-0">', '</p>'); ?>
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