<section role="main" class="content-body">
    <header class="page-header">
        <h2>Withdrawal batal</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs" style="margin-right:20px">
                <li><i class="fas fa-home"></i></li>
                <li><span>Withdrawal</span></li>
                <li><span>Dibatalkan</span></li>
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

                    <h2 class="card-title">Withdrawal dibatalkan</h2>
                    <!-- <a href="#">
                        <p class="card-subtitle">Click here to view all your investment history</p>
                    </a> -->
                </header>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <a href="<?= base_url() ?>pengurus/withdrawal/exportcancelled" target="_blank" type="submit" class="btn btn-default mb-3">Export</a>
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Anggota</th>
                                <th>No. Ref</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($record as $u) :  ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?>.</td>
                                    <td>
                                        <b class="text-primary"><?= $u->no_anggota; ?></b><br>
                                        <?= $u->nama; ?>
                                    </td>
                                    <td><?= $u->kode_tr; ?></td>
                                    <td><?= $currency; ?> <?= rupiah($u->amount); ?></td>
                                    <td><?= $u->date; ?></td>
                                    <td><span class="badge badge-danger">Dibatalkan</span></td>
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