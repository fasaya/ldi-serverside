<section role="main" class="content-body">
    <header class="page-header">
        <h2>Edit Akun</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>pengurus/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Akun</span></li>
                <li><span>Edit</span></li>
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
        <div class="col-md-6">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Edit Password Login</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <form class="form-horizontal" action="<?= base_url() ?>pengurus/akun/editpass" method="post">

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Password Login Lama</label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </span>
                                    <input type="password" class="form-control" name="pass_lama" placeholder="Password lama">
                                </div>
                                <?= form_error('pass_lama', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Password Login Baru</label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </span>
                                    <input type="password" class="form-control" name="password" placeholder="Password baru">
                                </div>
                                <?= form_error('password', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row pt-2">
                            <label class="col-lg-3 control-label text-lg-right pt-2"></label>
                            <div class="col-lg-6">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <div class="col-md-6">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Edit Password Transaksi</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <form class="form-horizontal" action="<?= base_url() ?>pengurus/akun/editpasstr" method="post">

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Password Login</label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </span>
                                    <input type="password" class="form-control" name="password" placeholder="Password login">
                                </div>
                                <?= form_error('password', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Password Transaksi Baru</label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </span>
                                    <input type="password" class="form-control" name="passtr" placeholder="Password Transaksi baru">
                                </div>
                                <?= form_error('passtr', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row pt-2">
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