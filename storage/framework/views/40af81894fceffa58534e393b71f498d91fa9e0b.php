<?php if(count($items)): ?>
<div class="b-header__bottom">
    <div class="b-header__menu">
        <div class="b-simple-menu">
            <ul>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li class="b-simple-menu__item <?php echo (Request::is($item->slug) ? 'active' : ''); ?>"><a href="<?php echo URL::route($item->slug); ?>" class="b-simple-menu__link"><?php echo e($item->title); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
        </div>
    </div>
    <div class="b-header__button">
        <a href="#" class="b-button b-button_block b-button_color_transparent b-button_size_sm b-button_bold"><?php echo app('translator')->get('index.order'); ?></a></div>
    <div class="clear"></div>
</div>
<?php endif; ?>