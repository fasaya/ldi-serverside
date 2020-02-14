<section role="main" class="content-body">
    <header class="page-header">
        <h2>Withdrawal</h2>

        <div class="right-wrapper text-right">
            <span class="breadcrumbs" style="margin-right:20px">
                <li><i class="fas fa-home"></i></li>
                <li><span>Withdrawal</span></li>
                <li><span>Telah diproses</span></li>
            </span>

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

    <div class="row">
        <div class="col-lg-12">
            <section class="card card-featured card-featured-info">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <!-- <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a> -->
                    </div>

                    <h2 class="card-title">Riwayat Withdraw</h2>
                    <!-- <a href="#">
                        <p class="card-subtitle">Click here to view all your investment history</p>
                    </a> -->
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-default">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Nilai</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody id="tabel">
                            <?php $no = 1; ?>
                            <?php foreach ($withdrawal as $row) :  ?>
                                <?php
                                if ($row->status == "0") {
                                    $ket = "Menunggu konfirmasi";
                                } elseif ($row->status == "1") {
                                    $ket = "Withdrawal sukses ke " . $row->gateway . " - " . $row->no_rek;
                                } elseif ($row->status == "9") {
                                    $ket = "Dibatalkan oleh Admin";
                                }
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?>.</td>
                                    <td><?= $row->date; ?></td>
                                    <td><?= $currency; ?> <?= rupiah($row->amount); ?></td>
                                    <td><?= $ket; ?></td>
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


<!-- JS -->
<!-- <script>
    // $(document).ready(function() {

    //     $.ajax({
    //         url: "<? //= base_url(); 
                        ?>member/withdrawal/fetch_wdprocessed",
    //         method: "POST",
    //         success: function(data) {
    //             $('#tabel').html(data);
    //         }
    //     })

    // });
</script> -->