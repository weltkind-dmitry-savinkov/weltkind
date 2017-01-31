<?php $__env->startSection('topmenu'); ?>
    <div class="header-module-controls">
        <?php echo $__env->make('admin::common.topmenu.list', ['routePrefix'=>$routePrefix], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php if($entities): ?>
        <a class="btn btn-primary" href="<?php echo route($routePrefix.'create', ['parent'=>$entities[0]->id]); ?>">
            <i class="glyphicon glyphicon-plus"></i> Добавить
        </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin::common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if(count($entities) > 0): ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Название</th>
                <th>Адр. имя</th>
                <th>Приоритет</th>
                <th>Управление</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $entities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr <?php if(!$entity->published): ?> class="unpublished" <?php endif; ?>>

                    <td> <?php echo str_repeat('<span class="fa padding"></span> ', $entity->depth); ?> <span
                                class="fa <?php if($entity->isRoot()): ?>fa-cog <?php elseif(!$entity->isLeaf()): ?> fa-folder <?php else: ?> fa-sticky-note-o <?php endif; ?>"></span> <?php echo e($entity->title); ?>

                    </td>
                    <td><?php echo e($entity->slug); ?></td>
                    <td class="priority">
                        <?php if(!$entity->isRoot()): ?>
                            <?php echo $__env->make('admin::common.controls.priority', ['routePrefix'=>$routePrefix, 'entity'=>$entity], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></td>
                    <?php endif; ?>
                    <td class="controls">
                        <a class="btn btn-default btn-sm"
                           href="<?php echo route($routePrefix.'create', ['parent' => $entity->id]); ?>">
                            <i class="glyphicon glyphicon-plus"></i>
                        </a>

                        <?php echo $__env->make('admin::common.controls.publish', ['routePrefix'=>$routePrefix, 'id'=>$entity->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <?php echo $__env->make('admin::common.controls.edit', ['routePrefix'=>$routePrefix, 'id'=>$entity->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <?php if(!$entity->isRoot()): ?>
                            <?php echo $__env->make('admin::common.controls.destroy', ['routePrefix'=>$routePrefix, 'id'=>$entity->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endif; ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
        </table>
        <?php echo $entities->appends(\Request::except('page'))->render(); ?>

    <?php else: ?>
        <a href="<?php echo route($routePrefix.'create'); ?>" class="btn btn-primary icon-plus icon-white ">
            <span>Создать корневой узел</span>
        </a>
        </p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>