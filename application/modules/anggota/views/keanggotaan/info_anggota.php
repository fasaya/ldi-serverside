<section role="main" class="content-body">
    <header class="page-header">
        <h2>Keanggotaan</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>anggota/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Keanggotaan</span></li>
                <li><span>Info Anggota</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Data Anggota</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <form class="form-horizontal">
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Tanggal Bergabung</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" value="<?= $data['join_date']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">No Anggota</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" value="<?= $data['no_anggota']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Username</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" value="<?= $data['username']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Nama Lengkap</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" value="<?= $data['nama']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Tempat / Tanggal Lahir</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" value="<?= $data['tempat_lahir']; ?>" readonly>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar-alt"></i>
                                        </span>
                                    </span>
                                    <input type="text" data-plugin-datepicker class="form-control" value="<?= $data['tanggal_lahir']; ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">No. Telepon/HP</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" value="<?= $data['no_hp']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Email</label>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" value="<?= $data['email']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">No. KTP</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" value="<?= $data['no_ktp']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Tempat Tinggal</label>
                            <div class="col-lg-6">
                                <section class="form-group-vertical">
                                    <input class="form-control" type="text" value="<?= $data['alamat']; ?>" readonly>

                                    <input class="form-control" type="text" value="<?= $data['kecamatan']; ?>" readonly>

                                    <input class="form-control" type="text" value="<?= $data['kelurahan']; ?>" readonly>

                                    <input class="form-control" type="text" value="<?= $data['kota']; ?>" readonly>

                                    <input class="form-control" type="text" value="<?= $data['provinsi']; ?>" readonly>

                                    <input class="form-control" type="text" value="<?= $data['kode_pos']; ?>" readonly>

                                </section>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Pekerjaan</label>
                            <div class="col-lg-6">
                                <section class="form-group-vertical">
                                    <input class="form-control" type="text" value="<?= $data['pekerjaan']; ?>" readonly>
                                </section>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Pendidikan</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" value="<?= $data['pendidikan']; ?>" readonly>
                            </div>
                        </div>



                    </form>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->
</section>