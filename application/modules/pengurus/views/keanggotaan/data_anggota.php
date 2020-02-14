<section role="main" class="content-body">
    <header class="page-header">
        <h2>Data Anggota</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>pengurus/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Keanggotaan</span></li>
                <li><span>Data Anggota</span></li>
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
                    <h2 class="card-title">Edit Data Anggota</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <form class="form-horizontal" action="<?= base_url() ?>pengurus/keanggotaan/dataanggota/<?= $data['no_anggota']; ?>" method="post">
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Tanggal Bergabung</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" value="<?= $data['join_date']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">No Anggota</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" value="<?= $data['no_anggota']; ?>" name="no_anggota" placeholder="no anggota" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Username</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" value="<?= $data['username'] ?>" name="username" placeholder="username" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Nama Lengkap</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" placeholder="Nama lengkap" name="nama" value="<?= $data['nama']; ?>">
                                <?= form_error('nama', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                                <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Tempat / Tanggal Lahir</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat" value="<?= $data['tempat_lahir']; ?>">
                                <?= form_error('tempat_lahir', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar-alt"></i>
                                        </span>
                                    </span>
                                    <input type="text" data-plugin-datepicker class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>">
                                </div>
                                <?= form_error('tanggal_lahir', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">No. Telepon/HP</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" placeholder="No. Telepon / HP" name="no_hp" value="<?= $data['no_hp']; ?>">
                                <?= form_error('no_hp', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Email</label>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $data['email']; ?>">
                                <?= form_error('email', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">No. KTP</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="no_ktp" placeholder="No. KTP" value="<?= $data['no_ktp']; ?>">
                                <?= form_error('no_ktp', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Tempat Tinggal</label>
                            <div class="col-lg-6">
                                <section class="form-group-vertical">
                                    <input class="form-control" type="text" placeholder="Alamat" name="alamat" value="<?= $data['alamat']; ?>">
                                    <?= form_error('alamat', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>

                                    <input class="form-control" type="text" placeholder="Kecamatan" name="kecamatan" value="<?= $data['kecamatan']; ?>">
                                    <?= form_error('kecamatan', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>

                                    <input class="form-control" type="text" placeholder="Kelurahan" name="kelurahan" value="<?= $data['kelurahan']; ?>">
                                    <?= form_error('kelurahan', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>

                                    <input class="form-control" type="text" placeholder="Kota / Kabupaten" name="kota" value="<?= $data['kota']; ?>">
                                    <?= form_error('kota', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>

                                    <input class="form-control" type="text" placeholder="Provinsi" name="provinsi" value="<?= $data['provinsi']; ?>">
                                    <?= form_error('provinsi', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>

                                    <input class="form-control" type="text" placeholder="Kode Pos" name="kode_pos" value="<?= $data['kode_pos']; ?>">
                                    <?= form_error('kode_pos', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>

                                </section>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Pekerjaan</label>
                            <div class="col-lg-6">
                                <input class="form-control" type="text" placeholder="Pekerjaan" name="pekerjaan" value="<?= $data['pekerjaan']; ?>">
                                <?= form_error('pekerjaan', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Pendidikan</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="pendidikan" placeholder="Pendidikan terakhir" value="<?= $data['pendidikan']; ?>">
                                <?= form_error('pendidikan', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right">Status</label>
                            <div class="col-lg-4">
                                <select class="form-control mb-3" name="is_active">
                                    <option value="1" <?= ($data['is_active'] == '1') ? "selected" : "" ?>>Aktif</option>
                                    <option value="0" <?= ($data['is_active'] == '0') ? "selected" : "" ?>>Non-aktif</option>
                                </select>
                                <?= form_error('is_active', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
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
        <div class="col-md-6" id="#username">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Edit Username & Nomor Anggota</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">

                    <form class="form-horizontal" action="<?= base_url() ?>pengurus/keanggotaan/upnoanggota/<?= $data['no_anggota']; ?>" method="post">

                        <div class="form-group row pb-3">
                            
                            <label class="col-lg-3 control-label text-lg-right pt-2">No Anggota</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" name="no_anggota" placeholder="<?= $data['no_anggota']; ?>">
                                </div>
                                <?= form_error('no_anggota', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>

                    <form class="form-horizontal" action="<?= base_url() ?>pengurus/keanggotaan/upusername/<?= $data['no_anggota']; ?>" method="post">

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Username</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" name="username" placeholder="<?= $data['username'] ?>">
                                </div>
                                <?= form_error('username', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>

        <div class="col-md-6">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Edit Password Anggota</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">

                    <form class="form-horizontal" action="<?= base_url() ?>pengurus/keanggotaan/passanggota/<?= $data['no_anggota']; ?>" method="post">

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Password Login</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </span>
                                    <input type="password" class="form-control" name="pass" placeholder="Password login">
                                </div>
                                <?= form_error('pass', '<p class="text-danger mb-0 pb-0">', '</p>'); ?>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>

                    <form class="form-horizontal" action="<?= base_url() ?>pengurus/keanggotaan/passtranggota/<?= $data['no_anggota']; ?>" method="post">

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Password Transaksi</label>
                            <div class="col-lg-6">
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
                            <div class="col-lg-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->
</section>