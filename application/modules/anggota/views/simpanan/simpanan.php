<section role="main" class="content-body">
    <header class="page-header">
        <h2>Simpanan</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>anggota/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Simpanan</span></li>
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

    <?php if (validation_errors()) { ?>
        <section class="card card-transparent">
            <div class="card-body">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?= validation_errors(); ?>
                </div>
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
                                        <h4 class="title">Simpanan Pokok</h4>
                                        <div class="info">
                                            <strong class="amount"><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah($this->Balance->simpanan_pokok()); ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <?= $link_simp_pokok; ?>
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
                                        <h4 class="title">Simpanan Wajib</h4>
                                        <div class="info">
                                            <strong class="amount"><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah($this->Balance->simpanan_wajib()); ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a onclick="showBayarSimpananWajib()" class="modal-basic text-uppercase" href="#modalPrimary">(KLIK UNTUK BAYAR)</a>
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
                                            <strong class="amount"><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah($this->Balance->simpanan_sukarela()); ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a onclick="showBayarSimpananSukarela()" class="modal-basic" href="#modalPrimary" class="text-uppercase">(KLIK UNTUK BAYAR)</a>
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
                                            <strong class="amount"><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah($this->Balance->simpanan_yg_bisa_diambil_by_tipe()); ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a class="text-uppercase">lihat semua</a>
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

                    <h2 class="card-title">Laporan Mutasi Simpanan</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">

                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>No Ref</th>
                                <th>Deskripsi</th>
                                <th>Jumlah</th>
                                <th>Transfer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($mutasi_simpanan as $r) { ?>
                                <?php
                                $kode = substr($r->kode_tr, 0, 2);
                                if ($kode == "SW") {
                                    $desc = "Membayar simpanan wajib untuk " . $this->Simpanan->tglSimpWajib_byKodeTR($r->kode_tr);
                                } elseif ($kode == "SP") {
                                    $desc = "Membayar simpanan pokok";
                                } elseif ($kode == "SS") {
                                    $desc = "Membayar simpanan sukarela";
                                }

                                $hari_ini = strtotime(new_date());
                                $date = $r->date;
                                $tgl_tambah1thn =  strtotime("+1 year", strtotime($date));
                                $kurang = $hari_ini - $tgl_tambah1thn;
                                $selisih = floor($kurang / (24 * 60 * 60)); // convert to days

                                if ($selisih >= 0 && $r->is_in_saldo == "0") {
                                    $link = '<a href="' . base_url() . 'anggota/simpanan/pindahkesaldo/' . $r->kode_tr . '">Transfer ke saldo dompet</a>';
                                    // $link = $date . "->" . date("Y-m-d H:i:s", $tgl_tambah1thn) . " " . $selisih;
                                } elseif ($selisih >= 0 && $r->is_in_saldo == "1") {
                                    $link = 'Sudah di transfer';
                                } else {
                                    // $link = $date . "->" . date("Y-m-d H:i:s", $tgl_tambah1thn) . " " . $selisih;
                                    $link = '-';
                                }
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?>.</td>
                                    <td><?= $r->date; ?></td>
                                    <td><?= $r->kode_tr; ?></td>
                                    <td><?= $desc; ?></td>
                                    <td><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah($r->amount); ?></td>
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

<!-- JS -->
<script>
    function showBayarSimpananWajib() {

        $.ajax({
            url: "<?= base_url(); ?>anggota/simpanan/fetchModalSimpananWajib",
            method: "POST",
            data: {},
            success: function(data) {
                $('#isiCard').html(data);
            }
        });
    }

    function showBayarSimpananPokok() {

        $.ajax({
            url: "<?= base_url(); ?>anggota/simpanan/fetchModalSimpananPokok",
            method: "POST",
            data: {},
            success: function(data) {
                $('#isiCard').html(data);
            }
        });
    }

    function showBayarSimpananSukarela() {

        $.ajax({
            url: "<?= base_url(); ?>anggota/simpanan/fetchModalSimpananSukarela",
            method: "POST",
            data: {},
            success: function(data) {
                $('#isiCard').html(data);
            }
        });
    }
</script>