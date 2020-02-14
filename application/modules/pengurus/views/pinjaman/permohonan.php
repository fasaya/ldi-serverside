<section role="main" class="content-body">
    <header class="page-header">
        <h2>Permohonan Pinjaman</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>pengurus/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Pinjaman</span></li>
                <li><span>Permohonan Pinjaman</span></li>
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
                        <div class="card-body bg-secondary">
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
                                            <strong class="amount"><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah($this->Balance->jumlah_pinjaman()); ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a href="<?= base_url() ?>pengurus/pinjaman/pinjaman" class="text-uppercase">(lihat semua)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
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
                                            <strong class="amount"><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah($this->Balance->jumlah_pinjaman_dibayar()); ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a href="<?= base_url() ?>pengurus/pinjaman/pembayaran" class="text-uppercase">(lihat semua)</a>
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

                    <h2 class="card-title">Daftar Permohonan Pinjaman</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">

                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>No. Anggota</th>
                                <th>No. Ref</th>
                                <th>Jumlah</th>
                                <th>Periode</th>
                                <th>Angsuran</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($permohonan as $r) { ?>
                                <?php
                                $status = $r->status;
                                if ($status == "0") {
                                    $keterangan = "Belum dikonfirmasi";
                                } elseif ($status == "1") {
                                    $keterangan = "Telah dikonfirmasi";
                                } elseif ($status == "9") {
                                    $keterangan = "Ditolak";
                                }
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?>.</td>
                                    <td><?= $r->date; ?></td>
                                    <td><?= $r->no_anggota; ?></td>
                                    <td><?= $r->kode_tr; ?></td>
                                    <td><?= rupiah($r->amount); ?></td>
                                    <td><?= $r->periode; ?> bulan</td>
                                    <td><?= $r->angsuran; ?> kali</td>
                                    <td class="text-center"><?= $keterangan; ?></td>
                                    <td class="text-center"><a href="<?= base_url() ?>pengurus/pinjaman/updatepermohonan/<?= $r->kode_tr; ?>">Edit</a></td>
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