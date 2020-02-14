<section role="main" class="content-body">
    <header class="page-header">
        <h2>Pengaturan Gateway</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>pengurus/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Pengaturan</span></li>
                <li><span>Gateway</span></li>
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
                    <h2 class="card-title">Pengaturan Gateway</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <form class="form-horizontal" action="<?= base_url() ?>pengurus/setting/gateway/<?= $dt['id_gateway'] ?>" method="post">

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Gateway</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" value="<?= $dt['gateway'] ?>" name="gateway" placeholder="Gateway">
                                <?= form_error('gateway', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">No. Rekening</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" value="<?= $dt['no_rekening'] ?>" name="no_rekening" placeholder="No. rekening">
                                <?= form_error('no_rekening', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Atas Nama</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" value="<?= $dt['atas_nama'] ?>" name="atas_nama" placeholder="Atas nama">
                                <?= form_error('atas_nama', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Status</label>
                            <div class="col-lg-4">
                                <select class="form-control mb-3" name="status">
                                    <option value="1" <?= ($dt['status'] == '1') ? "selected" : "" ?>>Aktif</option>
                                    <option value="0" <?= ($dt['status'] == '0') ? "selected" : "" ?>>Tidak aktif</option>
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
                                <a href="<?= base_url() ?>pengurus/setting#gateway" class="btn btn-primary" type="submit">Kembali</a>
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