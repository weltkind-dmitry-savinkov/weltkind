<?php $__env->startSection('topmenu'); ?>
    <div class="header-module-controls">
        <?php echo $__env->make('admin::common.topmenu.list', ['routePrefix'=>$routePrefix], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('filters'); ?>
    <?php echo BootForm::open([ 'route' => 'admin.settings.store', 'method' => 'post']); ?>

    <div class="box box-primary">
        <div class="box-header"></div>
        <div class="box-body">
            <div class="col-md-3">
                <?php echo BootForm::text('settings[lat]', 'Широта',  Settings::get('lat')); ?>

            </div>

            <div class="col-md-3">
                <?php echo BootForm::text('settings[lng]', 'Долгота',  Settings::get('lng')); ?>

            </div>

            <div class="col-md-3">
                <?php echo BootForm::text('settings[zoom]', 'Приближение',  Settings::get('zoom')); ?>

            </div>

            <div class="col-md-2">
                <?php echo BootForm::submit('Сохранить'); ?>

            </div>

        </div>
    </div>
    <?php echo BootForm::close(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('th'); ?>
    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('date', ' Дата'));?></th>
    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('email', 'Email'));?></th>
    <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name', ' Имя'));?></th>
    <th>Управление</th>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('td'); ?>
    <?php $__currentLoopData = $entities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td><?php echo e($entity->date); ?></td>
            <td><?php echo e($entity->email); ?></td>
            <td><?php echo e($entity->name); ?></td>
            <td class="controls">
                <?php echo $__env->make('admin::common.controls.edit', ['routePrefix'=>$routePrefix, 'id'=>$entity->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('admin::common.controls.destroy', ['routePrefix'=>$routePrefix, 'id'=>$entity->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>