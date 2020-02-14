<div role="main" class="main">

    <section class="parallax section section-text-light section-parallax section-center mt-0 mb-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="<?= base_url() ?>template/img/isi/<?= $this->Helper->isi_web('lain_header'); ?>" style="min-height: 560px;">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-8 mt-5">
                    <h1 class="mt-5 pt-5 font-weight-semibold"><?= $this->Helper->isi_web('blog_title'); ?></h1>
                    <p class="mb-0 text-4 opacity-7"><?= $this->Helper->isi_web('blog_subtitle'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <div class="image-gallery sort-destination full-width mb-0">
        <div class="isotope-item">
            <div class="image-gallery-item mb-0">
                <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
                    <span class="thumb-info-wrapper">
                        <img src="<?= base_url() ?>template/img/isi/<?= $this->Helper->isi_web('home_3_gbr3a'); ?>" class="img-fluid" alt="">
                    </span>
                </span>
            </div>
        </div>
        <div class="isotope-item">
            <div class="image-gallery-item mb-0">
                <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
                    <span class="thumb-info-wrapper">
                        <img src="<?= base_url() ?>template/img/isi/<?= $this->Helper->isi_web('home_3_gbr3b'); ?>" class="img-fluid" alt="">
                    </span>
                </span>
            </div>
        </div>
        <div class="isotope-item">
            <div class="image-gallery-item mb-0">
                <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
                    <span class="thumb-info-wrapper">
                        <img src="<?= base_url() ?>template/img/isi/<?= $this->Helper->isi_web('home_3_gbr3c'); ?>" class="img-fluid" alt="">
                    </span>
                </span>
            </div>
        </div>
        <div class="isotope-item">
            <div class="image-gallery-item mb-0">
                <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
                    <span class="thumb-info-wrapper">
                        <img src="<?= base_url() ?>template/img/isi/<?= $this->Helper->isi_web('home_3_gbr3d'); ?>" class="img-fluid" alt="">
                    </span>
                </span>
            </div>
        </div>
        <div class="isotope-item">
            <div class="image-gallery-item mb-0">
                <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
                    <span class="thumb-info-wrapper">
                        <img src="<?= base_url() ?>template/img/isi/<?= $this->Helper->isi_web('home_3_gbr3e'); ?>" class="img-fluid" alt="">
                    </span>
                </span>
            </div>
        </div>
    </div>

    <div class="container py-4 mt-5">

        <div class="row">
            <div class="col">
                <div class="blog-posts">

                    <div class="row">

                        <?php foreach ($blog as $r) { ?>

                            <div class="col-md-4">
                                <article class="post post-medium border-0 pb-0 mb-5">
                                    <div class="post-image">
                                        <a href="<?= site_url() ?>home/programkami/read/<?= $r->slug; ?>">
                                            <img src="<?= base_url() ?>template/img/blog/<?= $r->img; ?>" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                        </a>
                                    </div>

                                    <div class="post-content">

                                        <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="<?= site_url() ?>home/programkami/read/<?= $r->slug; ?>"><?= $r->judul; ?></a></h2>
                                        <p><?= substr($r->isi, 0, 135); ?></p>

                                        <div class="post-meta">
                                            <span><i class="far fa-folder"></i> <?= $r->date; ?></span>
                                            <span class="d-block mt-2"><a href="<?= site_url() ?>home/programkami/read/<?= $r->slug; ?>" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                                        </div>

                                    </div>
                                </article>
                            </div>

                        <?php } ?>

                    </div>

                    <div class="row">
                        <div class="col">
                            <?php echo $pagination; ?>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col">
                            <ul class="pagination float-right">
                                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div> -->

                </div>
            </div>

        </div>

    </div>

</div>