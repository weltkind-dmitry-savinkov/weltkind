<?php $__env->startSection('content'); ?>
    <div class="b-work-full">
        <div class="b-work-full__top-nav">
            <div class="b-works-nav"><a href="<?php echo route($page->slug); ?>">Все работы</a>
                <?php if($next): ?>
                    <a href="<?php echo route($routePrefix.'show', ['id'=>$next]); ?>">Следующая работа »</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="b-work-full__left">


            <?php $__currentLoopData = $entity->images()->order()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="b-work-full__img">
                <div class="b-site-screen__site"><img src="<?php echo e($image->image_thumb); ?>" alt="mac"></div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

            <div class="b-work-full__tariff">
                <p><strong>Тариф:</strong> Бизнес</p>
            </div>
        </div>

        <div class="b-work-full__right">
            <div class="b-work-full__nav">
                <div class="b-works-nav"><a href="<?php echo route('portfolio'); ?>">Все работы</a>
                    <?php if($next): ?>
                    <a href="<?php echo route('portfolio.show', ['id'=>$next]); ?>">Следующая работа »</a>
                    <?php endif; ?>
                    </div>
            </div>
            <div class="b-work-full__text">
               <?php echo $entity->content; ?>

            </div>

            <?php if($entity->url): ?>
            <noindex>
            <a href="<?php echo $entity->url; ?>" target="_blank" rel="nofollow" class="b-work-full__link"><?php echo $entity->url; ?></a>
            </noindex>
            <?php endif; ?>

        </div>
        <div class="clear"></div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>