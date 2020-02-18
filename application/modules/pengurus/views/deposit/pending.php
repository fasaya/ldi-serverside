<section role="main" class="content-body">
    <header class="page-header">
        <h2>Permintaan Deposit Pending</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs" style="margin-right:20px">
                <li><i class="fas fa-home"></i></li>
                <li><span>Deposit</span></li>
                <li><span>Permintaan Deposit Pending</span></li>
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

                    <h2 class="card-title">Permintaan Deposit Pending</h2>
                    <!-- <a href="#">
                        <p class="card-subtitle">Click here to view all your investment history</p>
                    </a> -->
                </header>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <table class="table table-bordered table-striped mb-0" id="tableku">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Anggota</th>
                                <th>Jumlah</th>
                                <th>Gateway</th>
                                <th>Kode</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Proses</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($record as $u) :  ?>
                                <?php
                                $stts = $u->status;
                                if ($stts == '0') {
                                    $status = '<span class="badge badge-info">New</span>';
                                } elseif ($stts == '1') {
                                    $status = '<span class="badge badge-success">Telah diproses</span>';
                                } elseif ($stts == '2') {
                                    $status = '<span class="badge badge-warning">Pending</span>';
                                }
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?>.</td>
                                    <td>
                                        <b class="text-primary"><?= $u->no_anggota; ?></b><br>
                                        <?= $u->nama; ?>
                                    </td>
                                    <td><?= $currency; ?> <?= rupiah($u->amount + $u->last_code); ?></td>
                                    <td><?= $u->gateway; ?></td>
                                    <td><?= $u->code; ?></td>
                                    <td><?= $u->date; ?></td>
                                    <td><?= $status; ?></td>
                                    <td class="text-center"><a onclick="showDataToModal('<?= $u->code; ?>')" class="modal-basic" href="#modalGateway"><i class="fas fa-file-invoice fa-lg text-dark"></i> Proses</a></td>
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
    function showDataToModal(code) {

        if (code != '') {
            $.ajax({
                url: "<?= base_url(); ?>pengurus/deposit/fetch_depo_detail",
                method: "POST",
                data: {
                    code: code
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
                url: "<?= base_url() . 'pengurus/deposit/fetch_depopending'; ?>",
                type: "POST"
            },
            "columnDefs": [{
                "targets": [0, 3, 4, 6, 7],
                "orderable": false,
            }, ],
        });
    });
</script> -->