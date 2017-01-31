<?php if(count($items)): ?>
<section class="list-works list-works_compact">
    <div class="list-works__top">
        <div class="title-small">
            <h2 class="title-small__title">
                <a href="<?php echo URL::route('portfolio'); ?>"><?php echo app('translator')->get('portfolio::index.works'); ?></a>
            </h2>
            <a class="title-small__link" href="<?php echo URL::route('portfolio'); ?>"><?php echo app('translator')->get('portfolio::index.works.all'); ?></a>
        </div>
    </div>
    <ul class="list-works__list">
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <?php echo $__env->make('portfolio::_item', ['item'=>$item], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </ul>
</section>
<?php endif; ?>
