<section role="main" class="content-body">
    <header class="page-header">
        <h2>Withdrawal</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs" style="margin-right:20px">
                <li><i class="fas fa-home"></i></li>
                <li><span>Withdrawal</span></li>
                <li><span>Withdraw</span></li>
            </ol>

            <!-- <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a> -->
        </div>
    </header>

    <!-- start: page -->


    <div class="row">
        <div class="col-lg-12">
            <section class="card card-featured card-featured-warning">
                <header class="card-header">
                    <h2 class="card-title">Withdraw</h2>
                </header>
                <div class="card-body">
                    <?= $this->session->flashdata('message') ?>
                    <div class="alert alert-warning">
                        <ul class="mb-0">
                            <li>Ketika Anda mengirim permintaan withdraw, saldo Anda akan berkurang secara otomatis sesuai jumlah withdraw. Admin akan melakukan konfirmasi untuk withdraw terlebih dahulu. Saldo Anda akan kembali apabila Admin membatalkan permintaan withdraw Anda. Dan saldo akan di kirim ke rekening Anda apabila withdraw sukses.</li>
                            <li>Jumlah withdraw Anda akan dipotong <?= $this->Helper->setting('BIAYA_WD') ?>% biaya admin.</li>
                            <li>Mohon pastikan Anda telah mengisi info rekening bank Anda. Jika belum, klik <a href="<?= base_url() ?>anggota/akun/edit">disini</a>.</li>
                        </ul>
                    </div>
                    <form class="form-horizontal form-bordered" action="<?= base_url() ?>anggota/withdrawal/add" method="post">
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Account Balance</label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <?= $currency; ?>
                                        </span>
                                    </span>
                                    <input class="form-control" value="<?= $balance; ?>" type="number" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Amount</label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <?= $currency; ?>
                                        </span>
                                    </span>
                                    <input class="form-control" step="10000" type="number" min="<?= $mnwd; ?>" max="<?= $mxwd; ?>" placeholder="<?= $mnwd; ?>" name="amount" <?= $wd; ?>>
                                    <?= form_error('amount', '<p class="text-danger mb-0">', '</p>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Transaction Password</label>
                            <div class="col-lg-5">
                                <input class="form-control" type="password" placeholder="Transaction password" name="passtr" <?= $wd; ?>>
                                <?= form_error('passtr', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary pull-right" <?= $wd; ?>>Submit</button>
                        </div>
                    </form>
                </div>
            </section>


        </div>


    </div>

    <!-- end: page -->
</section>