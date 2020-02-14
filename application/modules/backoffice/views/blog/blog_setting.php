<section role="main" class="content-body">
    <header class="page-header">
        <h2>Program Kami</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-3">
                <li><i class="fas fa-home"></i></li>
                <li><span>Program Kami</span></li>
                <li><span>Setting</span></li>
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
                    <?= $this->session->flashdata('message') ?>
                    <form class="" action="<?= base_url() ?>backoffice/adminpanel/settingprogram" method="post">

                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Title</label>
                            <div class="col-sm-6">
                                <input type="text" placeholder="Title 1" class="form-control form-control-lg py-3 text-3" name="title" id="name" value="<?= $this->Helper->isi_web('blog_title'); ?>">
                                <?= form_error('title', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Sub Title</label>
                            <div class="col-sm-6">
                                <input type="text" placeholder="Sub Title 1" class="form-control form-control-lg py-3 text-3" name="subtitle" id="name" value="<?= $this->Helper->isi_web('blog_subtitle'); ?>">
                                <?= form_error('subtitle', '<p class="text-danger mb-0">', '</p>'); ?>
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