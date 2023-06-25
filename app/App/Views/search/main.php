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
                        <h2>Результати пошуку</h2>
                        <div class="breadcrumb__option">
                            <a href="<?= url('/') ?>">Головна</a>
                            <a href="<?= url('/shop') ?>">Магазин</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <section class="spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <?php if (empty($products)): ?>
                        <h3>На жаль, не вдалось нічого знайти</h3>
                    <?php else: ?>
                        <h3>Ось, що вдалось зайти</h3>
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                <tr>
                                    <th class="shoping__product">Товари</th>
                                    <th>назва</th>
                                    <th>ціна</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($products as $item): ?>
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="<?= ASSETS_URI ?>img/featured/feature-<?= mt_rand(1, 5) ?>.jpg"
                                                     width="100" alt="<?= $item->name; ?>">
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <h5><a href="<?= url('/shop/product/'. $item->slug); ?>"><?= $item->name; ?></a></h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            <?= $item->price(); ?>
                                        </td>
                                    </tr>
                                <?php
                                endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php
view('blocks/footer');

