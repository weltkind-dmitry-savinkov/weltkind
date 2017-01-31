<?php $__env->startSection('content'); ?>
<section class="work-full">
    <div class="row">
        <div class="col_md_6">
            <div class="work-full__left">
                <?php $__currentLoopData = $entity->images()->order()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <a class="work-full__preview" href="<?php echo e($image->image_thumb); ?>">
                    <img src="<?php echo e($image->image_thumb); ?>" alt="img">
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </div>
        </div>
        <div class="col_md_6">
            <div class="work-full__right">
                <div class="work-full__nav">
                    <div class="tabs-inline">
                        <div class="tabs-inline__item">
                            <a class="tabs-inline__link" href="<?php echo route($page->slug); ?>">Все работы</a>
                        </div>
                        <div class="tabs-inline__item">
                            <?php if($next): ?>
                                <a class="tabs-inline__link" href="<?php echo route($routePrefix.'show', ['id'=>$next]); ?>">Следующая работа »</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="work-full__info">
                    <?php echo $entity->content; ?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>