<?php

view('admin/blocks/header');
?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="<?= url('/admin/users')?>">Користувачі</a> /</span> Створення</h4>
        <div class="row">
            <div class="col-md-12 card">
                <h5 class="card-header">Створити Користувача</h5>
                <?php
                if (isset($errors)): ?>
                    <?= showInputError(array_key_first($errors), $errors) ?>
                <?php
                endif; ?>
                <form action="/admin/user/store" method="post">
                    <div class="card-body">
                        <div class="mt-2 mb-3">
                            <label for="name" class="form-label">Ім'я</label>
                            <input id="name" class="form-control form-control-lg" name="name" type="text"
                                   placeholder="Ім'я" pattern=".{2,}" required
                                   value="<?php if (isset($fields)): echo formInputHelper('name', $fields); endif; ?>">
                        </div>
                        <div class="mt-2 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" class="form-control form-control-lg" name="email" type="email"
                                   placeholder="Email" pattern=".{2,}" required
                                   value="<?php if (isset($fields)): echo formInputHelper('email', $fields); endif; ?>">
                        </div>
                        <div class="mt-2 mb-3">
                            <label for="password" class="form-label">Пароль</label>
                            <input id="password" class="form-control form-control-lg" name="password" type="password"
                                   placeholder="Пароль" pattern=".{2,}"
                                   value="<?php if (isset($fields)): echo formInputHelper('password', $fields); endif; ?>">
                        </div>
                        <div class="mt-2 mb-3">
                            <div class="form-check">
                                <input
                                        class="form-check-input"
                                        name="is_admin"
                                        type="checkbox"
                                        value="0"
                                        id="is_admin"
                                >
                                <label class="form-check-label" for="is_admin"> Залишіть відміченим, якщо користувач є адміністратором </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Створити</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
view('admin/blocks/footer');
