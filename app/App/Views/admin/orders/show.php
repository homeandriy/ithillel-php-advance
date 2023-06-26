<?php

/**
 * @var \App\Models\Order $order
 */
view('admin/blocks/header');
?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="<?= url('/admin/orders')?>">Замовлення</a> /</span> Прегеляд замовлення #<?= $order->id?></h4>
        <div class="row">
            <div class="col-md-12 card">
                <h5 class="card-header">Дані про замовлення</h5>
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
                                <td><strong>ID / Статус</strong></td>
                                <td><?= $order->id; ?> <?= orderStatusHelper($order->status) ?></td>
                            </tr>
                            <tr>
                                <td><strong>Створено</strong></td>
                                <td><?= date('d.m.Y H:i', strtotime($order->create_at)); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Обновлено</strong></td>
                                <td><?= date('d.m.Y H:i', strtotime($order->update_at)); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Клієнт</strong></td>
                                <td><?= $order->user()->email; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Сума замовлення</strong></td>
                                <td><?= $order->sum; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Адреса доставки</strong></td>
                                <td><?= $order->address; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Замовлені товари</strong></td>
                                <td>
                                    <div class="demo-inline-spacing mt-3">
                                        <div class="list-group">
                                            <?php foreach ($order->products() as $product): ?>
                                                <a href="<?= url('/admin/product/'.$product->id.'/show')?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="d-flex justify-content-between w-100">
                                                        <h6><?= $product->name?></h6>
                                                        <span><?= $product->price ?> ₴/ <span class="text-danger"><?= $product->price_sale ?> ₴</span></span>
                                                        <small>Кількість: <?= $product->amount?></small>
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
