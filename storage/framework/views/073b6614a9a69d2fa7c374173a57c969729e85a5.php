<?php if(count($items)): ?>
<div class="b-content__slider">
    <div class="b-works-slider">
        <div class="b-works-slider__top">
            <div class="b-works-slider__headline">
                <h2 class="b-small-title"><a href="<?php echo URL::route('portfolio'); ?>"><?php echo app('translator')->get('portfolio::index.works'); ?>:</a></h2>
            </div>
            <div class="b-works-slider__more"><a href="<?php echo URL::route('portfolio'); ?>"><?php echo app('translator')->get('portfolio::index.works.all'); ?></a></div>
            <div class="clear"></div>
        </div>
        <div class="b-works-slider__content b-works-slider__content_300">
            <div class="b-works-slider__slides">
                <ul>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num=>$item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php echo $__env->make('portfolio::_item', ['item'=>$item], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php break; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>

            </div>
        </div>
        <div class="b-works-slider__content b-works-slider__content_640">
            <a href="#" class="b-works-slider__rarr">next</a>

            <div class="b-works-slider__slides">
                <ul>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num=>$item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php echo $__env->make('portfolio::_item', ['item'=>$item], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php if($num>1): ?>
                            <?php break; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
            </div>
        </div>
        <div class="b-works-slider__content b-works-slider__content_1024">
            <a href="#" class="b-works-slider__rarr">next</a>

            <div class="b-works-slider__slides">
                <ul>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num=>$item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php echo $__env->make('portfolio::_item', ['item'=>$item], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php if($num>2): ?>
                            <?php break; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
            </div>
        </div>
        <div class="b-works-slider__content b-works-slider__content_1400">
            <a href="#" class="b-works-slider__larr">prev</a><a href="#" class="b-works-slider__rarr">next</a>
            <div class="b-works-slider__slides">
                <ul>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php echo $__env->make('portfolio::_item', ['item'=>$item], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>