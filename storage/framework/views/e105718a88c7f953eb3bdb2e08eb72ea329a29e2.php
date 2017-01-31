<?php echo $__env->make('admin::common.meta-head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<section class="content">
   <?php echo $__env->yieldContent('content'); ?>
</section>
<?php echo $__env->make('admin::common.meta-footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>