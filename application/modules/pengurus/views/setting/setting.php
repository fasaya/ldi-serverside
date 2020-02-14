<section role="main" class="content-body">
    <header class="page-header">
        <h2>Pengaturan</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>pengurus/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Pengaturan</span></li>
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
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Status</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <form class="form-horizontal" action="<?= base_url() ?>pengurus/setting/status" method="post">

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Login Anggota</label>
                            <div class="col-lg-4">
                                <select class="form-control mb-3" name="login_anggota">
                                    <option value="1" <?= ($login_anggota == '1') ? "selected" : "" ?>>ON</option>
                                    <option value="0" <?= ($login_anggota == '0') ? "selected" : "" ?>>OFF</option>
                                </select>
                                <?= form_error('login_anggota', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Deposit</label>
                            <div class="col-lg-4">
                                <select class="form-control mb-3" name="deposit">
                                    <option value="1" <?= ($deposit == '1') ? "selected" : "" ?>>ON</option>
                                    <option value="0" <?= ($deposit == '0') ? "selected" : "" ?>>OFF</option>
                                </select>
                                <?= form_error('deposit', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Withdraw</label>
                            <div class="col-lg-4">
                                <select class="form-control mb-3" name="withdraw">
                                    <option value="1" <?= ($withdraw == '1') ? "selected" : "" ?>>ON</option>
                                    <option value="0" <?= ($withdraw == '0') ? "selected" : "" ?>>OFF</option>
                                </select>
                                <?= form_error('withdraw', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Deposito</label>
                            <div class="col-lg-4">
                                <select class="form-control mb-3" name="deposito">
                                    <option value="1" <?= ($deposito == '1') ? "selected" : "" ?>>ON</option>
                                    <option value="0" <?= ($deposito == '0') ? "selected" : "" ?>>OFF</option>
                                </select>
                                <?= form_error('deposito', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Simpanan</label>
                            <div class="col-lg-4">
                                <select class="form-control mb-3" name="simpanan">
                                    <option value="1" <?= ($simpanan == '1') ? "selected" : "" ?>>ON</option>
                                    <option value="0" <?= ($simpanan == '0') ? "selected" : "" ?>>OFF</option>
                                </select>
                                <?= form_error('simpanan', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Pinjaman</label>
                            <div class="col-lg-4">
                                <select class="form-control mb-3" name="pinjaman">
                                    <option value="1" <?= ($pinjaman == '1') ? "selected" : "" ?>>ON</option>
                                    <option value="0" <?= ($pinjaman == '0') ? "selected" : "" ?>>OFF</option>
                                </select>
                                <?= form_error('pinjaman', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Daftar Anggota</label>
                            <div class="col-lg-4">
                                <select class="form-control mb-3" name="daftar_anggota">
                                    <option value="1" <?= ($daftar_anggota == '1') ? "selected" : "" ?>>ON</option>
                                    <option value="0" <?= ($daftar_anggota == '0') ? "selected" : "" ?>>OFF</option>
                                </select>
                                <?= form_error('daftar_anggota', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Deviden & Royalti</label>
                            <div class="col-lg-4">
                                <select class="form-control mb-3" name="devroy">
                                    <option value="1" <?= ($devroy == '1') ? "selected" : "" ?>>ON</option>
                                    <option value="0" <?= ($devroy == '0') ? "selected" : "" ?>>OFF</option>
                                </select>
                                <?= form_error('devroy', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Bagi untung & Komisi sponsor</label>
                            <div class="col-lg-4">
                                <select class="form-control mb-3" name="share_profit">
                                    <option value="1" <?= ($share_profit == '1') ? "selected" : "" ?>>ON</option>
                                    <option value="0" <?= ($share_profit == '0') ? "selected" : "" ?>>OFF</option>
                                </select>
                                <?= form_error('share_profit', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Password Transaksi</label>
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </span>
                                    <input type="password" class="form-control" name="passtr" placeholder="Password transaksi">
                                </div>
                                <?= form_error('passtr', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2"></label>
                            <div class="col-lg-6">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Pengaturan Deposito</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <form class="form-horizontal" action="<?= base_url() ?>pengurus/setting/deposito" method="post">

                        <div class="form-group">
                            <h5 class="m-0"><strong>Nilai Minimal dan Maksimal</strong></h5>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Deposito Mikro Minimal</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <?= $currency ?>
                                        </span>
                                    </span>
                                    <input type="number" min="0" class="form-control" value="<?= $this->Helper->setting('DEPOSITO_MIKRO_MIN') ?>" name="deposito_mikro_min" placeholder="minimal">
                                </div>
                                <?= form_error('deposito_mikro_min', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Deposito Mikro Maximal</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <?= $currency ?>
                                        </span>
                                    </span>
                                    <input type="number" min="0" class="form-control" value="<?= $this->Helper->setting('DEPOSITO_MIKRO_MAX') ?>" name="deposito_mikro_max" placeholder="maximal">
                                </div>
                                <?= form_error('deposito_mikro_max', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Deposito Makro Minimal</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <?= $currency ?>
                                        </span>
                                    </span>
                                    <input type="number" min="0" class="form-control" value="<?= $this->Helper->setting('DEPOSITO_MAKRO_MIN') ?>" name="deposito_makro_min" placeholder="minimal">
                                </div>
                                <?= form_error('deposito_makro_min', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Deposito Makro Maximal</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <?= $currency ?>
                                        </span>
                                    </span>
                                    <input type="number" min="0" class="form-control" value="<?= $this->Helper->setting('DEPOSITO_MAKRO_MAX') ?>" name="deposito_makro_max" placeholder="maximal">
                                </div>
                                <?= form_error('deposito_makro_max', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Deposito Prioritas Minimal</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <?= $currency ?>
                                        </span>
                                    </span>
                                    <input type="number" min="0" class="form-control" value="<?= $this->Helper->setting('DEPOSITO_PRIORITAS_MIN') ?>" name="deposito_prioritas_min" placeholder="minimal">
                                </div>
                                <?= form_error('deposito_prioritas_min', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Deposito Prioritas Maximal</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <?= $currency ?>
                                        </span>
                                    </span>
                                    <input type="number" min="0" class="form-control" value="<?= $this->Helper->setting('DEPOSITO_PRIORITAS_MAX') ?>" name="deposito_prioritas_max" placeholder="maximal">
                                </div>
                                <?= form_error('deposito_prioritas_max', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>



                        <div class="form-group">
                            <h5 class="m-1"><strong>Kontrak dan Deviden</strong></h5>
                            <h5 class="m-1">Deposito Mikro</h5>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Kontrak Deposito Mikro</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" min="0" step="1" class="form-control" value="<?= $this->Helper->setting('DEPOSITO_MIKRO_KONTRAK') ?>" name="deposito_mikro_kontrak" placeholder="kontrak">
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            bulan
                                        </span>
                                    </span>
                                </div>
                                <?= form_error('deposito_mikro_kontrak', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Deviden Deposito Mikro</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" min="0" step="0.1" class="form-control" value="<?= $this->Helper->setting('DEPOSITO_MIKRO_DEVIDEN') ?>" name="deposito_mikro_deviden" placeholder="deviden">
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            %
                                        </span>
                                    </span>
                                </div>
                                <?= form_error('deposito_mikro_deviden', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <h5 class="m-1">Deposito Makro</h5>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Kontrak Deposito Makro 1</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" min="0" step="1" class="form-control" value="<?= $this->Helper->setting('DEPOSITO_MAKRO_1_KONTRAK') ?>" name="deposito_makro_1_kontrak" placeholder="kontrak">
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            bulan
                                        </span>
                                    </span>
                                </div>
                                <?= form_error('deposito_makro_1_kontrak', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Deviden Deposito Makro 1</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" min="0" step="0.1" class="form-control" value="<?= $this->Helper->setting('DEPOSITO_MAKRO_1_DEVIDEN') ?>" name="deposito_makro_1_deviden" placeholder="deviden">
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            %
                                        </span>
                                    </span>
                                </div>
                                <?= form_error('deposito_makro_1_deviden', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Kontrak Deposito Makro 2</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" min="0" step="1" class="form-control" value="<?= $this->Helper->setting('DEPOSITO_MAKRO_2_KONTRAK') ?>" name="deposito_makro_2_kontrak" placeholder="kontrak">
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            bulan
                                        </span>
                                    </span>
                                </div>
                                <?= form_error('deposito_makro_2_kontrak', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Deviden Deposito Makro 2</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" min="0" step="0.1" class="form-control" value="<?= $this->Helper->setting('DEPOSITO_MAKRO_2_DEVIDEN') ?>" name="deposito_makro_2_deviden" placeholder="deviden">
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            %
                                        </span>
                                    </span>
                                </div>
                                <?= form_error('deposito_makro_2_deviden', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Kontrak Deposito Makro 3</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" min="0" step="1" class="form-control" value="<?= $this->Helper->setting('DEPOSITO_MAKRO_3_KONTRAK') ?>" name="deposito_makro_3_kontrak" placeholder="kontrak">
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            bulan
                                        </span>
                                    </span>
                                </div>
                                <?= form_error('deposito_makro_3_kontrak', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Deviden Deposito Makro 3</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" min="0" step="0.1" class="form-control" value="<?= $this->Helper->setting('DEPOSITO_MAKRO_3_DEVIDEN') ?>" name="deposito_makro_3_deviden" placeholder="deviden">
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            %
                                        </span>
                                    </span>
                                </div>
                                <?= form_error('deposito_makro_3_deviden', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <h5 class="m-1">Deposito Prioritas</h5>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Kontrak Deposito Prioritas</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" min="0" step="1" class="form-control" value="<?= $this->Helper->setting('DEPOSITO_PRIORITAS_KONTRAK') ?>" name="deposito_prioritas_kontrak" placeholder="kontrak">
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            bulan
                                        </span>
                                    </span>
                                </div>
                                <?= form_error('deposito_prioritas_kontrak', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Deviden Deposito Prioritas</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" min="0" step="0.1" class="form-control" value="<?= $this->Helper->setting('DEPOSITO_PRIORITAS_DEVIDEN') ?>" name="deposito_prioritas_deviden" placeholder="deviden">
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            %
                                        </span>
                                    </span>
                                </div>
                                <?= form_error('deposito_prioritas_deviden', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Royalti Deposito Prioritas</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" min="0" step="0.1" class="form-control" value="<?= $this->Helper->setting('DEPOSITO_PRIORITAS_ROYALTI') ?>" name="deposito_prioritas_royalti" placeholder="deviden">
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            %
                                        </span>
                                    </span>
                                </div>
                                <?= form_error('deposito_prioritas_royalti', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Password Transaksi</label>
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </span>
                                    <input type="password" class="form-control" name="passtr" placeholder="Password transaksi">
                                </div>
                                <?= form_error('passtr', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2"></label>
                            <div class="col-lg-6">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Pengaturan Deposit</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <form class="form-horizontal" action="<?= base_url() ?>pengurus/setting/deposit" method="post">
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Minimal Deposit</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <?= $currency ?>
                                        </span>
                                    </span>
                                    <input type="number" min="0" step="10000" class="form-control" value="<?= $this->Helper->setting('DEPO_MIN') ?>" name="depo_min" placeholder="minimal">
                                </div>
                                <?= form_error('depo_min', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Maksimal Deposit</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <?= $currency ?>
                                        </span>
                                    </span>
                                    <input type="number" min="0" step="10000" class="form-control" value="<?= $this->Helper->setting('DEPO_MAX') ?>" name="depo_max" placeholder="maximal">
                                </div>
                                <?= form_error('depo_max', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Password Transaksi</label>
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </span>
                                    <input type="password" class="form-control" name="passtr" placeholder="Password transaksi">
                                </div>
                                <?= form_error('passtr', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2"></label>
                            <div class="col-lg-6">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <div class="row" id="withdrawal">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Pengaturan Withdrawal</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <form class="form-horizontal" action="<?= base_url() ?>pengurus/setting/withdrawal" method="post">
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Minimal Withdrawal</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <?= $currency ?>
                                        </span>
                                    </span>
                                    <input type="number" min="0" step="10000" class="form-control" value="<?= $this->Helper->setting('WD_MIN') ?>" name="wd_min" placeholder="minimal">
                                </div>
                                <?= form_error('wd_min', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Maksimal Withdrawal</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <?= $currency ?>
                                        </span>
                                    </span>
                                    <input type="number" min="0" step="10000" class="form-control" value="<?= $this->Helper->setting('WD_MAX') ?>" name="wd_max" placeholder="maximal">
                                </div>
                                <?= form_error('wd_max', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Biaya Admin Withdrawal</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" min="0" step="0.1" class="form-control" value="<?= $this->Helper->setting('BIAYA_WD') ?>" name="biaya_wd" placeholder="Biaya admin wd">
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            %
                                        </span>
                                    </span>
                                </div>
                                <?= form_error('biaya_wd', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Password Transaksi</label>
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </span>
                                    <input type="password" class="form-control" name="passtr" placeholder="Password transaksi">
                                </div>
                                <?= form_error('passtr', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2"></label>
                            <div class="col-lg-6">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <div class="row" id="pinjaman">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Pengaturan Pinjaman</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jangka waktu</th>
                                <th>Bunga</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($bunga_pinjaman as $u) :  ?>
                                <tr>
                                    <td><?= $no; ?>.</td>
                                    <td><?= $u->jangka_waktu; ?> bulan</td>
                                    <td><?= $u->bunga; ?> %</td>
                                    <td><?= ($u->status == '1') ? "Aktif" : "Tidak aktif"; ?></td>
                                    <td><a href="<?= base_url() ?>pengurus/setting/pinjaman/<?= $u->id_setting_pinjaman; ?>">Edit</a></td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <div class="row" id="bagiuntung">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Pengaturan Bagi Untung (Share Profit Simpanan Sukarela)</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Bulan</th>
                                <th>Profit</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($bagi_untung as $u) :  ?>
                                <tr>
                                    <td><?= $no; ?>.</td>
                                    <td><?= date("F", mktime(0, 0, 0, $u->bulan, 10)); ?></td>
                                    <td><?= $u->profit; ?> %</td>
                                    <td><a href="<?= base_url() ?>pengurus/setting/bagiuntung/<?= $u->kode; ?>">Edit</a></td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>



    <div class="row" id="gateway">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Pengaturan Gateway</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <!-- <a href="<?= base_url() ?>pengurus/deposit/export" target="_blank" type="submit" class="btn btn-default mb-3">Export</a> -->
                    <a onclick="showDataToModal()" class="btn btn-default mb-3 modal-basic" href="#modalPrimary"><i class="fas fa-plus"></i> Tambah Gateway</a>
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Gateway</th>
                                <th>No. Rekening</th>
                                <th>Atas Nama</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($gateway as $u) :  ?>
                                <tr>
                                    <td><?= $no; ?>.</td>
                                    <td><?= $u->gateway; ?></td>
                                    <td><?= $u->no_rekening; ?></td>
                                    <td><?= $u->atas_nama; ?></td>
                                    <td><?= ($u->status == '1') ? "Aktif" : "Tidak aktif"; ?></td>
                                    <td><a href="<?= base_url() ?>pengurus/setting/gateway/<?= $u->id_gateway; ?>">Edit</a></td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <div class="row" id="komisisponsor">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Komisi Sponsor</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <form class="form-horizontal" action="<?= base_url() ?>pengurus/setting/komisisponsor" method="post">

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Komisi Awal</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" min="0" step="0.1" class="form-control" value="<?= $this->Helper->setting('KOMISI_SPONSOR_AWAL') ?>" name="komisi_sponsor_awal" placeholder="Komisi sponsor awal">
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            %
                                        </span>
                                    </span>
                                </div>
                                <?= form_error('komisi_sponsor_awal', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Komisi Berjalan</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" min="0" step="0.1" class="form-control" value="<?= $this->Helper->setting('KOMISI_SPONSOR_BERJALAN') ?>" name="komisi_sponsor_berjalan" placeholder="Komisi sponsor berjalan">
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            %
                                        </span>
                                    </span>
                                </div>
                                <?= form_error('komisi_sponsor_berjalan', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Password Transaksi</label>
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </span>
                                    <input type="password" class="form-control" name="passtr" placeholder="Password transaksi">
                                </div>
                                <?= form_error('passtr', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row pt-2">
                            <label class="col-lg-3 control-label text-lg-right pt-2"></label>
                            <div class="col-lg-6">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Pengaturan Lainnya</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <form class="form-horizontal" action="<?= base_url() ?>pengurus/setting/lainnya" method="post">

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Keuntungan Koperasi</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <?= $currency ?>
                                        </span>
                                    </span>
                                    <input type="number" class="form-control" value="<?= $this->Helper->setting('KEUNTUNGAN_KOPERASI') ?>" name="keuntungan_koperasi" placeholder="Keuntungan Koperasi">
                                </div>
                                <?= form_error('keuntungan_koperasi', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Biaya Pendaftaran</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <?= $currency ?>
                                        </span>
                                    </span>
                                    <input type="number" min="0" step="1000" class="form-control" value="<?= $this->Helper->setting('BIAYA_PENDAFTARAN') ?>" name="biaya_pendaftaran" placeholder="Biaya pendaftaran">
                                </div>
                                <?= form_error('biaya_pendaftaran', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Password Transaksi</label>
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </span>
                                    <input type="password" class="form-control" name="passtr" placeholder="Password transaksi">
                                </div>
                                <?= form_error('passtr', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row pt-2">
                            <label class="col-lg-3 control-label text-lg-right pt-2"></label>
                            <div class="col-lg-6">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Pengaturan Waktu</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <form class="form-horizontal" action="<?= base_url() ?>pengurus/setting/waktu" method="post">

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Status Tanggal</label>
                            <div class="col-lg-3">
                                <select class="form-control" name="status_tgl">
                                    <option value="1" <?= ($tgl == '1') ? "selected" : "" ?>>Manual</option>
                                    <option value="0" <?= ($tgl == '0') ? "selected" : "" ?>>Otomatis</option>
                                </select>
                                <?= form_error('status_tgl', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Tanggal [<?= $this->Helper->setting('TGL') ?>]</label>
                            <div class="col-lg-2">
                                <input type="number" step="1" class="form-control" name="nilai_tgl" value="0">
                                <?= form_error('nilai_tgl', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Password Transaksi</label>
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </span>
                                    <input type="password" class="form-control" name="passtr" placeholder="Password transaksi">
                                </div>
                                <?= form_error('passtr', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2"></label>
                            <div class="col-lg-6">
                                <button class="btn btn-success" name="reset" type="submit">Reset Tanggal</button>
                                <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->
</section>

<!-- JS -->
<script>
    function showDataToModal() {

        $.ajax({
            url: "<?= base_url(); ?>pengurus/setting/fetch_add_gateway",
            method: "POST",
            success: function(data) {
                $('#isiCard').html(data);
            }
        });

    }
</script>