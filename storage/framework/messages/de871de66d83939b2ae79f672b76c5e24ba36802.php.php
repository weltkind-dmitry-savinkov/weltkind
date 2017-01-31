<?php $__env->startSection('content'); ?>
    <?php echo $page->content; ?>

<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>