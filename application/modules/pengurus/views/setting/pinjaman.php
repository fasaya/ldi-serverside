<section role="main" class="content-body">
    <header class="page-header">
        <h2>Pengaturan Pinjaman</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>pengurus/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Pengaturan</span></li>
                <li><span>Pinjaman</span></li>
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
                    <h2 class="card-title">Pengaturan Pinjaman</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <form class="form-horizontal" action="<?= base_url() ?>pengurus/setting/pinjaman/<?= $pj['id_setting_pinjaman'] ?>" method="post">

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Jangka Waktu</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" min="0" step="1" class="form-control" value="<?= $pj['jangka_waktu'] ?>" name="jangka_waktu" placeholder="Jangka waktu">
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            bulan
                                        </span>
                                    </span>
                                </div>
                                <?= form_error('jangka_waktu', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Bunga</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" min="0" step="0.1" class="form-control" value="<?= $pj['bunga'] ?>" name="bunga" placeholder="bunga">
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            %
                                        </span>
                                    </span>
                                </div>
                                <?= form_error('bunga', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Status</label>
                            <div class="col-lg-4">
                                <select class="form-control mb-3" name="status">
                                    <option value="1" <?= ($pj['status'] == '1') ? "selected" : "" ?>>Aktif</option>
                                    <option value="0" <?= ($pj['status'] == '0') ? "selected" : "" ?>>Tidak aktif</option>
                                </select>
                                <?= form_error('status', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Password Transaksi</label>
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </span>
                                    <input type="password" class="form-control" name="passtr" placeholder="Password transaksi">
                                </div>
                                <?= form_error('passtr', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2"></label>
                            <div class="col-lg-6">
                                <a href="<?= base_url() ?>pengurus/setting#pinjaman" class="btn btn-primary" type="submit">Kembali</a>
                                <button class="btn btn-success" type="submit">Ubah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->
</section>