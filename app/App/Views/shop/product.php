<?php

/**
 * @var \App\Models\Product $product
 * @var \App\Models\Product[] $related
 */
view('blocks/header');
?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?= ASSETS_URI?>img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?= $product->name?></h2>
                    <div class="breadcrumb__option">
                        <a href="<?= url('/')?>">Головна</a>
                        <a href="<?= url('/shop/category/'. $product->category()->slug)?>"><?= $product->category()->name?></a>
                        <span><?= $product->name?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                             src="<?= ASSETS_URI?>img/product/details/product-details-1.jpg" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <img data-imgbigurl="<?= ASSETS_URI?>img/product/details/product-details-2.jpg"
                             src="<?= ASSETS_URI?>img/product/details/thumb-1.jpg" alt="">
                        <img data-imgbigurl="<?= ASSETS_URI?>img/product/details/product-details-3.jpg"
                             src="<?= ASSETS_URI?>img/product/details/thumb-2.jpg" alt="">
                        <img data-imgbigurl="<?= ASSETS_URI?>img/product/details/product-details-5.jpg"
                             src="<?= ASSETS_URI?>img/product/details/thumb-3.jpg" alt="">
                        <img data-imgbigurl="<?= ASSETS_URI?>img/product/details/product-details-4.jpg"
                             src="<?= ASSETS_URI?>img/product/details/thumb-4.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3><?= $product->name?></h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(<?= mt_rand(1, 10000) ?> оцінок)</span>
                    </div>
                    <div class="product__details__price"><?= displayPrice($product ,true)?></div>
                    <a href="#" class="add-to-cart primary-btn" data-product_id="<?= $product->id ?>">Додати до кошика</a>
                    <ul>
                        <li><b>Наявність</b> <span>В наявності</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                               aria-selected="true">Опис</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                               aria-selected="false">Коментарі <span>(<?= mt_rand(1, 10000) ?>)</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Інформація про товар</h6>
                                <p><?= $product->description ?></p>
                            </div>
                        </div>

                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Інформація про товар</h6>
                                <p><?= $product->description ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Схожі товари</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $i = 0; ?>
            <?php foreach ($related as $relatedProduct): ?>
                <?php if($i > 3 ) { continue; } ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?= ASSETS_URI?>img/product/product-2.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#" class="add-to-cart" data-product_id="<?= $product->id; ?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__discount__item__text">
                            <h6><a href="<?= url('/shop/product/'. $relatedProduct->slug); ?>"><?= $relatedProduct->name ?></a></h6>
                            <?= displayPrice($product); ?>
                        </div>
                    </div>
                </div>
                <?php $i++ ?>
            <?php  endforeach; ?>
        </div>
    </div>
</section>
<!-- Related Product Section End -->
<?php
view('blocks/footer');

