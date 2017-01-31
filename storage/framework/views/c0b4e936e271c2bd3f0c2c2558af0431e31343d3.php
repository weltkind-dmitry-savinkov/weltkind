<li class="list-works__item">
    <figure class="list-works__inner">
        <a class="list-works__link" href="<?php echo URL::route('portfolio.show', $item->id); ?>" title="<?php echo e($item->title); ?>"></a>
        <div class="list-works__image">
            <img class="fit" src="<?php echo e($item->imagePath('thumb')); ?>" alt="<?php echo e($item->title); ?>">
        </div>
        <figcaption class="list-works__bottom">
            <a class="list-works__name" href="<?php echo URL::route('portfolio.show', $item->id); ?>"><?php echo e($item->title); ?></a>
        </figcaption>
    </figure>
</li>
