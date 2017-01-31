<?php $__env->startSection('content'); ?>
<article class="blog-full">
    <header class="blog-full__header">
        <div class="info-small">
            <time class="info-small__time" datetime="<?php echo e(Date::_('Y-m-d', $entity->date)); ?>"><?php echo e(Date::_('d.m.Y', $entity->date)); ?></time>
            <span class="info-small__separator">&mdash;</span>
            <a class="info-small__author" href="#"><?php echo e($entity->user->name); ?></a>
        </div>
    </header>
    <div class="blog-full__content">
        <?php echo $entity->content; ?>

    </div>
    <footer>
        <p>
            <a href="<?php echo route('blog'); ?>">&larr; Назад</a>
        </p>
    </footer>
</article>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>