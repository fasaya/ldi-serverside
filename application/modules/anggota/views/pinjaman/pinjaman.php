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
                <li><span>Pinjaman Saya</span></li>
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
                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-4">
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
                                        <h4 class="title">Jumlah Pinjaman</h4>
                                        <div class="info">
                                            <strong class="amount"><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah($this->Balance->pinjaman()); ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a href="<?= base_url() ?>anggota/pinjaman/formulir" class="text-uppercase">(pengajuan pinjaman)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-4">
                    <section class="card mb-2">
                        <div class="card-body bg-tertiary">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon">
                                        <i class="fas fa-life-ring"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Pinjaman yang sudah dibayar</h4>
                                        <div class="info">
                                            <strong class="amount"><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah($this->Balance->pinjaman_bayar("1")); ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a href="<?= base_url() ?>anggota/pinjaman/laporan" class="text-uppercase">(lihat semua)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-4">
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
                                        <h4 class="title">Pinjaman yang belum dibayar</h4>
                                        <div class="info">
                                            <strong class="amount"><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah($this->Balance->pinjaman_bayar("0")); ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a href="<?= base_url() ?>anggota/pinjaman/pembayaran" class="text-uppercase">(bayar pinjaman)</a>
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

                    <h2 class="card-title">Daftar Pinjaman</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">

                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>No Ref</th>
                                <th>Jumlah</th>
                                <th>Periode</th>
                                <th>Angsuran</th>
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($mutasi_pinjaman as $r) { ?>
                                <?php
                                $status = $r->status;
                                if ($status == "0") {
                                    $detail = "Belum dikonfirmasi";
                                } elseif ($status == "1") {
                                    $detail = "Telah dikonfirmasi";
                                } elseif ($status == "9") {
                                    $detail = "Ditolak";
                                }
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?>.</td>
                                    <td><?= $r->date; ?></td>
                                    <td><?= $r->kode_tr; ?></td>
                                    <td><?= rupiah($r->amount); ?></td>
                                    <td><?= $r->periode; ?> bulan</td>
                                    <td><?= $r->angsuran; ?> kali</td>
                                    <td class="text-center"><?= $detail; ?></td>
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