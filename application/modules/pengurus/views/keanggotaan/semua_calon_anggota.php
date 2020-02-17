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
                    <a href="<?= base_url() ?>pengurus/keanggotaan/exportanggota" target="_blank" type="submit" class="btn btn-default mb-3">Export</a>
                    <table class="table table-bordered table-striped mb-0" id="tableku">
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

                    </table>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->
</section>

<script type="text/javascript" language="javascript">
    $(document).ready(function() {
        var dataTable = $('#tableku').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "<?= base_url() . 'pengurus/keanggotaan/fetch_anggota/0'; ?>",
                type: "POST"
            },
            "columnDefs": [{
                "targets": [0, 2, 4, 5, 6],
                "orderable": false,
            }, ],
        });
    });
</script>