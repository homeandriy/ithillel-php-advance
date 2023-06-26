<?php
/**
 * @var \Core\Model $instance
 * @var string $slug
 * @var string $modelSlug
 */
?>

<a href="<?= url('admin/'.getModelName($instance, isset($modelSlug)??'').'/'.$instance->id.'/edit'); ?>" title="Редагувати"><i class='bx bx-edit-alt'></i></a>
<a href="<?= url('admin/'.getModelName($instance, isset($modelSlug)??'').'/'.$instance->id.'/show'); ?>" title="Дивитись в адмін-панелі"><i class='bx bx-show'></i></a>
<?php if(isset($slug)): ?>
<a href="<?= url($slug); ?>" title="Перейти на сайт" target="_blank"><i class='bx bx-search' ></i></a>
<?php endif; ?>
