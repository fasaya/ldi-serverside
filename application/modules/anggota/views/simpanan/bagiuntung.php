<section role="main" class="content-body">
    <header class="page-header">
        <h2>Bagi Untung</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>anggota/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Simpanan</span></li>
                <li><span>Bagi Untung</span></li>
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
                    <h2 class="card-title">Bagi Untung</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>No. Ref Bagi Untung</th>
                                <th>No. Ref Simpanan Sukarela</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($bagiuntung as $r) { ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?>.</td>
                                    <td><?= $r->date; ?></td>
                                    <td><?= $r->kode_tr_bu; ?></td>
                                    <td><?= $r->kode_tr_ss; ?></td>
                                    <td><?= $this->Helper->setting('CURRENCY') ?> <?= rupiah($r->amount); ?></td>
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