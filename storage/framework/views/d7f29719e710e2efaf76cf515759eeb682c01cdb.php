<?php if($breadcrumbs): ?>
<nav>
    <ul class="breadcrumbs">
        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <?php if($breadcrumb->url && !$breadcrumb->last): ?>
                <li class="breadcrumbs__item">
                    <a class="breadcrumbs__link" href="<?php echo e($breadcrumb->url); ?>"><?php echo e($breadcrumb->title); ?></a>
                    <div class="breadcrumbs__separator">
                    </div>
                </li>
            <?php else: ?>
                <li class="breadcrumbs__item"><?php echo e($breadcrumb->title); ?></li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </ul>
</nav>
<?php endif; ?>
