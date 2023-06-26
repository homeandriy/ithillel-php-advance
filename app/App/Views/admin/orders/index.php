<?php
/**
 * @var Order[] $orders
 */


use App\Models\Order;

view('admin/blocks/header');
?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Товари /</span> Список</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Список товарів</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Статус</th>
                        <th>Дата створення</th>
                        <th>Клієнт</th>
                        <th>Сума</th>
                        <th>Адреса доставки</th>
                        <th>Кількість товарів</th>
                        <th>Функції</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    foreach ($orders as $order) : ?>
                        <tr>
                            <td><?= $order->id ?></td>
                            <td><?= date('d.m.Y H:i', strtotime($order->create_at)); ?></td>
                            <td><?= orderStatusHelper($order->status) ?></td>
                            <td><?= $order->user()->email ?></td>
                            <td><?= $order->sum ?></td>
                            <td><?= $order->address ?></td>
                            <?php
                            $products = $order->products() ?>
                            <td><?= count($products) ?></td>
                            <td>
                                <?php
                                view('admin/blocks/common/option',
                                    ['instance' => $order]); ?>
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
