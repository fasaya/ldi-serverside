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
                <li><span>Daftar Anggota</span></li>
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
                    <h2 class="card-title">Daftar Anggota</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <a href="<?= base_url() ?>pengurus/keanggotaan/exportanggota" target="_blank" type="submit" class="btn btn-default mb-3">Export</a>
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Anggota</th>
                                <th>Didaftarkan Oleh</th>
                                <th>Tanggal Bergabung</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($list_anggota as $r) { ?>
                                <?php
                                $id_parent = $r->id_parent;
                                if ($id_parent != 0) {
                                    $query = $this->db->query(' SELECT nama, no_anggota
                                                            FROM tb_anggota 
                                                            WHERE id_anggota = "' . $id_parent . '" ');
                                    $result = $query->row_array();
                                    $no_parent = $result['no_anggota'];
                                    $nama_parent = $result['nama'];
                                } else {
                                    $no_parent = "";
                                    $nama_parent = "-";
                                }

                                ?>
                                <tr>
                                    <td><?= $no; ?>.</td>
                                    <td>
                                        <b class="text-primary"><?= $r->no_anggota; ?></b><br>
                                        <b><?= $r->username; ?></b> /
                                        <?= $r->email; ?><br>
                                        <?= $r->nama; ?>
                                    </td>
                                    <td>
                                        <b class="text-primary"><?= $no_parent; ?></b><br>
                                        <?= $nama_parent; ?>
                                    </td>
                                    <td><?= $r->join_date ?></td>
                                    <td><?= ($r->status == '1') ? "Anggota" : "Calon anggota"; ?></td>
                                    <td><?= ($r->is_active == '1') ? "Aktif" : "Non-aktif"; ?></td>
                                    <td><?= ($r->status == '1') ? '<a href="' . base_url() . 'pengurus/keanggotaan/dataanggota/' . $r->no_anggota . '">Edit Data</a>' : '<a href="#">Edit Data</a>'; ?> | <a href="<?= base_url() ?>pengurus/keanggotaan/mutasi/<?= $r->no_anggota ?>">Lihat Mutasi</a></td>
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