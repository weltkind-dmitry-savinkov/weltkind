<?php $__env->startSection('h1'); ?>
Рекомeндации
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(count($entities)): ?>
    <ul class="list-rewards">
        <?php $__currentLoopData = $entities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <li class="list-rewards__item">
                <div class="card-reward">
                    <a class="card-reward__link" href="/uploads/reviews/full/<?php echo e($entity->image); ?>"></a>
                    <div class="card-reward__image">
                        <img src="/uploads/reviews/full/<?php echo e($entity->image); ?>" alt="<?php echo e($entity->title); ?>">
                    </div>
                    <div class="card-reward__text"><?php echo e($entity->title); ?></div>
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </ul>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>