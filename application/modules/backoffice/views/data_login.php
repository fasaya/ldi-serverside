<section role="main" class="content-body">
    <header class="page-header">
        <h2>Setting</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-3">
                <li><i class="fas fa-home"></i></li>
                <li><span>Data Login</span></li>
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

                    <h2 class="card-title">Edit Data Login</h2>
                </header>
                <div class="card-body">
                    <?= $this->session->flashdata('message') ?>
                    <form class="contact-form" action="<?= base_url() ?>backoffice/adminpanel/datalogin" method="POST">

                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Username</label>
                            <div class="col-sm-7">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </span>
                                    <input type="text" name="username" value="<?= $user['username'] ?>" placeholder="Username" class="form-control" />
                                </div>
                                <?= form_error('username', '<p class="text-danger">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label text-sm-right pt-2">Password</label>
                            <div class="col-sm-7">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </span>
                                    <input type="password" name="password" placeholder="Password" class="form-control" />
                                </div>
                                <?= form_error('password', '<p class="text-danger">', '</p>'); ?>
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