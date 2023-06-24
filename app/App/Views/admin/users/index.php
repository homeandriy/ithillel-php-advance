<?php
/**
 * @var \App\Models\User[] $users
 */

view('admin/blocks/header');
?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Користувачі /</span> Список</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header">
                <h5>Список товарів</h5>
                <div class="float-end">
                    <a href="<?= url('admin/user/create') ?>" class="btn btn-primary">Створити Користувача</a>
                </div>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ім'я</th>
                        <th>email</th>
                        <th>Користувач є Адміном</th>
                        <th>Замовлення</th>
                        <th>Функції</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user->id ?></td>
                            <td><a href="<?= url('admin/user/' . $user->id . '/edit') ?>"><?= $user->name ?></a></td>
                            <td><a href="<?= url('admin/user/' . $user->id . '/edit') ?>"><?= $user->email ?></a></td>
                            <?php
                            $orders = $user->orders() ?>
                            <td><?= userStatus($user->is_admin) ?></td>
                            <td><?= count($orders) ?></td>
                            <td>
                                <?php
                                view('admin/blocks/common/option',
                                    ['instance' => $user]); ?>
                            </td>
                        </tr>
                    <?php
                    endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
<?php
view('admin/blocks/footer');
