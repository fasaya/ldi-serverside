<section role="main" class="content-body">
    <header class="page-header">
        <h2>Royalti</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>anggota/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Deposito</span></li>
                <li><span>Royalti</span></li>
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
                    <h2 class="card-title">Laporan Daftar Royalti</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">

                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No. Ref</th>
                                <th>No. Deposito</th>
                                <th>Nilai</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($royalti as $r) { ?>
                                <tr>
                                    <td><?= $no; ?>.</td>
                                    <td><?= $r->kode_RY; ?></td>
                                    <td><?= $r->kode_DO; ?></td>
                                    <td><?= $currency . " " . rupiah($r->amount); ?></td>
                                    <td><?= $r->date  ?></td>
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