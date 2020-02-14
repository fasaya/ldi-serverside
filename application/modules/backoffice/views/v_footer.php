</div>

<!-- Modal -->
<div id="modal" class="zoom-anim-dialog modal-block modal-header-color modal-block-primary mfp-hide">
    <section class="card" id="isiCard">
        <header class="card-header">
            <h2 class="card-title"></h2>
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

</section>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
    });
</script>

<!-- Vendor -->
<script src="<?= base_url() ?>template/admin/vendor/jquery/jquery.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/popper/umd/popper.min.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/bootstrap/js/bootstrap.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/common/common.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/nanoscroller/nanoscroller.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/jquery-placeholder/jquery.placeholder.js"></script>

<!-- Specific Page Vendor -->
<script src="<?= base_url() ?>template/admin/vendor/select2/js/select2.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/pnotify/pnotify.custom.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/autosize/autosize.js"></script>
<script src="<?= base_url() ?>template/admin/vendor/summernote/summernote-bs4.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?= base_url() ?>template/admin/js/theme.js"></script>

<!-- Theme Custom -->
<script src="<?= base_url() ?>template/admin/js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?= base_url() ?>template/admin/js/theme.init.js"></script>

<!-- Examples -->
<script src="<?= base_url() ?>template/admin/js/examples/examples.datatables.default.js"></script>
<script src="<?= base_url() ?>template/admin/js/examples/examples.datatables.row.with.details.js"></script>
<script src="<?= base_url() ?>template/admin/js/examples/examples.datatables.tabletools.js"></script>
<script src="<?= base_url() ?>template/admin/js/examples/examples.modals.js"></script>
</body>

</html>