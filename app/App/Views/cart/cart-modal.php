<?php
/**
 * @see \App\Controllers\ShopController::cart()
 *
 * @var \App\Models\Product[] $products
 */
?>
<?php if(empty($products)): ?>
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Корзина пуста</h2>
            </div>
        </div>
    </div>
</section>
<?php else: ?>
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th class="shoping__product">Товари</th>
                                <th>Ціна</th>
                                <th>Кількість</th>
                                <th>Загальна вартість</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $item): ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <div class="d-flex">
                                            <img src="<?= ASSETS_URI ?>img/featured/feature-<?= mt_rand(1,5)?>.jpg" width="100" alt="<?= $item->name; ?>">
                                            <h5><?= $item->name; ?></h5>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <?= $item->price(); ?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <span class="dec qtybtn reduce-product" data-product_id="<?= $item->id; ?>">-</span>
                                                <input type="text" value=" <?= $item->amount; ?>" disabled>
                                                <span class="inc qtybtn plus-product" data-product_id="<?= $item->id; ?>">+</span></div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <?= $item->price() * $item->amount; ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close remove-product" data-product_id="<?= $item->id; ?>" ></span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="#" class="primary-btn cart-btn" data-dismiss="modal" aria-label="Close">Продовжити покупки</a>
                    <a href="<?= url('shop/cart')?>" class="primary-btn cart-btn-right float-right">Перейти в корзину</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="shoping__checkout">
                    <h5>Загальна сума</h5>
                    <ul>
                        <li>Всього <span><?= $sum; ?></span></li>
                    </ul>
                    <a href="<?= url('shop/checkout')?>" class="primary-btn">Оформити замовлення</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
