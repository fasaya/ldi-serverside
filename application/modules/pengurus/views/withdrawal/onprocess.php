<section role="main" class="content-body">
    <header class="page-header">
        <h2>Permintaan Withdrawal</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs" style="margin-right:20px">
                <li><i class="fas fa-home"></i></li>
                <li><span>Withdrawal</span></li>
                <li><span>Permintaan Withdrawal</span></li>
            </ol>

            <!-- <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a> -->
        </div>
    </header>

    <!-- start: page -->

    <div class="row">
        <div class="col-lg-12">
            <section class="card card-featured card-featured-info">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <!-- <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a> -->
                    </div>

                    <h2 class="card-title">Permintaan Withdrawal</h2>
                    <!-- <a href="#">
                        <p class="card-subtitle">Click here to view all your investment history</p>
                    </a> -->
                </header>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <?= $this->session->flashdata('message'); ?>
                    <table class="table table-bordered table-striped mb-0" id="tableku">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Anggota</th>
                                <th>No. Ref</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Proses</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($record as $u) :  ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?>.</td>
                                    <td>
                                        <b class="text-primary"><?= $u->no_anggota; ?></b><br>
                                        <?= $u->nama; ?>
                                    </td>
                                    <td><?= $u->kode_tr; ?></td>
                                    <td><?= $currency; ?> <?= rupiah($u->amount); ?></td>
                                    <td><?= $u->date; ?></td>
                                    <td><span class="badge badge-warning">On Process</span></td>
                                    <td class="text-center"><a onclick="showDataToModal('<?= $u->id_withdrawal; ?>')" class="modal-basic" href="#modalGateway">Proses</a></td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->
</section>

<div id="modalGateway" class="zoom-anim-dialog modal-block modal-header-color modal-block-primary mfp-hide">
    <section class="card" id="isiCard">
        <header class="card-header">
            <h2 class="card-title">Deposit Detail</h2>
        </header>
        <div class="card-body">
            <p class="text-center">Loading...</p>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-default modal-dismiss">Cancel</button>
                </div>
            </div>
        </footer>
    </section>
</div>

<!-- JS -->
<script>
    function showDataToModal(id_wd) {

        if (id_wd != '') {
            $.ajax({
                url: "<?= base_url(); ?>pengurus/withdrawal/fetch_wd_detail",
                method: "POST",
                data: {
                    id_wd: id_wd
                },
                success: function(data) {
                    $('#isiCard').html(data);
                }
            });
        }
    }
</script>

<!-- <script type="text/javascript" language="javascript">
    $(document).ready(function() {
        var dataTable = $('#tableku').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "<?= base_url() . 'pengurus/withdrawal/fetch_wdnew'; ?>",
                type: "POST"
            },
            "columnDefs": [{
                "targets": [0, 5, 6],
                "orderable": false,
            }, ],
        });
    });
</script> -->