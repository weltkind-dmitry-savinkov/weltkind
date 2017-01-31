<?php if($breadcrumbs): ?>
    <div class="b-bread-crumbs">
        <ul class="g-clearfix">
            <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php if($breadcrumb->url && !$breadcrumb->last): ?>
            <li class="b-bread-crumbs__item"> <a href="<?php echo e($breadcrumb->url); ?>" class="b-bread-crumbs__link"><?php echo e($breadcrumb->title); ?></a><span class="b-bread-crumbs__separator">/</span></li>
                <?php else: ?>
            <li class="b-bread-crumbs__item"><?php echo e($breadcrumb->title); ?></li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>
    </div>
<?php endif; ?>