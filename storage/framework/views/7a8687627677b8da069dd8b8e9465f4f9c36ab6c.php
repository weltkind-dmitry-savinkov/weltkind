<?php if($paginator->hasPages()): ?>
<noindex>
    <nav>
        <ul class="paginator">
            <?php if(!$paginator->onFirstPage()): ?>
            <li class="paginator__item">
                <a class="paginator__link paginator__link_button" href="<?php echo e($paginator->previousPageUrl()); ?>">&larr;</a>
            </li>
            <?php endif; ?>
            
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                
                <?php if(is_string($element)): ?>
                    <li class="paginator__separator"><span>...</span></li>
                <?php endif; ?>
                
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <li class="paginator__item">
                                <span class="paginator__link paginator__link_active"><?php echo e($page); ?></span>
                            </li>
                        <?php else: ?>
                            <li class="paginator__item">
                                <a class="paginator__link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <?php if($paginator->hasMorePages()): ?>
            <li class="paginator__item">
                <a class="paginator__link paginator__link_button" href="<?php echo e($paginator->nextPageUrl()); ?>">&rarr;</a>
            </li>
            <?php endif; ?>
        </ul>
    </nav>
</noindex>
<?php endif; ?>
