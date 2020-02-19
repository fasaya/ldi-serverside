<section role="main" class="content-body">
    <header class="page-header">
        <h2>Permintaan Deposit Baru</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs" style="margin-right:20px">
                <li><i class="fas fa-home"></i></li>
                <li><span>Deposit</span></li>
                <li><span>Permintaan Deposit Baru</span></li>
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

                    <h2 class="card-title">Permintaan Deposit Baru</h2>
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

                    </table>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->
</section>





<!-- JS -->
<script type="text/javascript" language="javascript">
    // function showDataToModal(code) {

    //     // if (code != '') {
    //     //     $.ajax({
    //     //         url: "<?= base_url(); ?>pengurus/deposit/fetch_depo_detail",
    //     //         method: "POST",
    //     //         data: {
    //     //             code: code
    //     //         },
    //     //         success: function(data) {
    //     //             $('#isiCard').html(data);
    //     //         }
    //     //     });
    //     // }

    //     $("#modalGateway").modal("show");

    // }

    // $(document).on("click", "#simpanan_pokok", function(e) {
    //     e.preventDefault();
    //     $('.modal-dialog').removeClass('modal-sm')
    //         .removeClass('modal-md')
    //         .addClass('modal-lg');
    //     $("#modalTitle").text('Pembayaran Simpanan Pokok');
    //     $('#modalContent').load($(this).attr("href"));
    //     $("#modalGue").modal('show');
    // })

    $(document).on("click", "#depodetail", function(e) {
        e.preventDefault();
        $('.modal-dialog').removeClass('modal-sm')
            .removeClass('modal-md')
            .addClass('modal-lg');
        $("#modal-title").text('Detail Deposit');
        $("#modal-body").load($(this).attr("href"));
        $("#modalKu").modal("show");
    })



    $(document).ready(function() {
        var dataTable = $('#tableku').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "<?= base_url() . 'pengurus/deposit/fetch_deponew'; ?>",
                type: "POST"
            },
            "columnDefs": [{
                "targets": [0, 3, 4, 6, 7],
                "orderable": false,
            }, ],
        });
    });
</script>