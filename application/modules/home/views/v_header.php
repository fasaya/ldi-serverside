<!DOCTYPE html>
<html>

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Koperasi Lentera Digital Indonesia</title>
    <meta charset="utf-8">
    <meta name="title" content="KOPERASI LENTERA DIGITAL INDONESIA">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Koperasi Lentera Digital Indonesia.">
    <meta name="keywords" content="lenteradigital, lentera digital, lentera digital indonesia, lenteradigitalindonesia, koperasilenteradigital, koperasilenteradigitalindonesia, lentera, digital, koperasilentera, koperasi makassar" />
    <meta name="author" content="fasaya">
    <!-- <meta property="image" content="http://.jpg"> -->

    <meta property="og:title" content="KOPERASI LENTERA DIGITAL INDONESIA">
    <meta property="og:description" content="Koperasi Lentera Digital Indonesia">
    <!-- <meta property="og:image" content="http://.jpg"> -->
    <meta name="og:keywords" content="lenteradigital, lentera digital, lentera digital indonesia, lenteradigitalindonesia, koperasilenteradigital, koperasilenteradigitalindonesia, lentera, digital, koperasilentera, koperasi makassar" />
    <meta property="og:url" content="https://www.lenteradigitalindonesia.com/">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>template/img/lentera.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?= base_url() ?>template/home/img/apple-touch-icon.png">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>template/home/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/home/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/home/vendor/animate/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/home/vendor/simple-line-icons/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/home/vendor/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/home/vendor/owl.carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/home/vendor/magnific-popup/magnific-popup.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>template/home/css//theme.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/home/css//theme-elements.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/home/css//theme-blog.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/home/css//theme-shop.css">

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>template/home/vendor/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/home/vendor/rs-plugin/css/layers.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/home/vendor/rs-plugin/css/navigation.css">

    <!-- Demo CSS -->


    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>template/home/css//skins/default.css">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>template/home/css//custom.css">

    <!-- Head Libs -->
    <script src="<?= base_url() ?>template/home/vendor/modernizr/modernizr.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <style>
        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
            text-decoration: none;
        }

        .float,
        .float:hover {
            text-decoration: none;
            color: white;
        }

        .my-float {
            margin-top: 16px;
        }

        .social-icons li:hover.social-icons-whatsapp a {
            background: #00d375;
        }

        .social-icons li:hover.social-icons-phone a {
            background: #e5c03c;
        }
    </style>

</head>

<body class="loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 500}">
    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <a href="https://wa.me/<?= $this->Helper->setting('NOWA'); ?>" class="float" target="_blank">
        <i class="fab fa-whatsapp my-float"></i>
    </a>

    <div class="body">
        <header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
            <div class="header-body border-color-primary border-bottom-0">
                <div class="header-top header-top-simple-border-bottom">
                    <div class="container">
                        <div class="header-row py-2">
                            <div class="header-column justify-content-start">
                                <div class="header-row">
                                    <nav class="header-nav-top">
                                        <ul class="nav nav-pills text-uppercase text-2">
                                            <!-- <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                                <a class="nav-link pl-0" href="#"><i class="fas fa-angle-right"></i> About Us</a>
                                            </li> -->
                                            <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                                <a class="nav-link" href="<?= base_url() ?>hubungikami"><i class="fas fa-angle-right"></i> Hubungi Kami</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="header-column justify-content-end">
                                <div class="header-row">
                                    <nav class="header-nav-top">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <a href="mailto:<?= $this->Helper->setting('EMAIL'); ?>"><i class="far fa-envelope text-4 text-success" style="top: 1px;"></i> <?= $this->Helper->setting('EMAIL'); ?></a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="tel:<?= $this->Helper->setting('NOHP'); ?>"><i class="fas fa-phone text-4 text-success" style="top: 0;"></i> +<?= $this->Helper->setting('NOHP'); ?></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-container container">
                    <div class="header-row">
                        <div class="header-column">
                            <div class="header-row">
                                <div class="header-logo">
                                    <a href="index.html">
                                        <img alt="Porto" height="70" data-sticky-height="50" src="<?= base_url() ?>template/img/logo-1.jpeg">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="header-column justify-content-end">
                            <div class="header-row">
                                <div class="header-nav header-nav-line header-nav-bottom-line">
                                    <div class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                        <nav class="collapse">
                                            <ul class="nav nav-pills" id="mainNav">
                                                <li class="dropdown">
                                                    <!-- a class acive -->
                                                    <!-- kalau ada anaknya: <a class="dropdown-item dropdown-toggle" href=#"> -->
                                                    <a class="dropdown-item" href="<?= base_url() ?>home">
                                                        Home
                                                    </a>
                                                </li>
                                                <li class="dropdown dropdown-mega">
                                                    <a class="dropdown-item" href="<?= base_url() ?>tentang">
                                                        Tentang
                                                    </a>
                                                </li>
                                                <li class="dropdown">
                                                    <a class="dropdown-item" href="<?= base_url() ?>visimisi">
                                                        Visi dan Misi
                                                    </a>
                                                </li>
                                                <li class="dropdown">
                                                    <a class="dropdown-item" href="<?= base_url() ?>adrt">
                                                        AD/ART
                                                    </a>
                                                </li>
                                                <li class="dropdown">
                                                    <a class="dropdown-item" href="<?= base_url() ?>struktur">
                                                        Struktur Organisasi
                                                    </a>
                                                </li>
                                                <li class="dropdown">
                                                    <a class="dropdown-item" href="<?= base_url() ?>programkami">
                                                        Program Kami
                                                    </a>
                                                </li>
                                                <li class="dropdown">
                                                    <a class="dropdown-item" href="<?= base_url() ?>login">
                                                        Login
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <ul class="header-social-icons social-icons d-none d-sm-block">
                                        <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                        <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                    <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>