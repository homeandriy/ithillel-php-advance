<?php

/**
 * @var \App\Models\Product[] $products
 * @var ?array $fields
 * @var ?array $errord
 */
view('blocks/header');
?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?= ASSETS_URI?>img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Дякуємо за ваше замовлення</h2>
                        <div class="breadcrumb__option">
                            <a href="<?= url('/')?>">Головна</a>
                            <a href="<?= url('/shop')?>">Магазин</a>
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
                    <h2>Дякуєио за Ваше замовлення, незабаром з вами зв'яжеться оператор</h2>
                    <h3>Замовлені товари</h3>
                    <div class="checkout__order">
                        <div class="checkout__order__products">Товари <span>Сума</span></div>
                        <ul>
                            <?php foreach ($products as $item): ?>
                                <li><div class="d-flex justify-content-between">
                                        <div><p><?= $item->name; ?></p></div>
                                        <div style="width: 40%"><span><?= $item->price() * $item->amount; ?> ₴</span></div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="checkout__order__total">Всього: <span><?= $sum; ?> ₴</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
view('blocks/footer');

