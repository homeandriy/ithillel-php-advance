<?php

view('blocks/header');
?>
    <div class="sidenav">
        <div class="login-main-text">
            <h2>Application<br> Login Page</h2>
            <p>Login from here to access.</p>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <?php view('blocks/navigation', ['href' => '/login']); ?>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <?php if(isset($errors)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= current($errors) ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?= url('auth/verify') ?>">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" name="password"
                               placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-black">Login</button>
                </form>
            </div>
        </div>
    </div>
<?php
view('blocks/footer');
