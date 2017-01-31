<?php if($paginator->hasPages()): ?>
<noindex>
<nav class="b-pagination">
    <ul>
        <?php if(!$paginator->onFirstPage()): ?>
        <li class="b-pagination__item b-pagination__item_larr"><a href="<?php echo e($paginator->previousPageUrl()); ?>" aria-label="Previous" class="b-pagination__link">&larr;</a></li>
        <?php endif; ?>

            
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                
                <?php if(is_string($element)): ?>
                    <li class="disabled"><span><?php echo e($element); ?></span></li>
                <?php endif; ?>

                
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <li class="b-pagination__item b-pagination__item_current"><span><?php echo e($page); ?></span></li>
                        <?php else: ?>
                            <li class="b-pagination__item"><a href="<?php echo e($url); ?>" class="b-pagination__link"><?php echo e($page); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

        <?php if($paginator->hasMorePages()): ?>
        <li class="b-pagination__item b-pagination__item_rarr"><a href="<?php echo e($paginator->nextPageUrl()); ?>" aria-label="Next" class="b-pagination__link">&rarr;</a></li>
        <?php endif; ?>
    </ul>
    <div class="clear"></div>
</nav>
</noindex>
<?php endif; ?>

