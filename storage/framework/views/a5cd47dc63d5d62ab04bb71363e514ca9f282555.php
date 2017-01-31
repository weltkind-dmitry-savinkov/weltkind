<?php $__env->startSection('h1'); ?>
Рекомeндации
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(count($entities)): ?>
<div class="b-rewards-list">
    <ul>
        <?php $__currentLoopData = $entities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <li class="b-rewards-list__item">
            <div class="b-reward">
                <div class="b-reward__img"><img src="<?php echo e($entity->image_thumb); ?>" alt="<?php echo e($entity->title); ?>"></div><a href="/uploads/reviews/full/<?php echo e($entity->image); ?>" class="js-cbox-modal b-reward__mask"></a>
                <div class="b-reward__name">
                    <h2 class="b-reward__title"><?php echo e($entity->title); ?></h2>
                </div>
            </div>
        </li>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </ul>
    <div class="clear"></div>
</div>
    <?php else: ?>
        <p>Нет записей</p>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>