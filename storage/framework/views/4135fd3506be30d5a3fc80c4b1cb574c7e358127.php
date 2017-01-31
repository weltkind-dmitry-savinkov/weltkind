<?php $__env->startSection('form_js'); ?>
    <?php echo $__env->make('admin::common.forms.datepicker', ['fields'=>[['id'=>'add_date']]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('form_content'); ?>


    <?php echo BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update', 'autocomplete' => 'off',
    'files' => true]); ?>



    <div class="col-md-5">
        <?php echo BootForm::text('title', 'Название'); ?>

    </div>


    <div class="col-md-5 col-md-offset-1">
        <?php echo BootForm::text('add_date', 'Дата', $entity->add_date?null:\Carbon\Carbon::now()->toDateString()); ?>

    </div>

<div class="clearfix"></div>

    <div class="col-md-5">
        <?php echo BootForm::text('URL', 'URL'); ?>

        <?php echo BootForm::hidden('published', 0); ?>

        <?php echo BootForm::checkbox('published', 'Опубликовать', 1); ?>

        <?php echo BootForm::text('priority', 'Приоритет'); ?>

    </div>

    <div class="col-md-5 col-md-offset-1">
        <?php echo $__env->make('admin::common.forms.image', ['entity'=>$entity, 'routePrefix'=>$routePrefix, 'field'=>'image'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::admin.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>