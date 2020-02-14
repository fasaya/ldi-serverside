<section role="main" class="content-body">
    <header class="page-header">
        <h2>Deposito</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>anggota/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Deposito</span></li>
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

    <section class="card card-warning mt-2 mb-4">
        <header class="card-header">
            <h2 class="card-title">Deposito</h2>
        </header>
        <div class="card-body">
            <form class="form-horizontal" action="<?= site_url() ?>anggota/deposito/deposito" method="post">
                <div class="form-group row">
                    <label class="col-lg-2 control-label text-lg-right pt-2">Deposito</label>
                    <div class="col-lg-7">
                        <select name="pilih" class="form-control mb-3">
                            <option value="mikro"><?= $mikro; ?></option>
                            <option value="makro"><?= $makro; ?></option>
                            <option value="prioritas"><?= $prioritas; ?></option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <button class="btn btn-warning" type="submit">Pilih</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Laporan Daftar Deposito</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">

                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Ref</th>
                                <th>Nilai</th>
                                <th>Kontrak</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Berakhir</th>
                                <th class="text-center">Tipe</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($deposito as $r) { ?>
                                <tr>
                                    <td><?= $no; ?>.</td>
                                    <td><?= $r->kode_tr; ?></td>
                                    <td><?= $currency . " " . rupiah($r->amount); ?></td>
                                    <td><?= $r->bulan; ?> bulan</td>
                                    <td><?= $r->start_date; ?></td>
                                    <td><?= $r->end_date; ?></td>
                                    <td><?= $r->tipe; ?></td>
                                    <td><?= ($r->status == '1') ? "Berlangsung" : "Berakhir";  ?></td>
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