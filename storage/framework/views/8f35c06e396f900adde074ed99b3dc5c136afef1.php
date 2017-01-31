<?php $__env->startSection('form_js'); ?>
    <?php echo $__env->make('admin::common.forms.datepicker', ['fields'=>[['id'=>'date', 'date'=>\Carbon\Carbon::now()->toDateString()]]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('admin::common.forms.ckeditor', ['fields'=>[['id'=>'content'], ['id'=>'preview']]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <h2><a href="<?php echo URL::route($routePrefix.'index'); ?>">Блог</a></h2>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('form_content'); ?>


    <?php echo BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update', 'autocomplete' => 'off',
    'files' => true]); ?>



    <div class="col-md-5">
        <?php echo BootForm::text('title', 'Заголовок'); ?>

    </div>

    <div class="col-md-5 col-md-offset-1">
        <?php echo BootForm::text('date', 'Дата', $entity->date?null:\Carbon\Carbon::now()->toDateString()); ?>

    </div>


    <div class="col-md-11">
        <?php echo BootForm::textarea('preview', 'Краткий текст', null); ?>

    </div>


    <div class="col-md-11">
        <?php echo BootForm::textarea('content', 'Полный текст', null); ?>

        <div class="clearfix"></div>
    </div>

    <div class="col-md-5">
        <?php echo BootForm::hidden('published', 0); ?>

        <?php echo BootForm::checkbox('published', 'Опубликовать', 1); ?>

    </div>

    <?php echo $__env->make('admin::common.forms.seo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::admin.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>