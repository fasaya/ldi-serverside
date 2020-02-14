<section role="main" class="content-body">
    <header class="page-header">
        <h2>Home</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-3">
                <li><i class="fas fa-home"></i></li>
                <li><span>Halaman</span></li>
                <li><span>Home</span></li>
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

                    <h2 class="card-title">Keterangan Header</h2>
                </header>
                <div class="card-body">
                    <?= $this->session->flashdata('message_4a') ?>
                    <form class="" action="<?= base_url() ?>backoffice/adminpanel/halamanhome/4a" method="post">

                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Title 1</label>
                            <div class="col-sm-6">
                                <input type="text" placeholder="Title 1" class="form-control form-control-lg py-3 text-3" name="title1a" id="name" value="<?= $this->Helper->isi_web('home_4_title1a'); ?>">
                                <?= form_error('title1a', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Sub Title 1</label>
                            <div class="col-sm-6">
                                <input type="text" placeholder="Sub Title 1" class="form-control form-control-lg py-3 text-3" name="title1b" id="name" value="<?= $this->Helper->isi_web('home_4_title1b'); ?>">
                                <?= form_error('title1b', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Keterangan 1</label>
                            <div class="col-sm-6">
                                <input type="text" placeholder="Keterangan 1" class="form-control form-control-lg py-3 text-3" name="title1c" id="name" value="<?= $this->Helper->isi_web('home_4_title1c'); ?>">
                                <?= form_error('title1c', '<p class="text-danger mb-0">', '</p>'); ?>
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

    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Gambar Header</h2>
                    <p class="mb-0">Ukuran gambar yang disarankan 1920x542px</p>
                </header>
                <div class="card-body">
                    <?= $this->session->flashdata('message_4b'); ?>
                    <div class="mb-3">
                        <form action="<?= base_url() ?>backoffice/adminpanel/halamanhome/4b1" enctype="multipart/form-data" method="post">
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Gambar Header</label>
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
                                    <p class="mb-0 text-danger"><?= $this->Helper->isi_web('home_4_img1'); ?></p>
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="mb-1 mt-1 mr-1 btn btn-primary">Submit Gambar</button>
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

                    <h2 class="card-title">Keterangan 1</h2>
                </header>
                <div class="card-body">
                    <?= $this->session->flashdata('message_5a') ?>
                    <form class="" action="<?= base_url() ?>backoffice/adminpanel/halamanhome/5a" method="post">

                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Judul</label>
                            <div class="col-sm-6">
                                <input type="text" placeholder="Judul tebal" class="form-control form-control-lg py-3 text-3" name="judul1" id="name" value="<?= $this->Helper->isi_web('home_5a_judul1'); ?>">
                                <?= form_error('judul1', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="lanjutan judul (kuning)" class="form-control form-control-lg py-3 text-3" name="judul2" id="name" value="<?= $this->Helper->isi_web('home_5a_judul2'); ?>">
                                <?= form_error('judul2', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Sub Judul</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Judul tebal" class="form-control form-control-lg py-3 text-3" name="judul3" id="name" value="<?= $this->Helper->isi_web('home_5a_judul3'); ?>">
                                <?= form_error('judul3', '<p class="text-danger mb-0">', '</p>'); ?>
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

    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Keterangan 2</h2>
                </header>
                <div class="card-body">
                    <?= $this->session->flashdata('message_5b') ?>
                    <form class="" action="<?= base_url() ?>backoffice/adminpanel/halamanhome/5b" method="post">

                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Judul (awal)</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Judul tebal" class="form-control form-control-lg py-3 text-3" name="5b_judul1" id="name" value="<?= $this->Helper->isi_web('home_5b_judul1'); ?>">
                                <?= form_error('5b_judul1', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">judul (tengah) - terganti otomatis</label>
                            <div class="col-sm-3">
                                <input type="text" placeholder="1" class="form-control form-control-lg py-3 text-3" name="5b_judul2a" id="name" value="<?= $this->Helper->isi_web('home_5b_judul2a'); ?>">
                                <?= form_error('5b_judul2a', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="2" class="form-control form-control-lg py-3 text-3" name="5b_judul2b" id="name" value="<?= $this->Helper->isi_web('home_5b_judul2b'); ?>">
                                <?= form_error('5b_judul2b', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" placeholder="3" class="form-control form-control-lg py-3 text-3" name="5b_judul2c" id="name" value="<?= $this->Helper->isi_web('home_5b_judul2c'); ?>">
                                <?= form_error('5b_judul2c', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Judul (akhir)</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Judul tebal" class="form-control form-control-lg py-3 text-3" name="5b_judul3" id="name" value="<?= $this->Helper->isi_web('home_5b_judul3'); ?>">
                                <?= form_error('5b_judul3', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea maxlength="5000" placeholder="Keterangan" rows="5" class="form-control form-control-lg py-3 text-3" name="5b_keterangan" id="message"><?= $this->Helper->isi_web('home_5b_keterangan'); ?></textarea>
                                <?= form_error('5b_keterangan', '<p class="text-danger mb-0">', '</p>'); ?>
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

    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Keterangan 3</h2>
                    <p class="mb-0"><a href="https://iconify.design/icon-sets/simple-line-icons/" target="_blank">Cari icon disini.</a></p>
                </header>
                <div class="card-body">
                    <?= $this->session->flashdata('message_5c') ?>
                    <form class="" action="<?= base_url() ?>backoffice/adminpanel/halamanhome/5c" method="post">

                        <div class="form-group row">
                            <label class="col-sm-1 control-label text-sm-right pt-2">1</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="icon-support" class="form-control form-control-lg py-3 text-3" name="5c_1a" value="<?= $this->Helper->isi_web('home_5c_1a'); ?>">
                                <?= form_error('5c_1a', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Title" class="form-control form-control-lg py-3 text-3" name="5c_1b" value="<?= $this->Helper->isi_web('home_5c_1b'); ?>">
                                <?= form_error('5c_1b', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-5">
                                <textarea maxlength="5000" placeholder="Keterangan" rows="2" class="form-control form-control-lg py-3 text-3" name="5c_1c"><?= $this->Helper->isi_web('home_5c_1c'); ?></textarea>
                                <?= form_error('5c_1c', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 control-label text-sm-right pt-2">2</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="icon-layers" class="form-control form-control-lg py-3 text-3" name="5c_2a" value="<?= $this->Helper->isi_web('home_5c_2a'); ?>">
                                <?= form_error('5c_2a', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Title" class="form-control form-control-lg py-3 text-3" name="5c_2b" value="<?= $this->Helper->isi_web('home_5c_2b'); ?>">
                                <?= form_error('5c_2b', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-5">
                                <textarea maxlength="5000" placeholder="Keterangan" rows="2" class="form-control form-control-lg py-3 text-3" name="5c_2c"><?= $this->Helper->isi_web('home_5c_2c'); ?></textarea>
                                <?= form_error('5c_2c', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 control-label text-sm-right pt-2">3</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="icon-menu" class="form-control form-control-lg py-3 text-3" name="5c_3a" value="<?= $this->Helper->isi_web('home_5c_3a'); ?>">
                                <?= form_error('5c_3a', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Title" class="form-control form-control-lg py-3 text-3" name="5c_3b" value="<?= $this->Helper->isi_web('home_5c_3b'); ?>">
                                <?= form_error('5c_3b', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-5">
                                <textarea maxlength="5000" placeholder="Keterangan" rows="2" class="form-control form-control-lg py-3 text-3" name="5c_3c"><?= $this->Helper->isi_web('home_5c_3c'); ?></textarea>
                                <?= form_error('5c_3c', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 control-label text-sm-right pt-2">4</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="icon-doc" class="form-control form-control-lg py-3 text-3" name="5c_4a" value="<?= $this->Helper->isi_web('home_5c_4a'); ?>">
                                <?= form_error('5c_4a', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Title" class="form-control form-control-lg py-3 text-3" name="5c_4b" value="<?= $this->Helper->isi_web('home_5c_4b'); ?>">
                                <?= form_error('5c_4b', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-5">
                                <textarea maxlength="5000" placeholder="Keterangan" rows="2" class="form-control form-control-lg py-3 text-3" name="5c_4c"><?= $this->Helper->isi_web('home_5c_4c'); ?></textarea>
                                <?= form_error('5c_4c', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 control-label text-sm-right pt-2">5</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="icon-user" class="form-control form-control-lg py-3 text-3" name="5c_5a" value="<?= $this->Helper->isi_web('home_5c_5a'); ?>">
                                <?= form_error('5c_5a', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Title" class="form-control form-control-lg py-3 text-3" name="5c_5b" value="<?= $this->Helper->isi_web('home_5c_5b'); ?>">
                                <?= form_error('5c_5b', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-5">
                                <textarea maxlength="5000" placeholder="Keterangan" rows="2" class="form-control form-control-lg py-3 text-3" name="5c_5c"><?= $this->Helper->isi_web('home_5c_5c'); ?></textarea>
                                <?= form_error('5c_5c', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 control-label text-sm-right pt-2">6</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="icon-screen-desktop" class="form-control form-control-lg py-3 text-3" name="5c_6a" value="<?= $this->Helper->isi_web('home_5c_6a'); ?>">
                                <?= form_error('5c_6a', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Title" class="form-control form-control-lg py-3 text-3" name="5c_6b" value="<?= $this->Helper->isi_web('home_5c_6b'); ?>">
                                <?= form_error('5c_6b', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-5">
                                <textarea maxlength="5000" placeholder="Keterangan" rows="2" class="form-control form-control-lg py-3 text-3" name="5c_6c"><?= $this->Helper->isi_web('home_5c_6c'); ?></textarea>
                                <?= form_error('5c_6c', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-1 control-label text-sm-right pt-2"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="mb-1 mt-1 mr-1 btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
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

                    <h2 class="card-title">Keterangan 4</h2>
                </header>
                <div class="card-body">
                    <?= $this->session->flashdata('message_1') ?>
                    <form class="" action="<?= base_url() ?>backoffice/adminpanel/halamanhome/1" enctype="multipart/form-data" method="post">

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
                                <p class="mb-0">Ukuran gambar yang disarankan 803x763px</p>
                            </div>
                            <div class="col-sm-4">
                                <p class="mb-0 text-danger"><?= $this->Helper->isi_web('home_1_img'); ?></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Judul</label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Judul tebal" class="form-control form-control-lg py-3 text-3" name="judul1" id="name" value="<?= $this->Helper->isi_web('home_1_judul1'); ?>">
                                <?= form_error('judul1', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" placeholder="lanjutan judul" class="form-control form-control-lg py-3 text-3" name="judul2" id="name" value="<?= $this->Helper->isi_web('home_1_judul2'); ?>">
                                <?= form_error('judul2', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea maxlength="5000" placeholder="Keterangan" rows="5" class="form-control form-control-lg py-3 text-3" name="keterangan1" id="message"><?= $this->Helper->isi_web('home_1_isi1'); ?></textarea>
                                <?= form_error('keterangan1', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Sub Keterangan</label>
                            <div class="col-sm-9">
                                <textarea maxlength="5000" placeholder="Sub Keterangan" rows="5" class="form-control form-control-lg py-3 text-3" name="keterangan2" id="message"><?= $this->Helper->isi_web('home_1_isi2'); ?></textarea>
                                <?= form_error('keterangan2', '<p class="text-danger mb-0">', '</p>'); ?>
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

    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Keterangan 5</h2>
                    <p class="mb-0"><a href="https://iconify.design/icon-sets/simple-line-icons/" target="_blank">Cari icon disini.</a></p>
                </header>
                <div class="card-body">
                    <?= $this->session->flashdata('message_5d') ?>
                    <form class="" action="<?= base_url() ?>backoffice/adminpanel/halamanhome/5d" method="post">

                        <div class="form-group row">
                            <label class="col-sm-1 control-label text-sm-right pt-2">1</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="icon-people" class="form-control form-control-lg py-3 text-3" name="5d_1a" value="<?= $this->Helper->isi_web('home_5d_1a'); ?>">
                                <?= form_error('5d_1a', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Title" class="form-control form-control-lg py-3 text-3" name="5d_1b" value="<?= $this->Helper->isi_web('home_5d_1b'); ?>">
                                <?= form_error('5d_1b', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-5">
                                <textarea maxlength="5000" placeholder="Keterangan" rows="2" class="form-control form-control-lg py-3 text-3" name="5d_1c"><?= $this->Helper->isi_web('home_5d_1c'); ?></textarea>
                                <?= form_error('5d_1c', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 control-label text-sm-right pt-2">2</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="icon-docs" class="form-control form-control-lg py-3 text-3" name="5d_2a" value="<?= $this->Helper->isi_web('home_5d_2a'); ?>">
                                <?= form_error('5d_2a', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Title" class="form-control form-control-lg py-3 text-3" name="5d_2b" value="<?= $this->Helper->isi_web('home_5d_2b'); ?>">
                                <?= form_error('5d_2b', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-5">
                                <textarea maxlength="5000" placeholder="Keterangan" rows="2" class="form-control form-control-lg py-3 text-3" name="5d_2c"><?= $this->Helper->isi_web('home_5d_2c'); ?></textarea>
                                <?= form_error('5d_2c', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 control-label text-sm-right pt-2">3</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="icon-trophy" class="form-control form-control-lg py-3 text-3" name="5d_3a" value="<?= $this->Helper->isi_web('home_5d_3a'); ?>">
                                <?= form_error('5d_3a', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Title" class="form-control form-control-lg py-3 text-3" name="5d_3b" value="<?= $this->Helper->isi_web('home_5d_3b'); ?>">
                                <?= form_error('5d_3b', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-5">
                                <textarea maxlength="5000" placeholder="Keterangan" rows="2" class="form-control form-control-lg py-3 text-3" name="5d_3c"><?= $this->Helper->isi_web('home_5d_3c'); ?></textarea>
                                <?= form_error('5d_3c', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 control-label text-sm-right pt-2">4</label>
                            <div class="col-sm-2">
                                <input type="text" placeholder="icon-equalizer" class="form-control form-control-lg py-3 text-3" name="5d_4a" value="<?= $this->Helper->isi_web('home_5d_4a'); ?>">
                                <?= form_error('5d_4a', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Title" class="form-control form-control-lg py-3 text-3" name="5d_4b" value="<?= $this->Helper->isi_web('home_5d_4b'); ?>">
                                <?= form_error('5d_4b', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                            <div class="col-sm-5">
                                <textarea maxlength="5000" placeholder="Keterangan" rows="2" class="form-control form-control-lg py-3 text-3" name="5d_4c"><?= $this->Helper->isi_web('home_5d_4c'); ?></textarea>
                                <?= form_error('5d_4c', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-1 control-label text-sm-right pt-2"></label>
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