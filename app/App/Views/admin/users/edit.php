<?php

/**
 * @var \App\Models\User $user
 */
view('admin/blocks/header');
?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="<?= url('/admin/users')?>">Користувачі</a> /</span> Редагування</h4>
        <div class="row">
            <div class="col-md-12 card">
                <h5 class="card-header">Редагувати користувача</h5>
                <?php
                if (isset($errors)): ?>
                    <?= showInputError(array_key_first($errors), $errors) ?>
                <?php
                endif; ?>
                <form action="/admin/user/<?=$user->id;?>/update" method="post">
                    <input type="hidden" name="id" value="<?=$user->id;?>">
                    <div class="card-body">
                        <div class="mt-2 mb-3">
                            <label for="name" class="form-label">Ім'я</label>
                            <input id="name" class="form-control form-control-lg" name="name" type="text"
                                   placeholder="Ім'я" pattern=".{2,}" required
                                   value="<?php if (isset($fields)): echo formInputHelper('name', $fields); else: echo $user->name; endif; ?>">
                        </div>
                        <div class="mt-2 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" class="form-control form-control-lg" name="email" type="email"
                                   placeholder="Email" pattern=".{2,}" required
                                   value="<?php if (isset($fields)): echo formInputHelper('email', $fields); else: echo $user->email; endif; ?>">
                        </div>
                        <div class="mt-2 mb-3">
                            <label for="password" class="form-label">Новий пароль, залишіть пустим, щоб не змінювати</label>
                            <input id="password" class="form-control form-control-lg" name="password" type="password"
                                   placeholder="Новий пароль, залишіть пустим, щоб не змінювати" pattern=".{2,}"
                                   value="<?php if (isset($fields)): echo formInputHelper('password', $fields); endif; ?>">
                        </div>
                        <div class="mt-2 mb-3">
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    name="is_admin"
                                    type="checkbox"
                                    value="<?= $user->is_admin; ?>"
                                    id="is_admin"
                                    <?php if($user->is_admin === \App\Models\User::USER_ADMIN): ?>checked="" <?php endif; ?>
                                >
                                <label class="form-check-label" for="is_admin"> Checked </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Обновити</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
view('admin/blocks/footer');
