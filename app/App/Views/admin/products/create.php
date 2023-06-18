<?php

view('admin/blocks/header');
?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="<?= url('/admin/products')?>">Товари</a> /</span> Створення</h4>
        <div class="row">
            <div class="col-md-12 card">
                <h5 class="card-header">Створити категорію</h5>
                <?php
                if (isset($errors)): ?>
                    <h2>Errors</h2>
                    <?php d($errors) ?>
                    <?= showInputError(array_key_first($errors), $errors) ?>
                <?php
                endif; ?>
                <form action="/admin/product/store" method="post">
                    <div class="card-body">
                        <div class="mt-2 mb-3">
                            <label for="name" class="form-label">Назва товару</label>
                            <input id="name" class="form-control form-control-lg" name="name" type="text"
                                   placeholder="Назва товару" pattern=".{2,}" required
                                   value="<?php if (isset($fields)): echo formInputHelper('name', $fields); endif; ?>">
                        </div>
                        <div class="mt-2 mb-3">
                            <label for="description" class="form-label">Опис Товару</label>
                            <textarea class="form-control" id="description" name="description" rows="5"
                                      minlength="10"><?php if (isset($fields)): echo formInputHelper('description', $fields); endif; ?></textarea>
                        </div>
                        <div class="mt-2 mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input id="slug" class="form-control form-control-lg" name="slug" type="text"
                                   placeholder="slug" pattern=".{3,}" required value="<?php if (isset($fields)): echo formInputHelper('slug', $fields); endif; ?>">
                        </div>
                        <div class="mt-2 mb-3">
                            <label for="price" class="form-label">Ціна</label>
                            <input id="price" class="form-control form-control-lg" name="price" type="number" step="0.01"
                                   placeholder="Ціна" pattern=".{1,}" required
                                   value="<?php if (isset($fields)): echo formInputHelper('price', $fields); endif; ?>">
                        </div>
                        <div class="mt-2 mb-3">
                            <label for="price_sale" class="form-label">Ціна за знижкою</label>
                            <input id="price_sale" class="form-control form-control-lg" name="price_sale" type="number" step="0.01"
                                   placeholder="Ціна за знижкою" pattern=".{1,}" required
                                   value="<?php if (isset($fields)): echo formInputHelper('price_sale', $fields); endif; ?>">
                        </div>
                        <div class="mt-2 mb-3">
                            <label for="sku" class="form-label">SKU</label>
                            <input id="sku" class="form-control form-control-lg" name="sku" type="text"
                                   placeholder="SKU" pattern=".{2,}" required
                                   value="<?php if (isset($fields)): echo formInputHelper('sku', $fields); endif; ?>">
                        </div>
                        <div class="mt-2 mb-3">
                            <label for="is_active" class="form-label">Активність (1 -увімкнено / 0 - вимкнено)</label>
                            <input id="is_active" class="form-control form-control-lg" name="is_active" type="number" step="1" min="0" max="1"
                                   placeholder="Активність (1 -увімкнено / 0 - вимкнено)" required
                                   value="<?php if (isset($fields)): echo formInputHelper('is_active', $fields); endif; ?>">
                        </div>
                        <div class="mt-2 mb-3">
                            <label for="category_id" class="form-label">Категорія</label>
                            <select id="category_id" class="form-select form-select-lg" name="category_id">
                                <?php foreach (\App\Models\Category::all() as $category): ?>
                                <option value="<?= $category->id; ?>"><?= $category->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Створити</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
view('admin/blocks/footer');
