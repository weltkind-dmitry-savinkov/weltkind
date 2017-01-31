<?php $__env->startSection('form_content'); ?>


    <?php echo BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update', 'autocomplete' => 'off',
    'files' => true]); ?>



    <div class="col-md-5">
        <?php echo BootForm::text('title', 'Заголовок'); ?>

    </div>

    <div class="col-md-5 col-md-offset-1">
        <?php echo BootForm::text('date', 'Дата', \Carbon\Carbon::now()->toDateString()); ?>

    </div>

    <div class="col-md-5">
        <?php echo BootForm::hidden('published', 0); ?>

        <?php echo BootForm::checkbox('published', 'Опубликовать', 1); ?>

    </div>
    <div class="clearfix"></div>

    <?php echo $__env->make('admin::common.forms.image', ['entity'=>$entity, 'routePrefix'=>$routePrefix, 'field'=>'image'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::admin.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>