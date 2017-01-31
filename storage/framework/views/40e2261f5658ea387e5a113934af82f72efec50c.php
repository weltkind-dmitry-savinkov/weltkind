<?php if($entities): ?>
    <?php $__currentLoopData = $entities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="timeline-body" id="item-<?php echo $entity->id; ?>">
            <?php if($entity->imagePath('full')): ?>
                <a href="<?php echo $entity->imagePath('full'); ?>" rel="ajax">
                    <img class="margin thumb" src="<?php echo $entity->imagePath('mini')?:$entity->imagePath('thumb'); ?>"></a>
            <?php else: ?>
                <img class="margin thumb" src="<?php echo $entity->imagePath('mini')?:$entity->imagePath('thumb'); ?>">
            <?php endif; ?>
            <a class="btn btn-danger"
               data-href="<?php echo URL::route($routePrefix.'destroy', ['parent'=>$parent, 'id'=>$entity]); ?>">
                <i class="glyphicon glyphicon-trash"></i>
            </a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php else: ?>
    <p>Нет загруженных изображений</p>
<?php endif; ?>