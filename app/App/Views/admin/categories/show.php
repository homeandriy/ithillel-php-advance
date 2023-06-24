<?php

/**
 * @var \App\Models\Category $category
 */
view('admin/blocks/header');
?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="<?= url('/admin/categories')?>">Категорії</a> /</span> Перегляд</h4>
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
                                    <td><?= $category->id; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Назва</strong></td>
                                    <td><?= $category->name; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Slug</strong></td>
                                    <td><?= $category->slug; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Опис</strong></td>
                                    <td><?= $category->description; ?></td>
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
