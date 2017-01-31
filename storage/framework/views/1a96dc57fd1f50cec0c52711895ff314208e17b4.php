<?php $__env->startSection('content'); ?>
    <?php if(count($entities)): ?>
        <div class="b-blog-list">
            <div class="b-blog-list__left">
                <ul>
                    <?php $__currentLoopData = $entities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li class="b-blog-list__item">
                        <div class="b-blog-item">
                            <h3 class="b-blog-item__title b-blog-item__title_big"><a href="<?php echo e(route('blog.show',$entity)); ?>"><?php echo e($entity->title); ?></a></h3>
                            <div class="b-blog-item__head"><span class="b-blog-item__gray"><?php echo e(Date::_('d.m.Y', $entity->date)); ?></span><span class="b-blog-item__gray b-blog-item__separator">&mdash;</span>
                                <span class="b-blog-item__gray"><a href="#"><?php echo e($entity->user->name); ?></a></span></div>
                            <div class="b-blog-item__preview"><?php echo $entity->preview; ?></div>
                            <!--<div class="b-blog-item__comments"><a href="#">Комментарии: 1</a></div>-->
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                </ul>
            </div>

            <div class="clear"></div>
        </div>

        <?php echo e($entities->appends(\Request::except('page'))->links('common.paginate')); ?>


    <?php else: ?>
        <p>Нет записей</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>