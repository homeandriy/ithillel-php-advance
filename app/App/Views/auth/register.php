<?php

view('blocks/header-login');
?>
    <div class="sidenav">
        <div class="login-main-text">
            <h2><?= \Config\Config::get('info.name')?><br> Register Page</h2>
            <p>Register from here to access.</p>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <?php view('blocks/navigation', ['href' => '/register']); ?>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <?php if(isset($errors)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= current($errors) ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?= url('auth/signup') ?>">
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" pattern=".{2,}" id="name" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" name="password"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input type="password" id="password-confirm" class="form-control" name="password_confirm"
                               placeholder="Confirm Password">
                    </div>
                    <button type="submit" class="btn btn-black">Register</button>
                </form>
            </div>
        </div>
    </div>
<?php
view('blocks/footer-login');
