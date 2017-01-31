<?php $__env->startSection('th'); ?>
    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('date', ' Дата'));?></th>
    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('title', ' Название'));?></th>
    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('url', ' URL'));?></th>
    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('priority', ' Приоритет'));?></th>
    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('image', ' Лого'));?></th>
    <th>Управление</th>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('td'); ?>
    <?php $__currentLoopData = $entities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr <?php if(!$entity->published): ?> class="unpublished" <?php endif; ?>>
            <td><?php echo e($entity->date); ?></td>
            <td><?php echo e($entity->title); ?></td>
            <td><?php echo e($entity->url); ?></td>
            <td><?php echo $__env->make('admin::common.controls.priority', ['routePrefix'=>$routePrefix, 'entity'=>$entity], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></td>
            <td><img src="<?php echo e($entity->imagePath('mini')); ?>" alt="<?php echo e($entity->title); ?>"></td>
            <td class="controls"><?php echo $__env->make('admin::common.controls.all', ['routePrefix'=>$routePrefix, 'id'=>$entity->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>