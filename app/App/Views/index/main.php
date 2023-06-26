<?php

view('blocks/header');
?>
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Категорії</span>
                        </div>
                        <ul>
                            <?php foreach( \App\Models\Category::all() as $category ): /** @var \App\Models\Category $category */ ?>
                                <li><a href="<?= url('/shop/category/' . $category->slug)?>"><?= $category->name ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <input type="text" placeholder="Пошук в розробці">
                                <button type="submit" class="site-btn">ПОШУК</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5><?= Config\Config::get('info.telephone')?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="<?= ASSETS_URI ?>img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Останні товари</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php $i = 0; ?>
                <?php foreach (\App\Models\Product::all() as $product): /** @var \App\Models\Product $product */ ?>
                <?php if($i > 3) {break;} ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?= ASSETS_URI ?>img/featured/feature-<?= mt_rand(1,5)?>.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="<?= url('/shop/product/'. $product->slug); ?>"><?= $product->name; ?></a></h6>
                            <?= displayPrice($product, true); ?>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
                <?php endforeach; ?>
            </div>

        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="<?= ASSETS_URI ?>img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="<?= ASSETS_URI ?>img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->




<?php
view('blocks/footer');
