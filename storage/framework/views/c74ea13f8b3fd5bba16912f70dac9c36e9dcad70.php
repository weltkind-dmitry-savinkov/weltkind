<?php if(count($items)): ?>
<nav class="header__menu">
    <table class="menu-main">
        <tr>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php if(Request::is($item->slug)): ?>
                    <td class="menu-main__item">
                        <span class="menu-main__link menu-main__link_active"><?php echo e($item->title); ?></span>
                    </td>
                <?php else: ?>
                    <td class="menu-main__item">
                        <a class="menu-main__link" href="<?php echo URL::route($item->slug); ?>"><?php echo e($item->title); ?></a>
                    </td>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </tr>
    </table>
</nav>
<?php endif; ?>