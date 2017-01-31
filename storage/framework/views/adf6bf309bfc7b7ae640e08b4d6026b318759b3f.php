<?php $__env->startSection('form_content'); ?>


    <?php echo BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update', 'autocomplete' => 'off',
    'files' => true]); ?>



    <div class="col-md-5">
        <?php echo BootForm::text('title', 'Название работы'); ?>

    </div>

    <div class="col-md-5 col-md-offset-1">
        <?php echo BootForm::text('date', 'Дата', \Carbon\Carbon::now()->toDateString()); ?>

    </div>

    <div class="col-md-5">

        <?php echo BootForm::text('url', 'URL'); ?>


        <?php echo BootForm::text('priority', 'Приоритет'); ?>



        <?php echo BootForm::hidden('published', 0); ?>

        <?php echo BootForm::checkbox('published', 'Опубликовать', 1); ?>


        <?php echo BootForm::hidden('on_main', 0); ?>

        <?php echo BootForm::checkbox('on_main', 'Вывести на главной', 1); ?>



        <?php echo BootForm::select('categories[]', 'Категории', \App\Modules\Portfolio\Models\Category::getSelect(),  $entity->categories->pluck('id')->all(), ['id' => 'categories', 'multiple' => 'multiple'] ); ?>



    </div>

    <div class="col-md-5 col-md-offset-1">

        <?php echo $__env->make('admin::common.forms.image', ['entity'=>$entity, 'routePrefix'=>$routePrefix, 'field'=>'main_image'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>




    <div class="col-md-12">
        <?php echo BootForm::textarea('content', 'Полный текст', null); ?>

        <div class="clearfix"></div>
    </div>


    <div class="col-md-12">
        <?php echo $__env->make('admin::images.form', ['id'=>$entity->id, 'routePrefix'=>$routePrefix.'images.'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::admin.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>