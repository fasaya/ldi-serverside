<section role="main" class="content-body">
    <header class="page-header">
        <h2>Belum Bayar Simpanan Pokok</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>anggota/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Belum Bayar</span></li>
                <li><span>Simpanan Pokok</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Belum Bayar Simpanan Pokok</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">

                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No. Anggota</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($anggota as $r) { ?>
                                <?php
                                $id_anggota = $r->id_anggota;
                                $query1 = $this->db->query(' SELECT id_simpanan
                                                        FROM tb_simpanan_pokok where id_anggota = "' . $id_anggota . '"');
                                if ($query1->num_rows() <= 0) { ?>
                                    <tr>
                                        <td><?= $no; ?>.</td>
                                        <td><?= $r->no_anggota ?></td>
                                        <td><?= $r->nama ?></td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->
</section>