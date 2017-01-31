<?php $__env->startSection('content'); ?>
    <?php if(count($entities)): ?>
        <ul class="list-blogs">
            <?php $__currentLoopData = $entities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <li class="list-blogs__item">
                <article>
                    <header class="list-blogs__header">
                        <h2 class="list-blogs__title">
                            <a href="<?php echo e(route('blog.show',$entity)); ?>"><?php echo e($entity->title); ?></a>
                        </h2>
                        <div class="list-blogs__info">
                            <div class="info-small">
                                <time class="info-small__time" datetime="<?php echo e(Date::_('Y-m-d', $entity->date)); ?>"><?php echo e(Date::_('d.m.Y', $entity->date)); ?></time>
                                <span class="info-small__separator">&mdash;</span>
                                <a class="info-small__author" href="#"><?php echo e($entity->user->name); ?></a>
                            </div>
                        </div>
                    </header>
                    <div class="list-blogs__content"><?php echo $entity->preview; ?></div>
                </article>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>
        <?php echo e($entities->appends(\Request::except('page'))->links('common.paginate')); ?>

    <?php else: ?>
        <p>Нет записей</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>