<section role="main" class="content-body">
    <header class="page-header">
        <h2>Keanggotaan</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>pengurus/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Keanggotaan</span></li>
                <li><span>Pendaftaran Anggota Baru</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Form Pendaftaran Anggota Koperasi</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <?= $this->session->flashdata('message') ?>
                    <form class="form-horizontal" action="<?= base_url() ?>pengurus/keanggotaan/pendaftaran" method="post">
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Username</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" value="<?= set_value('username'); ?>" name="username" placeholder="username">
                                <?= form_error('username', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Nama Lengkap</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" placeholder="Nama lengkap" name="nama" value="<?= set_value('nama'); ?>">
                                <?= form_error('nama', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                                <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Tempat / Tanggal Lahir</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat" value="<?= set_value('tempat_lahir'); ?>">
                                <?= form_error('tempat_lahir', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar-alt"></i>
                                        </span>
                                    </span>
                                    <input type="text" data-plugin-datepicker class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>">
                                </div>
                                <?= form_error('tanggal_lahir', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">No. Telepon/HP</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" placeholder="No. Telepon / HP" name="no_hp" value="<?= set_value('no_hp'); ?>">
                                <?= form_error('no_hp', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Email</label>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">No. KTP</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="no_ktp" placeholder="No. KTP" value="<?= set_value('no_ktp'); ?>">
                                <?= form_error('no_ktp', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Tempat Tinggal</label>
                            <div class="col-lg-6">
                                <section class="form-group-vertical">
                                    <input class="form-control" type="text" placeholder="Alamat" name="alamat" value="<?= set_value('alamat'); ?>">
                                    <?= form_error('alamat', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>

                                    <input class="form-control" type="text" placeholder="Kecamatan" name="kecamatan" value="<?= set_value('kecamatan'); ?>">
                                    <?= form_error('kecamatan', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>

                                    <input class="form-control" type="text" placeholder="Kelurahan" name="kelurahan" value="<?= set_value('kelurahan'); ?>">
                                    <?= form_error('kelurahan', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>

                                    <input class="form-control" type="text" placeholder="Kota / Kabupaten" name="kota" value="<?= set_value('kota'); ?>">
                                    <?= form_error('kota', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>

                                    <input class="form-control" type="text" placeholder="Provinsi" name="provinsi" value="<?= set_value('provinsi'); ?>">
                                    <?= form_error('provinsi', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>

                                    <input class="form-control" type="text" placeholder="Kode Pos" name="kode_pos" value="<?= set_value('kode_pos'); ?>">
                                    <?= form_error('kode_pos', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>

                                </section>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Pekerjaan</label>
                            <div class="col-lg-6">
                                    <input class="form-control" type="text" placeholder="Pekerjaan" name="pekerjaan" value="<?= set_value('pekerjaan'); ?>">
                                    <?= form_error('pekerjaan', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Pendidikan</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="pendidikan" placeholder="Pendidikan terakhir" value="<?= set_value('pendidikan'); ?>">
                                <?= form_error('pendidikan', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2"></label>
                            <div class="col-lg-6">
                                <button class="btn btn-primary" type="submit">Daftar</button>
                            </div>
                        </div>


                    </form>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->
</section>