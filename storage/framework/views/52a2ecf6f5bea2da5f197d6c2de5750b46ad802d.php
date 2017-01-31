<?php $__env->startSection('th'); ?>
<th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('created_at', 'Дата добавления'));?></th>
<th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name', ' Имя'));?></th>
<th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('email', ' Email'));?></th>
<th>Управление</th>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('td'); ?>
<?php $__currentLoopData = $entities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
<tr>
    <td><?php echo e($entity->created_at); ?></td>
    <td><?php echo e($entity->name); ?></td>
    <td><?php echo e($entity->email); ?></td>
    <td>

        <?php echo $__env->make('admin::common.controls.edit', ['routePrefix'=>$routePrefix, 'id'=>$entity->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php if(Auth::user()->id != $entity->id): ?>
            <?php echo $__env->make('admin::common.controls.destroy', ['routePrefix'=>$routePrefix, 'id'=>$entity->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>