<?php

/**
 * @var \App\Models\Category $category
 */
view('admin/blocks/header');
?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="<?= url('/admin/categories')?>">Категорії</a> /</span> Редагування: <?= $category->name?></h4>
        <div class="row">
            <div class="col-md-12 card">
                <h5 class="card-header">Редагувати категорію</h5>
                <?php
                if (isset($errors)): ?>
                    <?= showInputError(array_key_first($errors), $errors) ?>
                <?php
                endif; ?>
                <form action="/admin/category/<?=$category->id;?>/update" method="post">
                    <input type="hidden" name="id" value="<?=$category->id;?>">
                    <div class="card-body">
                        <div class="mt-2 mb-3">
                            <label for="name" class="form-label">Назва категорії</label>
                            <input id="name" class="form-control form-control-lg" name="name" type="text"
                                   placeholder="Назва категорії" pattern=".{2,}" required
                                   value="<?php if (isset($fields)): echo formInputHelper('name', $fields); else: echo $category->name; endif; ?>">
                        </div>
                        <div class="mt-2 mb-3">
                            <label for="description" class="form-label">Опис категорії</label>
                            <textarea class="form-control" id="description" name="description" rows="5"
                                      minlength="10"><?php if (isset($fields)): echo formInputHelper('description', $fields); else: echo $category->description; endif; ?></textarea>
                        </div>
                        <div class="mt-2 mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input id="slug" class="form-control form-control-lg" name="slug" type="text"
                                   placeholder="slug" pattern=".{3,}" required value="<?php if (isset($fields)): echo formInputHelper('slug', $fields); else: echo $category->slug; endif; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Обновити</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
view('admin/blocks/footer');
