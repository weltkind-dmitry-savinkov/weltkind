<?php $__env->startSection('page_content'); ?>
    <div class="layout">
        <div class="layout__wrapper">
        <?php echo $__env->make('tree::breadcrumbs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php if (! empty(trim($__env->yieldContent('h1')))): ?>
            <h1 class="page-title"><?php echo $__env->yieldContent('h1'); ?></h1>
        <?php elseif(isset($meta->h1) && $meta->h1): ?>
            <h1 class="page-title"><?php echo e($meta->h1); ?></h1>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>

        </div>
    </div>

    <!-- Arcticmodal block-->
    <div class="div" style="display: none;">
        <?php echo $__env->make('common.modal-feedback', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>