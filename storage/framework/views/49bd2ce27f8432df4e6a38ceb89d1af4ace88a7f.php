<?php if(count($items)): ?>
<div class="b-content__clients">
    <div class="b-clients-list">
        <div class="b-clients-list__title">
            <h2 class="b-small-title"><a href="<?php echo URL::route('reviews'); ?>">Клиенты:</a></h2>
        </div>
        <div class="b-clients-list__list b-clients-list__list_300">
            <ul>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num=>$item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php echo $__env->make('clients::_item', ['item'=>$item], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php if($num>13): ?>
                        <?php break; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="b-clients-list__list b-clients-list__list_640">
            <ul>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num=>$item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php echo $__env->make('clients::_item', ['item'=>$item], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
</div>
<?php endif; ?>