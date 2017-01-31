<?php $__env->startSection('content'); ?>
    <div class="b-blog-item__left">
        <div class="b-blog-item__date-name"><span class="b-blog-item__gray"><?php echo e(Date::_('d.m.Y', $entity->date)); ?></span><span class="b-blog-item__gray b-blog-item__separator">&mdash;</span>
            <span class="b-blog-item__gray"><a href="#"><?php echo e($entity->user->name); ?></a></span></div>
        <div class="b-blog-item__content">
            <?php echo $entity->content; ?>

        </div><a href="<?php echo route('blog'); ?>" class="b-back-link">Назад</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>