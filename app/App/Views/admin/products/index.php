<?php
/**
 * @var Product[] $products
 */

use App\Models\Product;

view('admin/blocks/header');
?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Товари /</span> Список</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header">
                <h5 >Список товарів</h5>
                <div class="float-end">
                    <a href="<?= url('admin/product/create') ?>" class="btn btn-primary">Створити товар</a>
                </div>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Назва</th>
                        <th>Категорія</th>
                        <th>Ціна</th>
                        <th>sku</th>
                        <th>Функції</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    foreach ($products as $product) : ?>
                        <tr>
                            <td><?= $product->id ?></td>
                            <td><a href="<?= url('admin/product/'. $product->id . '/edit')?>"><?= $product->name ?></a></td>
                            <?php $category = $product->category() ?>
                            <td><a href="admin/category/<?= $category->id ?>/edit"><?= $category->name ?></a></td>
                            <td><?= $product->price ?> ₴/ <span class="text-danger"><?= $product->price_sale ?> ₴</span>
                            </td>
                            <td><?= $product->slug ?></td>
                            <td>
                                <?php view('admin/blocks/common/option',['instance' => $product, 'slug' => 'shop/product/'.$product->slug]);  ?>
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
