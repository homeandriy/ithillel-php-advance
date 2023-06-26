<!doctype html>
<html lang="uk_UA">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="<?=url('/'); ?>ufo.png">
    <title><?= $pageTitle ?? 'Our Site' ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= ASSETS_URI ?>css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= ASSETS_URI ?>css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?= ASSETS_URI ?>css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= ASSETS_URI ?>css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?= ASSETS_URI ?>css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?= ASSETS_URI ?>css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= ASSETS_URI ?>css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?= ASSETS_URI ?>css/style.css" type="text/css">
    <link href="<?= ASSETS_URI ?>css/main.css" rel="stylesheet">
</head>
<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="<?=url('/'); ?>"><img src="<?= ASSETS_URI ?>img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price">Вартість: <span>150.00 ₴</span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__auth">
            <?php if(!\App\Models\User::auth()): ?>
                <a href="<?= url('/login')?>"><i class="fa fa-user"></i> Login</a>
                <a href="<?= url('/register')?>"><i class="fa fa-user"></i> Register</a>
            <?php else: ?>
                <a  class="logout" href="<?= url('/logout')?>"><i class="fa fa-user"></i> Logout</a>
            <?php endif; ?>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <?php view('blocks/main-navigation') ?>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> <?= Config\Config::get('info.email')?></li>
            <li><?= Config\Config::get('info.additional_text')?></li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> <?= Config\Config::get('info.email')?></li>
                            <li><?= Config\Config::get('info.additional_text')?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__auth">
                            <?php if(!\App\Models\User::auth()): ?>
                                <a href="<?= url('/login')?>"><i class="fa fa-user"></i> Login</a>
                                <a href="<?= url('/register')?>"><i class="fa fa-user"></i> Register</a>
                            <?php else: ?>
                                <a  class="logout" href="<?= url('/logout')?>"><i class="fa fa-user"></i> Logout</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="<?=url('/'); ?>"><img src="<?= ASSETS_URI ?>img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <?php view('blocks/main-navigation') ?>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="/cart" id="show-ajax-cart"><i class="fa fa-shopping-bag"></i> <span class="cart-amount"><?= \App\Services\CartService::amount()?></span></a></li>
                    </ul>
                    <div class="header__cart__price">Вартість: <span class="cart-sum"><?= \App\Services\CartService::sum()?></span> ₴</div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
