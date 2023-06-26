<?php

/**
 * @var \App\Models\User $user
 */
view('admin/blocks/header');
?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="<?= url('/admin/users')?>">Користувачі</a> /</span> Перегляд</h4>
        <div class="row">
            <div class="col-md-12 card">
                <h5 class="card-header">Дані про користувача</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Назва властивості</th>
                                <th>величина</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            <tr>
                                <td><strong>ID</strong></td>
                                <td><?= $user->id; ?></td>
                            </tr>
                            <tr>
                                <td><strong>email</strong></td>
                                <td><?= $user->email; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Адміністратор?</strong></td>
                                <td><?= userStatus($user->is_admin) ?></td>
                            </tr>
                            <tr>
                                <td><strong>Замовлення</strong></td>
                                <td>
                                    <div class="demo-inline-spacing mt-3">
                                        <div class="list-group">
                                        <?php foreach ($user->orders() as $order): ?>
                                            <a href="<?= url('/admin/order/'.$order->id.'/show')?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="d-flex justify-content-between w-100">
                                                    <h6>Замовлення #<?= $order->id?></h6>
                                                    <?php $products = $order->products() ?>
                                                    <small><?= count($products)?> товарів / товар</small>
                                                </div>
                                            </a>
                                        <?php endforeach; ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
view('admin/blocks/footer');
