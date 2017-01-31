<?php $__env->startSection('form_js'); ?>
    <?php if($entity->type == 'wysiwyg'): ?>
    <?php echo $__env->make('admin::common.forms.ckeditor', ['fields'=>[['id'=>'content']]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel-body">
        <?php echo $__env->make('admin::common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update', 'autocomplete' => 'off',
        'files' => true]); ?>



        <div class="col-md-5">
            <?php echo BootForm::text('title', 'Название'); ?>

        </div>

        <div class="col-md-5 col-md-offset-1">
            <?php echo BootForm::text('slug', 'Адресное имя'); ?>

        </div>



        <div class="col-md-5">
            <?php echo BootForm::hidden('published', 0); ?>

            <?php echo BootForm::checkbox('published', 'Опубликовать', 1); ?>

        </div>

        <div class="col-md-5 col-md-offset-1">
            <?php echo BootForm::select('type', 'Тип', ['html'=>'Текстовый', 'wysiwyg'=>'Визуальный редактор']); ?>

        </div>

        <div class="col-md-11">
            <?php echo BootForm::textarea('content', 'Содержание', null); ?>

        </div>

        <div class="col-md-12">
            <?php echo BootForm::submit('Сохранить'); ?>

        </div>
        <?php echo BootForm::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>