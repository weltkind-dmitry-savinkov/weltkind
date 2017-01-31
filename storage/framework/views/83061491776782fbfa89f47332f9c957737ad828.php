<?php $__env->startSection('form_js'); ?>
<?php echo $__env->make('admin::common.forms.datepicker', ['fields'=>[['id'=>'date', 'date'=>\Carbon\Carbon::now()->toDateString()]]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin::common.forms.ckeditor', ['fields'=>[['id'=>'content']]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <h2><a href="<?php echo URL::route($routePrefix.'index'); ?>"><?php echo e($title); ?></a></h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="panel-body">
    <?php echo $__env->make('admin::common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('form_content'); ?>
    <div class="col-md-12">
        <?php echo BootForm::submit('Сохранить'); ?>

    </div>
    <?php echo BootForm::close(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>