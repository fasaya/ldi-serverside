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
                <li><span>Daftar Anggota</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Daftar Anggota</h2>
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
                                <th>Info</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($list_anggota as $r) { ?>
                                <tr>
                                    <td><?= $no; ?>.</td>
                                    <td><?= $r->nama ?></td>
                                    <td><?= $r->join_date ?></td>
                                    <td><?= ($r->status == '1') ? "Anggota" : "Calon anggota"; ?></td>
                                    <?php if ($r->id_parent == $id_anggota) { ?>

                                        <td><a href="<?= base_url() ?>anggota/keanggotaan/infoanggota/<?= $r->no_anggota ?>">Lihat data</a></td>
                                    <?php } else { ?>
                                        <td></td>
                                    <?php } ?>
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