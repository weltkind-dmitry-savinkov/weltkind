<?php $__env->startSection('content'); ?>
    <div class="b-portfolio-list">
        <?php if(count($categories)): ?>
        <div class="b-portfolio-list__sorting">
            <div class="b-sorting">

                <ul>
                    <li class="b-sorting__item <?php if(!Request::get('category')): ?> b-sorting__item_active <?php endif; ?>"><a href="<?php echo route($page->slug); ?>" class="b-sorting__link">Все работы </a></li>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li class="b-sorting__item <?php if(Request::get('category')==$category->id): ?> b-sorting__item_active <?php endif; ?>"><a href="<?php echo route($page->slug, ['category'=>$category->id] ); ?>" class="b-sorting__link"><?php echo e($category->title); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                </ul>
                <div class="clear"></div>
            </div>
        </div>
        <?php endif; ?>
        <?php if(count($entities)): ?>
        <div class="b-portfolio-list__list">
            <ul>
                <?php $__currentLoopData = $entities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li class="b-portfolio-list__item">
                    <div class="b-work">
                        <div class="b-work__img"><a href="<?php echo URL::route('portfolio.show', $entity->id); ?>"><img src="<?php echo e($entity->image_thumb); ?>" alt="<?php echo e($entity->title); ?>"></a></div>
                        <h2 class="b-work__title"><a href="<?php echo URL::route('portfolio.show', $entity->id); ?>"><?php echo e($entity->title); ?></a></h2>
                    </div>
                </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
            <div class="clear"></div>
        </div>

            <?php echo e($entities->appends(\Request::except('page'))->links('common.paginate')); ?>


        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>