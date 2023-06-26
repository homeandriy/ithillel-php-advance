<?php

/**
 * @var \App\Models\Product $product
 */
view('admin/blocks/header');
?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="<?= url('/admin/products')?>">Товари</a></span> /</span> Перегляд товару: <?= $product->name?></h4>
        <div class="row">
            <div class="col-md-12 card">
                <h5 class="card-header">Дані про категорію</h5>
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
                                <td><?= $product->id; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Назва</strong></td>
                                <td><?= $product->name; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Slug</strong></td>
                                <td><?= $product->slug; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Опис</strong></td>
                                <td><?= $product->description; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Ціни</strong></td>
                                <td><?= $product->price ?> ₴/ <span class="text-danger"><?= $product->price_sale ?> ₴</span></td>
                            </tr>
                            <tr>
                                <td><strong>SKU</strong></td>
                                <td><?= $product->sku ?></td>
                            </tr>
                            <tr>
                                <td><strong>Активність</strong></td>
                                <td><?= (bool)$product->is_active ? 'Активний' : 'Вимкнений' ?></td>
                            </tr>
                            <tr>
                                <td><strong>Категорія</strong></td>
                                <td><?= $product->category()->name ?></td>
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
