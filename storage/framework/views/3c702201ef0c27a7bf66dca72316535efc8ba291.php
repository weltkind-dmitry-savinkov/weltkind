<?php $__env->startSection('title'); ?>
    <h2>Портфолио</h2> / <a href="<?php echo URL::route($routePrefix.'index'); ?>">Категории</a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('form_content'); ?>


    <?php echo BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update', 'autocomplete' => 'off',
    'files' => true]); ?>



    <div class="col-md-5">
        <?php echo BootForm::text('title', 'Название категории'); ?>

    </div>

    <div class="col-md-5 col-md-offset-1">
        <?php echo BootForm::hidden('only_in_list', 0); ?>

        <?php echo BootForm::checkbox('only_in_list', 'Выводить работы только внутри категории', 1); ?>

    </div>

    <div class="clearfix"></div>

    <div class="col-md-5">
        <?php echo BootForm::text('priority', 'Приоритет'); ?>

    </div>

    <div class="col-md-5 col-md-offset-1">
        <?php echo BootForm::hidden('published', 0); ?>

        <?php echo BootForm::checkbox('published', 'Опубликовать', 1); ?>

    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::admin.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>