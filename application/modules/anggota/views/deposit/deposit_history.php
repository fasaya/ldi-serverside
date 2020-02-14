<section role="main" class="content-body">
    <header class="page-header">
        <h2>Deposit</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs" style="margin-right:20px">
                <li>
                    <a href="<?= base_url() ?>anggota/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Deposit</span></li>
                <li><span>Deposit History</span></li>
            </ol>

            <!-- <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a> -->
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

    <!-- <div class="row">
        <div class="col-lg-8">
            <section class="card card-featured card-featured-warning">
                <header class="card-header">
                    <h2 class="card-title">New Deposit</h2>
                </header>
                <div class="card-body">
                    <form class="form-horizontal" action="<?= base_url() ?>anggota/deposit/add" method="post">
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Payment Gateway</label>
                            <div class="col-lg-9">
                                <select class="form-control mb-3" name="gateway">
                                    <?php foreach ($gateway as $r) :  ?>
                                        <option value="<?= $r->id_gateway ?>"><?= $r->gateway ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('gateway', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Deposit Amount</label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <?= $currency; ?>
                                        </span>
                                    </span>
                                    <input class="form-control" step="10000" type="number" min="<?= $mndp; ?>" max="<?= $mxdp; ?>" placeholder="<?= $mndp; ?>" name="amount" <?= $dp; ?>>
                                </div>
                                <?= form_error('amount', '<p class="text-danger mb-0">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary pull-right" <?= $dp; ?>>Submit</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div> -->

    <div class="row">
        <div class="col-lg-12">
            <section class="card card-featured card-featured-success">
                <header class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="card-title">Deposit History</h2>
                        </div>
                        <!-- <div class="col-sm-6">
                            <div class="pull-right">
                                <a href="<?= base_url() ?>anggota/deposit/add" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah Deposit</a>
                            </div>
                        </div> -->
                    </div>
                </header>
                <div class="card-body">
                    <a href="#modalAddDeposit" class="btn btn-sm btn-success mb-3 modal-with-move-anim ws-normal"><i class="fas fa-plus"></i> Deposit Baru</a>
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Kode Transaksi</th>
                                <th>Total Transfer</th>
                                <th>Jumlah</th>
                                <th>Kode Unik</th>
                                <th>Kode Transfer</th>
                                <th>Bank</th>
                                <th>Keterangan</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody id="tb_history">
                            <?php $no = 1; ?>
                            <?php foreach ($deposit as $row) :  ?>
                                <?php
                                $status = $row->status;
                                if ($status == '0' || $status == '2') {
                                    $ket = "Menunggu konfirmasi";
                                    $color = "text-warning";
                                } elseif ($status == '1') {
                                    $ket = "Dikonfirmasi";
                                    $color = "text-success";
                                } elseif ($status == '9') {
                                    $ket = "Batal";
                                    $color = "text-danger";
                                } else {
                                    $ket = "";
                                    $color = "";
                                }
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?>.</td>
                                    <td><?= $row->date; ?></td>
                                    <td><?= $row->kode_tr; ?></td>
                                    <td><strong><?= $currency; ?> <?= rupiah($row->amount + $row->last_code); ?></strong></td>
                                    <td><?= $currency; ?> <?= rupiah($row->amount); ?></td>
                                    <td><?= rupiah($row->last_code); ?></td>
                                    <td><?= $row->code; ?></td>
                                    <td><?= $row->gateway; ?></td>
                                    <td><?= $ket; ?></td>
                                    <td class="actions text-center">
                                        <a href="#modalPrimary" class="modal-with-move-anim ws-normal" onclick="showDataToModal('<?= $row->code; ?>')"><i class="fas fa-info-circle <?= $color; ?>"></i> Lihat</a>
                                    </td>
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

<!-- Modal Form -->
<div id="modalAddDeposit" class="zoom-anim-dialog modal-block modal-header-color modal-block-success mfp-hide">
    <section class="card" id="isiCard">
        <header class="card-header">
            <h2 class="card-title">Deposit Baru</h2>
        </header>
        <div class="card-body">
            <form class="form-horizontal" action="<?= base_url() ?>anggota/deposit/add" method="post">
                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2">Bank</label>
                    <div class="col-lg-9">
                        <select class="form-control mb-3" name="gateway">
                            <?php foreach ($gateway as $r) :  ?>
                                <option value="<?= $r->id_gateway ?>"><?= $r->gateway ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('gateway', '<p class="text-danger mb-0">', '</p>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2">Nilai Deposit</label>
                    <div class="col-lg-9">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text">
                                    <?= $currency; ?>
                                </span>
                            </span>
                            <input class="form-control" step="10000" type="number" min="<?= $mndp; ?>" max="<?= $mxdp; ?>" placeholder="<?= $mndp; ?>" name="amount" <?= $dp; ?>>
                        </div>
                        <?= form_error('amount', '<p class="text-danger mb-0">', '</p>'); ?>
                    </div>
                </div>
                <div class="float-right mt-2">
                    <button class="btn btn-default modal-dismiss">Tutup</button>
                    <button class="btn btn-success" type="submit" <?= $dp; ?>>Submit</button>
                    <div>
            </form>
        </div>
    </section>
</div>



<!-- JS -->
<!-- <script>
    $(document).ready(function() {

        // $.ajax({
        //     url: "<? //= base_url(); 
                        ?>member/deposit/fetch_history",
        //     method: "POST",
        //     success: function(data) {
        //         $('#tb_history').html(data);
        //     }
        // });

    });
    </script> -->

<script>
    function showDataToModal(code) {

        if (code != '') {
            $.ajax({
                url: "<?= site_url(); ?>anggota/deposit/fetch_detailDepo",
                method: "POST",
                data: {
                    code: code
                },
                success: function(data) {
                    $('#isiCard').html(data);
                }
            })
        }
    }
</script>