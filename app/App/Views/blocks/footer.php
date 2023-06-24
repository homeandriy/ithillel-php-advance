        <!-- Footer Section Begin -->
        <footer class="footer spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer__about">
                            <div class="footer__about__logo">
                                <a href="<?= url('/')?>"><img src="<?= ASSETS_URI ?>img/logo.png" alt=""></a>
                            </div>
                            <ul>
                                <li>Наша адреса: <?= \Config\Config::get('info.address')?></li>
                                <li>Телефон: <?= \Config\Config::get('info.telephone')?></li>
                                <li>Email: <?= \Config\Config::get('info.email')?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                        <div class="footer__widget">
                            <h6>Useful Links</h6>
                            <ul>
                                <li><a href="#">About Us</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Who We Are</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer__copyright">
                            <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                            <div class="footer__copyright__payment"><img src="<?= ASSETS_URI ?>img/payment-item.png" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->

        <!-- Js Plugins -->
        <script src="<?= ASSETS_URI ?>js/jquery-3.3.1.min.js"></script>
        <script src="<?= ASSETS_URI ?>js/bootstrap.min.js"></script>
        <script src="<?= ASSETS_URI ?>js/jquery.nice-select.min.js"></script>
        <script src="<?= ASSETS_URI ?>js/jquery-ui.min.js"></script>
        <script src="<?= ASSETS_URI ?>js/jquery.slicknav.js"></script>
        <script src="<?= ASSETS_URI ?>js/mixitup.min.js"></script>
        <script src="<?= ASSETS_URI ?>js/owl.carousel.min.js"></script>
        <script src="<?= ASSETS_URI ?>js/main.js"></script>
    </body>

</html>
