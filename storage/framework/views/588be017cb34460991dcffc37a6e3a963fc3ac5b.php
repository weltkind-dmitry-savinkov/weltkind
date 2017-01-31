<li class="b-works-slider__item">
    <div class="b-works-slider__img">
        <div class="b-works-slider__img-wrapper"><a href="<?php echo URL::route('portfolio.show', $item->id); ?>" title="<?php echo e($item->title); ?>"><img
                        src="/uploads/portfolio/main/<?php echo e($item->main_image); ?>" alt="<?php echo e($item->title); ?>"></a></div>
    </div>
    <div class="b-works-slider__title"><a href="<?php echo URL::route('portfolio.show', $item->id); ?>"><?php echo e($item->title); ?></a></div>
</li>