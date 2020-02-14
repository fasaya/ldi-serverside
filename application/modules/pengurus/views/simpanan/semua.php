<section role="main" class="content-body">
    <header class="page-header">
        <h2>Simpanan</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>pengurus/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Simpanan</span></li>
                <li><span>Semua Simpanan Anggota</span></li>
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
        <div class="col-12">
            <!-- <h5 class="font-weight-semibold text-dark text-uppercase mb-3 mt-3">Box Colors</h5> -->
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-6">
                    <section class="card mb-2">
                        <div class="card-body bg-primary">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon">
                                        <i class="fas fa-life-ring"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Total Simpanan Pokok</h4>
                                        <div class="info">
                                            <strong class="amount"><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah($this->Simpanan->total_simpanan_pokok()); ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a href="<?= base_url() ?>pengurus/simpanan/pokok" class="text-uppercase">(LIHAT SEMUA)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-6">
                    <section class="card mb-2">
                        <div class="card-body bg-secondary">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon">
                                        <i class="fas fa-life-ring"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Total Simpanan Wajib</h4>
                                        <div class="info">
                                            <strong class="amount"><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah($this->Simpanan->total_simpanan_wajib()); ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a href="<?= base_url() ?>pengurus/simpanan/wajib" class="text-uppercase">(LIHAT SEMUA)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="row pt-0">
        <div class="col-12">
            <!-- <h5 class="font-weight-semibold text-dark text-uppercase mb-3 mt-3">Box Colors</h5> -->
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-6">
                    <section class="card mb-2">
                        <div class="card-body bg-success">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon">
                                        <i class="fas fa-life-ring"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Simpanan Sukarela</h4>
                                        <div class="info">
                                            <strong class="amount"><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah($this->Simpanan->total_simpanan_sukarela()); ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a href="<?= base_url() ?>pengurus/simpanan/sukarela" class="text-uppercase">(LIHAT SEMUA)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-6">
                    <section class="card mb-2">
                        <div class="card-body bg-info">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon">
                                        <i class="fas fa-life-ring"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Simpanan Sudah Ditransfer</h4>
                                        <div class="info">
                                            <strong class="amount"><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah($this->Simpanan->total_simpanan_yg_bisa_diambil()); ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a href="<?= base_url() ?>pengurus/simpanan/sudahditransfer" class="text-uppercase">(LIHAT SEMUA)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="row pt-3">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Semua Simpanan Anggota</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <a href="<?= base_url() ?>pengurus/simpanan/exportsemua" target="_blank" type="submit" class="btn btn-default mb-3">Export</a>
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>No Ref</th>
                                <th>Deskripsi</th>
                                <th>Biaya</th>
                                <th>Transfer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($semua_simpanan as $r) { ?>
                                <?php
                                $kode = substr($r->kode_tr, 0, 2);
                                if ($kode == "SW") {
                                    $desc = "Simpanan wajib";
                                } elseif ($kode == "SP") {
                                    $desc = "Simpanan pokok";
                                } elseif ($kode == "SS") {
                                    $desc = "Simpanan sukarela";
                                }

                                $hari_ini = strtotime(new_date());
                                $date = $r->date;
                                $tgl_tambah1thn =  strtotime("+1 year", strtotime($date));
                                $kurang = $hari_ini - $tgl_tambah1thn;
                                $selisih = floor($kurang / (24 * 60 * 60)); // convert to days

                                if ($selisih >= 0 && $r->is_in_saldo == "0") {
                                    $link = 'Belum ditransfer';
                                } elseif ($selisih >= 0 && $r->is_in_saldo == "1") {
                                    $link = 'Sudah ditransfer';
                                } else {
                                    $link = '';
                                }
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?>.</td>
                                    <td><?= $r->date; ?></td>
                                    <td>
                                        <b class="text-primary"><?= $r->no_anggota; ?></b><br>
                                        <?= $r->nama; ?>
                                    </td>
                                    <td><?= $r->kode_tr; ?></td>
                                    <td><?= $desc; ?></td>
                                    <td><?= rupiah($r->amount); ?></td>
                                    <td><?= $link; ?></td>
                                </tr>
                                <?php $no++; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->
</section>