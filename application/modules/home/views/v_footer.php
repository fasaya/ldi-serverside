<footer id="footer">
    <div class="container">
        <div class="footer-ribbon">
            <span>Get in Touch</span>
        </div>
        <div class="row py-5 my-4">
            <div class="col-md-6 mb-4 mb-lg-0">
                <a href="index.html" class="logo pr-0 pr-lg-3">
                    <img alt="Porto Website Template" src="<?= base_url() ?>template/img/isi/<?= $this->Helper->isi_web('lain_footer_img'); ?>" class="opacity-7 bottom-4" height="90">
                </a>
                <p class="mt-2 mb-2"><?= $this->Helper->isi_web('lain_footer_ket'); ?></p>
                <!-- <p class="mb-0"><a href="#" class="btn-flat btn-xs text-color-light"><strong class="text-2">VIEW MORE</strong><i class="fas fa-angle-right p-relative top-1 pl-2"></i></a></p> -->
            </div>
            <div class="col-md-6">
                <h5 class="text-3 mb-3 text-success">HUBUNGI KAMI</h5>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list list-icons list-icons-lg">
                            <li class="mb-1"><i class="far fa-dot-circle text-warning"></i>
                                <p class="m-0"><?= $this->Helper->setting('ALAMAT'); ?></p>
                            </li>
                            <li class="mb-1"><i class="fas fa-phone text-warning"></i>
                                <p class="m-0"><a href="tel:8001234567" target="_blank">+<?= $this->Helper->setting('NOHP'); ?></a></p>
                            </li>
                            <li class="mb-1"><i class="fab fa-whatsapp text-warning"></i>
                                <p class="m-0"><a href="https://wa.me/<?= $this->Helper->setting('NOWA'); ?>" target="_blank">+<?= $this->Helper->setting('NOWA'); ?></a></p>
                            </li>
                            <li class="mb-1"><i class="far fa-envelope text-warning"></i>
                                <p class="m-0"><a href="mailto:<?= $this->Helper->setting('EMAIL'); ?>" target="_blank"><?= $this->Helper->setting('EMAIL'); ?></a></p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list list-icons list-icons-sm">
                            <li><i class="fas fa-angle-right text-warning"></i><a href="<?= base_url() ?>tentang" class="link-hover-style-1 ml-1"> Tentang Kami</a></li>
                            <li><i class="fas fa-angle-right text-warning"></i><a href="<?= base_url() ?>visimisi" class="link-hover-style-1 ml-1"> Visi dan Misi</a></li>
                            <li><i class="fas fa-angle-right text-warning"></i><a href="<?= base_url() ?>programkami" class="link-hover-style-1 ml-1"> Program Kami</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="footer-copyright footer-copyright-style-2">
                <div class="container py-2">
                    <div class="row py-4">
                        <div class="col d-flex align-items-center justify-content-center">
                            <p>© Copyright 2019. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div> -->
</footer>
</div>

<!-- Vendor -->
<script src="<?= base_url() ?>template/home/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>template/home/vendor/jquery.appear/jquery.appear.min.js"></script>
<script src="<?= base_url() ?>template/home/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?= base_url() ?>template/home/vendor/jquery.cookie/jquery.cookie.min.js"></script>
<script src="<?= base_url() ?>template/home/vendor/popper/umd/popper.min.js"></script>
<script src="<?= base_url() ?>template/home/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>template/home/vendor/common/common.min.js"></script>
<script src="<?= base_url() ?>template/home/vendor/jquery.validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>template/home/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?= base_url() ?>template/home/vendor/jquery.gmap/jquery.gmap.min.js"></script>
<script src="<?= base_url() ?>template/home/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
<script src="<?= base_url() ?>template/home/vendor/isotope/jquery.isotope.min.js"></script>
<script src="<?= base_url() ?>template/home/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>template/home/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() ?>template/home/vendor/vide/jquery.vide.min.js"></script>
<script src="<?= base_url() ?>template/home/vendor/vivus/vivus.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?= base_url() ?>template/home/js/theme.js"></script>

<!-- Current Page Vendor and Views -->
<script src="<?= base_url() ?>template/home/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="<?= base_url() ?>template/home/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<!-- Theme Custom -->
<script src="<?= base_url() ?>template/home/js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?= base_url() ?>template/home/js/theme.init.js"></script>

<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
		 -->

</body>

</html>