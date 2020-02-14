<section role="main" class="content-body">
    <header class="page-header">
        <h2>Setting</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-3">
                <li><i class="fas fa-home"></i></li>
                <li><span>Kontak</span></li>
                <!-- <li><span>Advanced</span></li> -->
            </ol>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <!-- <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
										<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a> -->
                    </div>

                    <h2 class="card-title">Edit Kontak</h2>
                </header>
                <div class="card-body">
                    <?= $this->session->flashdata('message') ?>
                    <form class="contact-form" action="<?= base_url() ?>backoffice/adminpanel/kontak" method="POST">

                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">No. Handphone</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </span>
                                    </span>
                                    <input type="text" name="nohp" value="<?= $this->Helper->setting('NOHP'); ?>" placeholder="6281..." class="form-control" />
                                </div>
                                <p>Harus diawali dengan 62</p>
                                <?= form_error('nohp', '<p class="text-danger">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">No. Whatsapp</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fab fa-whatsapp"></i>
                                        </span>
                                    </span>
                                    <input type="text" name="nowa" value="<?= $this->Helper->setting('NOWA'); ?>" placeholder="6281..." class="form-control" />
                                </div>
                                <p>Harus diawali dengan 62</p>
                                <?= form_error('nowa', '<p class="text-danger">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Email</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                    </span>
                                    <input type="text" name="email" value="<?= $this->Helper->setting('EMAIL'); ?>" placeholder="<?= $this->Helper->setting('EMAIL'); ?>" class="form-control" />
                                </div>
                                <?= form_error('email', '<p class="text-danger">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Alamat</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                    </span>
                                    <input type="text" name="alamat" value="<?= $this->Helper->setting('ALAMAT'); ?>" placeholder="<?= $this->Helper->setting('ALAMAT'); ?>" class="form-control" />
                                </div>
                                <?= form_error('alamat', '<p class="text-danger">', '</p>'); ?>
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