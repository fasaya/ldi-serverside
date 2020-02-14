<section role="main" class="content-body">
    <header class="page-header">
        <h2>Permintaan Deposit Diproses</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs" style="margin-right:20px">
                <li><i class="fas fa-home"></i></li>
                <li><span>Deposit</span></li>
                <li><span>Permintaan Deposit Diproses</span></li>
            </ol>

            <!-- <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a> -->
        </div>
    </header>

    <!-- start: page -->

    <div class="row">
        <div class="col-lg-12">
            <section class="card card-featured card-featured-info">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <!-- <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a> -->
                    </div>

                    <h2 class="card-title">Permintaan Deposit Diproses</h2>
                    <!-- <a href="#">
                        <p class="card-subtitle">Click here to view all your investment history</p>
                    </a> -->
                </header>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <a href="<?= base_url() ?>pengurus/deposit/export" target="_blank" type="submit" class="btn btn-default mb-3">Export</a>
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Anggota</th>
                                <th>Jumlah</th>
                                <th>Gateway</th>
                                <th>Kode</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($record as $u) :  ?>
                                <?php
                                $stts = $u->status;
                                if ($stts == '1') {
                                    $status = '<span class="badge badge-success">Telah diproses</span>';
                                } elseif ($stts == '9') {
                                    $status = '<span class="badge badge-danger">Dibatalkan</span>';
                                }
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?>.</td>
                                    <td>
                                        <b class="text-primary"><?= $u->no_anggota; ?></b><br>
                                        <?= $u->nama; ?>
                                    </td>
                                    <td><?= $currency; ?> <?= rupiah($u->amount + $u->last_code); ?></td>
                                    <td><?= $u->gateway; ?></td>
                                    <td><?= $u->code; ?></td>
                                    <td><?= $u->date; ?></td>
                                    <td><?= $status; ?></td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->
</section>