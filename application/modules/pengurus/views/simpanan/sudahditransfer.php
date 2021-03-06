<section role="main" class="content-body">
    <header class="page-header">
        <h2>Simpanan yang sudah ditransfer</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>pengurus/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Simpanan</span></li>
                <li><span>Simpanan yang sudah ditransfer</span></li>
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

    <div class="row pt-3">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Simpanan yang sudah ditransfer</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <a href="<?= base_url() ?>pengurus/simpanan/exportditransfer" target="_blank" type="submit" class="btn btn-default mb-3">Export</a>
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Anggota</th>
                                <th>No. Ref</th>
                                <th>Deskripsi</th>
                                <th>Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($simpanan as $r) { ?>
                                <?php
                                $kode = $r->tipe;
                                if ($kode == "SW") {
                                    $desc = "Simpanan wajib";
                                } elseif ($kode == "SP") {
                                    $desc = "Simpanan pokok";
                                } elseif ($kode == "SS") {
                                    $desc = "Simpanan sukarela";
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
                                    <td><?= $r->kode_tr_simp; ?><br><?= $desc; ?></td>
                                    <td><?= rupiah($r->amount); ?></td>
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