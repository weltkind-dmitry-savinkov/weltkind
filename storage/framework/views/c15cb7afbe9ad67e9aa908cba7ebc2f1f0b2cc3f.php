<?php $__env->startSection('title'); ?>
Изображения
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<iframe src="/admin/laravel-filemanager?type=Images&CKEditor=content&CKEditorFuncNum=0&langCode=ru" width="980" height="900" frameBorder="0"></iframe>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>