<?php

/**
 * @var \App\Models\Product[] $products
 * @var ?array $fields
 * @var ?array $errord
 */
view('blocks/header');
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?= ASSETS_URI ?>img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Контакти</h2>
                        <div class="breadcrumb__option">
                            <a href="<?= url('/') ?>">Головна</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Телефон</h4>
                        <p><?= Config\Config::get('info.telephone')?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Контактна адреса</h4>
                        <p><?= Config\Config::get('info.address')?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Ми відкриті</h4>
                        <p>З 10:00 до 19:00</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>електронна адреса</h4>
                        <p><?= Config\Config::get('info.email')?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
view('blocks/footer');
