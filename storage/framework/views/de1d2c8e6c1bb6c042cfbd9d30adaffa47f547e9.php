<?php $__env->startSection('title'); ?>
    <h2><a href="<?php echo URL::route($routePrefix.'index'); ?>">Faq</a></h2>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('form_content'); ?>


    <?php echo BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update', 'autocomplete' => 'off',
    'files' => true]); ?>



    <div class="col-md-5">
        <?php echo BootForm::text('title', 'Вопрос'); ?>

    </div>

    <div class="col-md-5 col-md-offset-1">
        <?php echo BootForm::text('date', 'Дата', \Carbon\Carbon::now()->toDateString()); ?>

    </div>


    <div class="col-md-11">
        <?php echo BootForm::textarea('preview', 'Краткий ответ', null, ['style'=>'height:100px']); ?>

    </div>


    <div class="col-md-11">
        <?php echo BootForm::textarea('content', 'Ответ', null); ?>

        <div class="clearfix"></div>
    </div>

    <div class="col-md-5">
        <?php echo BootForm::hidden('published', 0); ?>

        <?php echo BootForm::checkbox('published', 'Опубликовать', 1); ?>

    </div>

    <div class="col-md-5 col-md-offset-1">
        <?php echo BootForm::hidden('on_main', 0); ?>

        <?php echo BootForm::checkbox('on_main', 'Вывести на главной', 1); ?>


    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::admin.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>