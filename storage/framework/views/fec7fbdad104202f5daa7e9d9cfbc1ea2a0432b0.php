<?php $__env->startSection('topmenu'); ?>
    <div class="header-module-controls">
        <?php echo $__env->make('admin::common.topmenu.list', ['routePrefix'=>$routePrefix], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <h2><a href="<?php echo URL::route($routePrefix.'index'); ?>"><?php echo e($title); ?></a></h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel-body">

        <div class="col-md-5">
            <label>Дата</label>
            <p><?php echo e($entity->date); ?></p>
        </div>

        <div class="col-md-5 col-md-offset-1">
            <label>IP</label>
            <p><?php echo e(long2ip($entity->ip)); ?></p>
        </div>

        <div class="col-md-5">
          <label>Имя</label>
            <p><?php echo e($entity->name); ?></p>
        </div>

        <div class="col-md-5 col-md-offset-1">
            <label>Имя</label>
            <p><?php echo e($entity->email); ?></p>
        </div>

        <div class="col-md-11">
            <label>Сообщение</label>
            <p><?php echo nl2br($entity->message); ?></p>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>