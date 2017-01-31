<?php if(count($items)): ?>
<section class="list-clients">
    <div class="list-clients__top">
        <div class="title-small">
            <h2 class="title-small__title">
                <a href="<?php echo URL::route('reviews'); ?>">Клиенты:</a>
            </h2>
        </div>
    </div>
    <ul class="list-clients__list list-clients__list_prepared">
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num=>$item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <?php echo $__env->make('clients::_item', ['item'=>$item], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </ul>
    <div class="list-clients__bottom">
        <a class="list-clients__more link-dashed" href="<?php echo URL::route('reviews'); ?>">Показать ещё</a>
    </div>
</section>
<?php endif; ?>
