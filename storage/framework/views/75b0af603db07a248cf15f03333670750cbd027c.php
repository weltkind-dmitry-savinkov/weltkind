<?php $__env->startSection('page'); ?>
    <div class="b-content b-content__inner">
        <section>
            <?php echo $__env->make('tree::breadcrumbs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php if (! empty(trim($__env->yieldContent('h1')))): ?>
            <h1 class="b-page-title"><?php echo $__env->yieldContent('h1'); ?></h1>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>

        </section>
        <!-- END FORMS-->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>