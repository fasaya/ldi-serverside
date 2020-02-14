<section role="main" class="content-body">
    <header class="page-header">
        <h2>Pinjaman</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>anggota/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Pinjaman</span></li>
                <li><span>Permohonan Pinjaman Kredit</span></li>
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
                    <h2 class="card-title">Formulir Permohonan Pinjaman</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <form class="form-horizontal" action="<?= base_url() ?>anggota/pinjaman/formulir" method="post">
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Jumlah Pinjaman</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <?= $this->Helper->setting('CURRENCY') ?>
                                        </span>
                                    </span>
                                    <input type="number" min="0" step="100000" class="form-control" value="<?= set_value('nilai'); ?>" name="nilai" placeholder="Jumlah pinjaman">
                                </div>
                                <?= form_error('nilai', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Jangka Waktu Pinjaman</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="jangka">
                                    <?php foreach ($pinjaman as $r) { ?>
                                        <option value="<?= $r->id_setting_pinjaman; ?>"><?= $r->jangka_waktu; ?> bulan</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Berapa Kali Angsuran</label>
                            <div class="col-lg-4">
                                <input type="number" min="1" step="1" class="form-control" value="<?= set_value('angsuran'); ?>" name="angsuran" placeholder="Berapa kali angsuran">
                                <?= form_error('angsuran', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Keterangan</label>
                            <div class="col-lg-6">
                                <textarea class="form-control mb-3" name="keterangan" rows="2" placeholder="Untuk keperluan..."><?= set_value('keterangan'); ?></textarea>
                                <?= form_error('keterangan', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Password Transaksi</label>
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </span>
                                    <input type="password" class="form-control" name="passtr">
                                </div>
                                <?= form_error('passtr', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2"></label>
                            <div class="col-lg-6">
                                <button class="btn btn-primary" type="submit">Ajukan Permohonan</button>
                            </div>
                        </div>


                    </form>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->
</section>