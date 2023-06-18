<?php
/**
 * @var Category[] $categories
 */

use App\Models\Category;

view('admin/blocks/header');
?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Категорії /</span> Список</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header">
                <h5>Список товарів</h5>
                <div class="float-end">
                    <a href="<?= url('admin/category/create') ?>" class="btn btn-primary">Створити категорію</a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Назва</th>
                        <th>Кількість товарів</th>
                        <th>Slug</th>
                        <th>Функції</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    foreach ($categories as $category) : ?>
                        <tr>
                            <td><?= $category->id ?></td>
                            <td><a href="<?= url('admin/category/'. $category->id . '/edit')?>"><?= $category->name ?></a></td>
                            <?php
                            $products = $category->products() ?>
                            <td><?= count($products) ?></td>
                            <td><?= $category->slug ?></td>
                            <td>
                                <?php
                                view(
                                    'admin/blocks/common/option',
                                    [
                                        'instance' => $category,
                                        'slug' => 'shop/category/' . $category->slug
                                    ]
                                ); ?>
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
