<section role="main" class="content-body">
    <header class="page-header">
        <h2>Simpanan</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>pengurus/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Simpanan</span></li>
                <li><span>Semua Simpanan Sukarela Anggota</span></li>
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

    <div class="row pt-3">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">Semua Simpanan Sukarela Anggota</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <a href="<?= base_url() ?>pengurus/simpanan/exportsukarela" target="_blank" type="submit" class="btn btn-default mb-3">Export</a>
                    <table class="table table-bordered table-striped mb-0" id="tableku">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Anggota</th>
                                <th>No Ref</th>
                                <th class="text-center">Biaya</th>
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
                url: "<?= base_url() . 'pengurus/simpanan/fetch_simpSukarela'; ?>",
                type: "POST"
            },
            "columnDefs": [{
                "targets": [0, 4],
                "orderable": false,
            }, ],
        });
    });
</script>