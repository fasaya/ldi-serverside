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
                <li><span>Daftar Calon Anggota</span></li>
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
                    <h2 class="card-title">Daftar Calon Anggota</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Lengkap</th>
                                <th>Tanggal Bergabung</th>
                                <th>Deskripsi</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($list_anggota as $r) {
                                if ($r->status == '0') {
                                    $edit = "<a href=" . base_url() . "pengurus/keanggotaan/editcalonanggota/" . $r->no_anggota . ">Edit</a>";
                                    $desc = "Calon anggota";
                                } else {
                                    $edit = "Terdaftar";
                                    $desc = "Anggota";
                                }
                            ?>
                                <tr>
                                    <td><?= $no; ?>.</td>
                                    <td><?= $r->nama ?></td>
                                    <td><?= $r->join_date ?></td>
                                    <td><?= $desc; ?></td>
                                    <td><?= $edit; ?></td>
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