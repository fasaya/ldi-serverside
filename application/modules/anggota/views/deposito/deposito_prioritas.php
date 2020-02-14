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
                <li><span>Prioritas</span></li>
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
            <h2 class="card-title">Deposito Prioritas</h2>
        </header>
        <div class="card-body">
            <table class="table table-responsive-md table-striped mb-0">
                <tbody>
                    <tr>
                        <td style="width: 200px;">Nilai Minimal</td>
                        <td><?= $currency . " " . rupiah($this->Helper->setting('DEPOSITO_PRIORITAS_MIN')) ?></td>
                    </tr>
                    <tr>
                        <td>Nilai Maximal</td>
                        <td><?= $currency . " " . rupiah($this->Helper->setting('DEPOSITO_PRIORITAS_MAX')) ?></td>
                    </tr>
                    <tr>
                        <td>Kontrak</td>
                        <td><?= $this->Helper->setting('DEPOSITO_PRIORITAS_KONTRAK') ?> bulan</td>
                    </tr>
                    <tr>
                        <td>Deviden</td>
                        <td><?= $this->Helper->setting('DEPOSITO_PRIORITAS_DEVIDEN') ?>% / tahun</td>
                    </tr>
                    <tr>
                        <td>Royalti</td>
                        <td><?= $this->Helper->setting('DEPOSITO_PRIORITAS_ROYALTI') ?>% / bulan</td>
                    </tr>
                </tbody>
            </table>
            <form class="form-horizontal" action="<?= site_url() ?>anggota/deposito/prioritas" method="post">
                <div class="form-group row">
                    <label class="col-lg-12 control-label pt-2">Nilai</label>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text">
                                    <?= $currency ?>
                                </span>
                            </span>
                            <input type="number" step="100000" min="<?= $this->Helper->setting('DEPOSITO_PRIORITAS_MIN') ?>" max="<?= $this->Helper->setting('DEPOSITO_PRIORITAS_MAX') ?>" class="form-control" placeholder="<?= $this->Balance->total_balance() ?>" name="nilai">
                        </div>
                        <?= form_error('nilai', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-12 control-label pt-2">Password Transaksi</label>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </span>
                            <input type="password" class="form-control" name="passtr">
                        </div>
                        <?= form_error('passtr', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-12 float-right">
                        <button class="btn btn-warning" type="submit">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </section>

    <!-- end: page -->
</section>