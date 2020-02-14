<section role="main" class="content-body">
    <header class="page-header">
        <h2>AD/ART</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>anggota/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>AD/ART</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">AD/ART</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">
                    <iframe src="<?= base_url() ?>template/img/isi/<?= $this->Helper->setting_isi_web('adrt_pdf'); ?>#toolbar=0" width="100%" height="500px">
                    </iframe>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->
</section>