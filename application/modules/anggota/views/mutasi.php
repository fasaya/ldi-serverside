<section role="main" class="content-body">
    <header class="page-header">
        <h2>Mutasi Dompet</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>anggota/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Mutasi Dompet</span>
                    <!-- <li><span>Light Sidebar</span></li> -->
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
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Mutasi Dompet</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <div class="alert alert-default">
                        <form method="POST" action="<?= base_url() ?>anggota/mutasi/filter">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="control-label text-lg-right">Tahun</label>
                                    <select class="form-control" name="tahun">
                                        <option value="">Semua</option>
                                        <?php
                                        $hari_ini = new_date();
                                        $tahun_ini = date("Y", strtotime($hari_ini));

                                        for ($i = 2020; $i <= $tahun_ini; $i++) {
                                        ?>
                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label class="control-label text-lg-right">Bulan</label>
                                    <select class="form-control" name="bulan">
                                        <option value="">Semua</option>
                                        <?php
                                        for ($i = 1; $i <= 12; $i++) {
                                            $monthName = date('F', mktime(0, 0, 0, $i, 10));
                                        ?>
                                            <option value="<?= $i; ?>"><?= $monthName; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- <div class="col-lg-4">
                                    <label class="control-label text-lg-right">Tanggal</label>
                                    <select class="form-control" name="hari">
                                        <option value="0">Semua</option>
                                        <?php
                                        for ($i = 01; $i <= 31; $i++) {
                                        ?>
                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div> -->
                                <div class="col-lg-12 pt-3">
                                    <button type="submit" class="btn btn-default">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>No Ref</th>
                                <th>Deskripsi</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th class="text-center">Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($mutasi as $r) { ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?>.</td>
                                    <td><?= $r->date; ?></td>
                                    <td><?= $r->kode_tr; ?></td>
                                    <td><?= $r->deskripsi; ?></td>
                                    <td><?= rupiah($r->debit); ?></td>
                                    <td><?= rupiah($r->credit); ?></td>
                                    <td><?= rupiah($r->saldo); ?></td>
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

<!-- JS -->
<script>
    // $(document).ready(function() {

    // });

    function copyToClipboard(element) {
        /* Get the text field */
        var copyText = document.getElementById(element);

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /*For mobile devices*/

        /* Copy the text inside the text field */
        document.execCommand("copy");
    }

    Morris.Bar({
        element: 'morrisBar',
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Simpanan', 'Pinjaman']
    });
</script>