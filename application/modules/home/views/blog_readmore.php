<div role="main" class="main">

    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
        <div class="container">
            <div class="row">

                <div class="col-md-12 align-self-center p-static order-2 text-center">

                    <h1 class="text-dark font-weight-bold text-8">Program Kami</h1>
                    <!-- <span class="sub-title text-dark">Check out our Latest News!</span> -->
                </div>

                <div class="col-md-12 align-self-center order-1">

                    <ul class="breadcrumb d-block text-center">
                        <li><a href="#">Home</a></li>
                        <li class="active">Program kami</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">

        <div class="row">
            <div class="col">
                <div class="blog-posts single-post">

                    <article class="post post-large blog-single-post border-0 m-0 p-0">

                        <?php
                        $mydate = $blog['date'];
                        $day = date("d", strtotime($mydate));
                        $month_num = date("m", strtotime($mydate));

                        if ($month_num == "01") {
                            $month = "Januari";
                        } elseif ($month_num == "02") {
                            $month = "Februari";
                        } elseif ($month_num == "03") {
                            $month = "Maret";
                        } elseif ($month_num == "04") {
                            $month = "April";
                        } elseif ($month_num == "05") {
                            $month = "Mei";
                        } elseif ($month_num == "06") {
                            $month = "Juni";
                        } elseif ($month_num == "07") {
                            $month = "Juli";
                        } elseif ($month_num == "08") {
                            $month = "Agustus";
                        } elseif ($month_num == "09") {
                            $month = "September";
                        } elseif ($month_num == "10") {
                            $month = "Oktober";
                        } elseif ($month_num == "11") {
                            $month = "November";
                        } elseif ($month_num == "12") {
                            $month = "Desember";
                        } else {
                            $month = $month_num;
                        }
                        ?>

                        <div class="post-date ml-0">
                            <span class="day"><?= $day ?></span>
                            <span class="month"><?= $month ?></span>
                        </div>

                        <div class="post-content ml-0">

                            <h2 class="font-weight-bold"><a href="#"><?= $blog['judul'] ?></a></h2>

                            <div class="post-meta">
                                <span><i class="far fa-user"></i> Admin</span>
                                <span><i class="far fa-folder"></i> <?= $blog['date'] ?></span>
                            </div>
                            <img src="<?= base_url() ?>template/img/blog/<?= $blog['img'] ?>" class="img-fluid float-left mr-4 mt-2" width="300" alt="" />
                            <p><?= $blog['isi'] ?></p>

                        </div>
                    </article>

                </div>
            </div>
        </div>

    </div>

</div>