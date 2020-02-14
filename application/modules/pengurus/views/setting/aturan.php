<section role="main" class="content-body">
    <header class="page-header">
        <h2>AD/RT, Aturan dan Sanksi</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>pengurus/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Pengaturan</span></li>
                <li><span>AD/RT, Aturan dan Sanksi</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
    <?php if ($this->session->flashdata('message')) { ?>
        <section class="card card-transparent">
            <div class="card-body">
                <?= $this->session->flashdata('message') ?>
            </div>
        </section>
    <?php } ?>

    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">AD/RT</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <form class="form-horizontal" action="<?= base_url() ?>pengurus/setting/adrt" enctype="multipart/form-data" method="post">

                        <!-- <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">AD/RT</label>
                            <div class="col-lg-9">
                                <textarea class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }' name="adrt">
                                    <?= $this->Helper->setting_isi_web('pengurus_adrt'); ?>
                                </textarea>
                                <?= form_error('adrt', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">AD/ART</label>
                            <div class="col-lg-9">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-append">
                                        <div class="uneditable-input">
                                            <i class="fas fa-file fileupload-exists"></i>
                                            <span class="fileupload-preview"></span>
                                        </div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileupload-exists">Change</span>
                                            <span class="fileupload-new">Select file</span>
                                            <input type="file" name="file_pdf" />
                                        </span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                                <p><?= $this->Helper->setting_isi_web('adrt_pdf'); ?></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2"></label>
                            <div class="col-lg-6">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Aturan dan Sanksi</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <form class="form-horizontal" action="<?= base_url() ?>pengurus/setting/aturan" method="post">

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Aturan dan Sanksi</label>
                            <div class="col-lg-9">
                                <textarea class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }' name="aturan">
                                    <?= $this->Helper->setting_isi_web('pengurus_aturan'); ?>
                                </textarea>
                                <?= form_error('aturan', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2"></label>
                            <div class="col-lg-6">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->
</section>