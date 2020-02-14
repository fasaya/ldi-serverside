<section role="main" class="content-body">
    <header class="page-header">
        <h2>Detail Pinjaman [<?= $kode_tr ?>]</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>pengurus/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Pinjaman</span></li>
                <li><span>Detail Pinjaman</span></li>
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
                                        <h4 class="title">Pinjaman Dibayar</h4>
                                        <div class="info">
                                            <strong class="amount"><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah(0); ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <!-- <a href="<?= base_url() ?>pengurus/pinjaman/pembayaran" class="text-uppercase">(lihat semua)</a> -->
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
                                        <h4 class="title">Pinjaman Belum Dibayar</h4>
                                        <div class="info">
                                            <strong class="amount"><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah(0); ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <!-- <a href="<?= base_url() ?>pengurus/pinjaman/pinjaman" class="text-uppercase">(lihat semua)</a> -->
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

                    <h2 class="card-title">Detail Pembayaran Pinjaman [<?= $kode_tr ?>]</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">

                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Jatuh Tempo</th>
                                <th>No. Anggota</th>
                                <th>No. Ref</th>
                                <th>Jumlah</th>
                                <th>Angsuran Ke</th>
                                <th class="text-center">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data as $r) { ?>
                                <?php
                                $status = $r->status;
                                if ($status == "0") {
                                    $keterangan = "Belum dibayar";
                                } elseif ($status == "1") {
                                    $keterangan = "Telah dibayar";
                                }
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?>.</td>
                                    <td><?= $r->date; ?></td>
                                    <td><?= $r->no_anggota; ?></td>
                                    <td><?= $r->kode_tr; ?></td>
                                    <td><?= $currency ?> <?= rupiah($r->amount); ?></td>
                                    <td><?= $r->angsuran_ke; ?></td>
                                    <td class="text-center"><?= $keterangan; ?></td>
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