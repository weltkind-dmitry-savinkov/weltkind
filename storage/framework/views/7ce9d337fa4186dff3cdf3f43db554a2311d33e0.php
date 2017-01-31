<?php $__env->startSection('content'); ?>

<?php if(count($categories)): ?>
<ul class="tabs-inline">

    <?php if(!Request::get('category')): ?>
    <li class="tabs-inline__item">Все работы</li>
    <?php else: ?>
    <li class="tabs-inline__item">
        <a class="tabs-inline__link" href="<?php echo route($page->slug); ?>">Все работы</a>
    </li>
    <?php endif; ?>

    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <?php if(Request::get('category')==$category->id): ?>
    <li class="tabs-inline__item"><?php echo e($category->title); ?></li>
    <?php else: ?>
    <li class="tabs-inline__item">
        <a class="tabs-inline__link" href="<?php echo route($page->slug, ['category'=>$category->id] ); ?>"><?php echo e($category->title); ?></a>
    </li>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</ul>
<?php endif; ?>

<?php if(count($entities)): ?>
<section class="list-works">
    <ul class="list-works__list">
        <?php $__currentLoopData = $entities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <li class="list-works__item">
            <figure class="list-works__inner">
                <a class="list-works__link" href="<?php echo URL::route('portfolio.show', $entity->id); ?>"></a>
                <div class="list-works__image">
                    <img class="fit" src="<?php echo e($entity->image_thumb); ?>" alt="<?php echo e($entity->title); ?>">
                </div>
                <figcaption class="list-works__bottom">
                    <a class="list-works__name" href="<?php echo URL::route('portfolio.show', $entity->id); ?>"><?php echo e($entity->title); ?></a>
                </figcaption>
            </figure>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </ul>
</section>
<?php endif; ?>

<?php echo e($entities->appends(\Request::except('page'))->links('common.paginate')); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>