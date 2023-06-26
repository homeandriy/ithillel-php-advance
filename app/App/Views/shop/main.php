<?php

/**
 * @var \App\Models\Product[] $products
 * @var \App\Models\Category|null $category
 */
view('blocks/header');
?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?= ASSETS_URI?>img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><?= \Config\Config::get('info.name')?></h2>
                        <div class="breadcrumb__option">
                            <a href="<?= url('/')?>">Головна</a>
                            <a href="<?= url('/shop')?>">Каталог</a>
                            <?php if (isset($category)): ?>
                                <a href="<?= url('/shop/category/'. $category->slug)?>"><?= $category->name?></a>
                                <span><?= $category->name?></span>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Категорії</h4>
                            <ul>
                                <?php foreach( \App\Models\Category::all() as $category ): /** @var \App\Models\Category $category */ ?>
                                    <li><a href="<?= url('/shop/category/' . $category->slug)?>"><?= $category->name ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Сортувати за (в розробці)</span>
                                    <select name="sort-by">
                                        <option value="0">За замовчуванням</option>
                                        <option value="1">Від дешевих до дорогих</option>
                                        <option value="1">Від дорогих до дешевих</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span><?= count($products)?></span> Всього товарів</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($products as $product): ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__discount__item">
                                    <div class="product__item__pic set-bg" data-setbg="<?= ASSETS_URI; ?>img/product/product-<?= mt_rand(1,5)?>.jpg">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#" class="add-to-cart" data-product_id="<?= $product->id; ?>"><i class=" fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span><?= $product->category()->name; ?></span>
                                        <h5><a href="<?= url('/shop/product/'. $product->slug); ?>"><?= $product->name; ?></a></h5>
                                        <?= displayPrice($product); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="product__pagination">
                        <a href="#">1</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
<?php
view('blocks/footer');

