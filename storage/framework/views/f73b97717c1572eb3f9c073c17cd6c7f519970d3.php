<?php $__env->startSection('meta-title'); ?>
      <?php echo e(config('app.name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('h1'); ?>
   <?php echo app('translator')->get('index.404'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

   <p><?php echo app('translator')->get('index.404.content'); ?></p>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>