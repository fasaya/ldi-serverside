<section role="main" class="content-body">
    <header class="page-header">
        <h2>Permohonan Pinjaman</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>pengurus/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Pinjaman</span></li>
                <li><span>Permohonan Pinjaman</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Konfirmasi Permohonan Pinjaman</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <?= $this->session->flashdata('message') ?>
                    <form class="form-horizontal" action="<?= base_url() ?>pengurus/pinjaman/updatepermohonan/<?= $kode_tr ?>" method="post">

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Nomor Anggota</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" value="<?= $anggota['no_anggota'] ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Nama Anggota</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" value="<?= $anggota['nama'] ?>" readonly>
                            </div>
                        </div>

                        <!-- divider -->

                        <div class="form-group row mt-4">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Tanggal Permohonan</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" value="<?= $data['date'] ?>" readonly>
                                <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Nomor Pinjaman</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" value="<?= $data['kode_tr'] ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Jumlah</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <?= $this->Helper->setting('CURRENCY') ?>
                                        </span>
                                    </span>
                                    <input type="number" min="100000" step="100000" class="form-control" value="<?= $data['amount'] ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Periode</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" min="1" step="1" class="form-control" value="<?= $data['periode'] ?>" readonly>
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            bulan
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Bunga</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" min="0" step="0.1" class="form-control" value="<?= $data['bunga'] ?>" readonly>
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            %
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Deskripsi</label>
                            <div class="col-lg-6">
                                <textarea class="form-control" cols="1" rows="2" readonly><?= $data['keterangan'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Status Permohonan</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="status">
                                    <option value="0">--- Pilih Status ---</option>
                                    <option value="1">Setujui</option>
                                    <option value="9">Tolak</option>
                                </select>
                                <?= form_error('status', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Password Transaksi</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </span>
                                    <input type="password" placeholder="Password transaksi" class="form-control" name="passtr">
                                </div>
                                <?= form_error('passtr', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2"></label>
                            <div class="col-lg-6">
                                <button class="btn btn-primary" type="submit">Konfirmasi</button>
                            </div>
                        </div>


                    </form>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->
</section>