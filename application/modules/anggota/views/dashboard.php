<section role="main" class="content-body">
    <header class="page-header">
        <h2>Halaman Utama</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>anggota/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <!-- <li><span>Layouts</span></!--> -->
                <!-- <li><span>Light Sidebar</span></li> -->
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

    <?php if ($alert) { ?>
        <section class="card card-transparent mt-0 mb-2">
            <div class="card-body">
                <div class="alert alert-warning">
                    Untuk dapat mengajukan pinjaman, mendaftarkan anggota dan transaksi lainnya, mohon untuk
                    <br>
                    <ul class="mb-1">
                        <?= $keterangan; ?>
                    </ul>
                </div>
            </div>
        </section>
    <?php } ?>

    <section class="card card-featured card-featured-success mt-0 mb-4">
        <header class="card-header">
            <div class="card-actions">
                <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
            </div>

            <h2 class="card-title">Kode Referal</h2>
        </header>
        <div class="card-body">
            <div class="input-group">
                <input type="text" id="toCopy" class="form-control" value="<?= site_url() ?>anggota/register/referral/<?= $username; ?>" readonly>
                <span class="input-group-append">
                    <button onclick="copyToClipboard('toCopy')" id="btn-copy" class="btn btn-success">Salin kode referal <i class="fas fa-copy"></i></button>
                </span>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-12">
            <!-- <h5 class="font-weight-semibold text-dark text-uppercase mb-3">Koperasi</h5> -->
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-4">
                    <section class="card mb-4">
                        <div class="card-body bg-tertiary">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Jumlah Anggota</h4>
                                        <div class="info">
                                            <strong class="amount"><?= $this->Balance->jumlah_anggota(); ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <!-- <a class="text-uppercase">(view all)</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-4">
                    <section class="card mb-4">
                        <div class="card-body bg-secondary">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Jumlah Simpanan</h4>
                                        <div class="info">
                                            <strong class="amount"><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah($this->Balance->jumlah_simpanan()); ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <!-- <a href="<?= base_url() ?>anggota/simpanan" class="text-uppercase">(view all)</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-4">
                    <section class="card mb-4">
                        <div class="card-body bg-hijau-2">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon">
                                        <i class="fas fa-wallet"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Saldo Dompet</h4>
                                        <div class="info">
                                            <strong class="amount"><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah($this->Balance->total_balance()); ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <!-- <a class="text-uppercase">(view all)</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- <h5 class="font-weight-semibold text-dark text-uppercase mt-3">Anggota</h5> -->
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-4">
                    <section class="card mb-4">
                        <div class="card-body bg-ungu-1">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon">
                                        <i class="fas fa-hand-holding-usd"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Keuntungan</h4>
                                        <div class="info">
                                            <strong class="amount"><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah($this->Helper->setting('KEUNTUNGAN_KOPERASI')); ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <!-- <a class="text-uppercase">(view all)</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-4">
                    <section class="card mb-4">
                        <div class="card-body bg-kuning-1">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon">
                                        <i class="fas fa-coins"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Alokasi Pinjaman</h4>
                                        <div class="info">
                                            <strong class="amount"><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah($this->Balance->jumlah_pinjaman()); ?></strong><br>
                                            <!-- <strong class="amount"><i class="fas fa-user"></i> 1281</strong> -->
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <!-- <a class="text-uppercase">(view all)</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-4">
                    <section class="card mb-4">
                        <div class="card-body bg-info">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon">
                                        <i class="fas fa-credit-card"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Total Tabungan</h4>
                                        <div class="info">
                                            <strong class="amount"><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah($this->Balance->jumlah_deposito()); ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <!-- <a class="text-uppercase">(view all)</a> -->
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
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Grafik Simpan - Pinjam</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body" id="cardmorrisBar">
                    <h4 class="text-center">Simpanan - Pinjaman Tahun <?= date("Y", strtotime(new_date())); ?></h4>

                    <!-- Morris: Bar -->
                    <?= $grafik; ?>
                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Mutasi Dompet</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <div class="alert alert-default">
                        <form method="POST" action="<?= base_url() ?>anggota/mutasi/filter">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="control-label text-lg-right">Tahun</label>
                                    <select class="form-control" name="tahun">
                                        <option value="">Semua</option>
                                        <?php
                                        $hari_ini = new_date();
                                        $tahun_ini = date("Y", strtotime($hari_ini));

                                        for ($i = 2020; $i <= $tahun_ini; $i++) {
                                        ?>
                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label class="control-label text-lg-right">Bulan</label>
                                    <select class="form-control" name="bulan">
                                        <option value="">Semua</option>
                                        <?php
                                        for ($i = 1; $i <= 12; $i++) {
                                            $monthName = date('F', mktime(0, 0, 0, $i, 10));
                                        ?>
                                            <option value="<?= $i; ?>"><?= $monthName; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- <div class="col-lg-4">
                                    <label class="control-label text-lg-right">Tanggal</label>
                                    <select class="form-control" name="hari">
                                        <option value="0">Semua</option>
                                        <?php
                                        for ($i = 01; $i <= 31; $i++) {
                                        ?>
                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div> -->
                                <div class="col-lg-12 pt-3">
                                    <button type="submit" class="btn btn-default">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>No Ref</th>
                                <th>Deskripsi</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th class="text-center">Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($mutasi as $r) { ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?>.</td>
                                    <td><?= $r->date; ?></td>
                                    <td><?= $r->kode_tr; ?></td>
                                    <td><?= $r->deskripsi; ?></td>
                                    <td><?= rupiah($r->debit); ?></td>
                                    <td><?= rupiah($r->credit); ?></td>
                                    <td><?= rupiah($r->saldo); ?></td>
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

<!-- JS -->
<script>
    // $(document).ready(function() {

    // });

    function copyToClipboard(element) {
        /* Get the text field */
        var copyText = document.getElementById(element);

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /*For mobile devices*/

        /* Copy the text inside the text field */
        document.execCommand("copy");
    }

    Morris.Bar({
        element: 'morrisBar',
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Simpanan', 'Pinjaman']
    });
</script>