<?php

/**
 * @var \App\Models\Order $order
 */
view('admin/blocks/header');
?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="<?= url('/admin/orders')?>">Замовлення</a> /</span> Зміни в замовленні #<?= $order->id?></h4>
        <div class="row">
            <div class="col-md-12 card">
                <h5 class="card-header">Створити категорію</h5>
                <?php
                if (isset($errors)): ?>
                <?php d($errors); ?>
                    <?= showInputError(array_key_first($errors), $errors) ?>
                <?php
                endif; ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
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
                    <form action="/admin/order/<?=$order->id;?>/update" method="post">
                        <input type="hidden" name="id" value="<?=$order->id;?>">
                        <div class="mt-2 mb-3">
                            <label for="status" class="form-label">Статус замовлення</label>
                            <select id="status" class="form-select form-select-lg" name="status">
                                <?php foreach (\App\Models\Order::ORDER_STATUS_LIST as $value => $displayText): ?>
                                    <option value="<?= $value; ?>" <?php if($order->status === $value): ?>selected<?php endif;?>><?= $displayText; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Змінити статус</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
view('admin/blocks/footer');
