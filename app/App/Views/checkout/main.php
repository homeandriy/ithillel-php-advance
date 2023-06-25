<?php

/**
 * @var \App\Models\Product[] $products
 * @var ?array $fields
 * @var ?array $errors
 */
view('blocks/header');
?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?= ASSETS_URI?>img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Оформлення замовлення</h2>
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
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Деталі замовлення</h4>
                <form action="<?= url('shop/checkout/processing')?>" method="post">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Ваше ім'я<span>*</span></p>
                                        <input type="text" name="name" pattern=".{2,100}" value="<?php if(isset($fields['name'])): echo $fields['name']; else: echo \App\Models\User::Instance() instanceOf \App\Models\User ? \App\Models\User::Instance()->name : ''; endif;?>" class="form-control <?php if(isset($errors['name'])): ?>is-invalid<?php endif;?>">
                                        <?php if(isset($errors['name'])): ?>
                                            <div class="invalid-feedback"><?= $errors['name']?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Область<span>*</span></p>
                                <input type="text" name="address-city" pattern=".{5,255}" value="<?php if(isset($fields['address-city'])): echo $fields['address-city']; else: echo ''; endif; ?>" class="form-control <?php if(isset($errors['address-city'])): ?>is-invalid<?php endif;?>">
                                <?php if(isset($errors['address-city'])): ?>
                                    <div class="invalid-feedback"><?= $errors['address-city']?></div>
                                <?php endif; ?>
                            </div>
                            <div class="checkout__input">
                                <p>Адреса<span>*</span></p>
                                <input type="text" name="address-street" placeholder="Вулиця" pattern=".{3,255}" value="<?php if(isset($fields['address-street'])): echo $fields['address-street']; else: echo ''; endif; ?>" class="checkout__input__add form-control <?php if(isset($errors['address-street'])): ?>is-invalid<?php endif;?>">
                                <?php if(isset($errors['address-street'])): ?>
                                    <div class="invalid-feedback"><?= $errors['address-street']?></div>
                                <?php endif; ?>
                                <input type="text" name="address-house" placeholder="Будинок/квартира/поверх/номер під'їзду" pattern=".{2,100}" value="<?php if(isset($fields['address-house'])): echo $fields['address-house']; else: echo ''; endif; ?>" class="form-control <?php if(isset($errors['address-house'])): ?>is-invalid<?php endif;?>">
                                <?php if(isset($errors['address-house'])): ?>
                                    <div class="invalid-feedback"><?= $errors['address-house']?></div>
                                <?php endif; ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" name="email" value="<?php if(isset($fields['email'])): echo $fields['email']; else: echo \App\Models\User::Instance() instanceOf \App\Models\User ? \App\Models\User::Instance()->email : ''; endif;?>" pattern=".{2,}" class="form-control <?php if(isset($errors['email'])): ?>is-invalid<?php endif;?>">
                                        <?php if(isset($errors['email'])): ?>
                                            <div class="invalid-feedback"><?= $errors['email']?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php if(!\App\Models\User::Instance()): ?>
                                <p>При замовленні, ми автоматитчно створимо Вам аккаунт в системі, тому придумайте пароль для входу в систему</p>
                                <div class="checkout__input">
                                    <p>Введіть пароль<span>*</span></p>
                                    <input type="password" name="password" pattern=".{8,}">
                                </div>
                            <?php endif; ?>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text" name="notice" placeholder="Примітки">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Ваше замовлення</h4>
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

                                <p>Після підтвердження замовлення вам надійде посилання на оплату</p>

                                <button type="submit" class="site-btn">Підтвердити замовлення</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

<?php
view('blocks/footer');
