<section role="main" class="content-body">
    <header class="page-header">
        <h2>Semua Transaksi Anggota</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>pengurus/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Keanggotaan</span></li>
                <li><span>Transaksi Anggota</span></li>
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
                    <h2 class="card-title">Export</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <div class="alert alert-default mt-2">
                        <form method="POST" action="<?= base_url() ?>pengurus/keanggotaan/export">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="control-label text-lg-right">Tahun</label>
                                    <select class="form-control" name="tahun">
                                        <option value="0">Semua</option>
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
                                <div class="col-lg-4">
                                    <label class="control-label text-lg-right">Bulan</label>
                                    <select class="form-control" name="bulan">
                                        <option value="0">Semua</option>
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
                                <div class="col-lg-4">
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
                                </div>
                                <div class="col-lg-12 pt-3">
                                    <button type="submit" class="btn btn-default">Export</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Semua Transaksi Anggota</h2>
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
                                <th>Debit</th>
                                <th>Kredit</th>
                                <th>Saldo</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($mutasi as $r) { ?>
                                <tr>
                                    <td><?= $no; ?>.</td>
                                    <td><?= $r->date ?></td>
                                    <td>
                                        <b class="text-primary"><?= $r->no_anggota; ?></b><br>
                                        <?= $r->nama; ?>
                                    </td>
                                    <td><?= $r->kode_tr ?></td>
                                    <td><?= rupiah($r->debit) ?></td>
                                    <td><?= rupiah($r->credit) ?></td>
                                    <td><?= rupiah($r->saldo) ?></td>
                                    <td><?= $r->deskripsi ?></td>
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