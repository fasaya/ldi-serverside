<section role="main" class="content-body">
    <header class="page-header">
        <h2>Aturan dan Sanksi</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs mr-4">
                <li>
                    <a href="<?= base_url() ?>anggota/dashboard">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Aturan dan Sanksi</span></li>
            </ol>
        </div>
    </header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">Aturan dan Sanksi</h2>
                    <!-- <p class="card-subtitle">A bar chart is a way of summarizing a set of categorical data.</p> -->
                </header>
                <div class="card-body">

                    <p><?= $this->Helper->setting_isi_web('pengurus_aturan') ?></p>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->
</section>