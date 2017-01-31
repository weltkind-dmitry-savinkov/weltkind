<?php $__env->startSection('content'); ?>
    <main role="main">
        <?php echo $page->content; ?>

    </main>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>