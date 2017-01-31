<?php $__env->startSection('topmenu'); ?>
    <div class="header-module-controls">
        <?php echo $__env->make('admin::common.topmenu.list', ['routePrefix'=>$routePrefix], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <a class="btn btn-primary" href="<?php echo route($routePrefix.'create', ['parent'=>@$entity->parent?:Request::get('parent')]); ?>">
                <i class="glyphicon glyphicon-plus"></i> Добавить
            </a>

    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('form_content'); ?>


<?php echo BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update',]); ?>


<div class="col-md-5">
    <?php echo BootForm::text('title', 'Название страницы'); ?>

</div>

<div class="col-md-5 col-md-offset-1">
    <?php if(Request::get('parent') || $entity->parent_id): ?>
    <?php echo BootForm::text('slug', 'Адресное имя'); ?>

    <?php endif; ?>
</div>


<div class="col-md-11">
    <?php echo BootForm::textarea('content', 'Содержание', null); ?>

    <div class="clearfix"></div>
</div>

<div class="col-md-5">
    <?php echo BootForm::hidden('published', 0); ?>

    <?php echo BootForm::checkbox('published', 'Опубликовать', 1); ?>

</div>

<div class="col-md-5 col-md-offset-1">
    <?php echo BootForm::hidden('in_menu', 0); ?>

    <?php echo BootForm::checkbox('in_menu', 'Вывести в главном меню', 1); ?>


</div>


<div class="col-md-5">
    <?php echo BootForm::select('module', 'Модуль', module_config('settings.modules')); ?>

</div>

<div class="col-md-5 col-md-offset-1">
    <?php echo BootForm::select('template', 'Шаблон', module_config('settings.templates')); ?>


</div>

<div class="col-md-5">
    <?php if(Request::get('parent') || $entity->parent_id): ?>
    <?php echo BootForm::select('parent_id', 'Родительский узел', Tree::getSelect(), Request::get('parent')); ?>

    <?php endif; ?>
</div>

<?php echo $__env->make('admin::common.forms.seo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::admin.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>