<?php $__env->startSection('title'); ?>
<h2><a href="<?php echo URL::route($routePrefix.'index'); ?>">Администраторы</a></h2>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="panel-body">
    <!-- Display Validation Errors -->
    <?php echo $__env->make('admin::common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update', 'autocomplete' => 'off']); ?>


    <!-- The text and password here are to prevent FF from auto filling my login credentials because it ignores autocomplete="off"-->
    <input type="text" style="display:none">
    <input type="password" style="display:none">


    <div class="col-md-5">
        <?php echo BootForm::text('name', 'Имя'); ?>

    </div>

    <div class="col-md-5 col-md-offset-1">
        <?php echo BootForm::email('email', 'Электронная почта'); ?>

    </div>

    <div class="col-md-5">
        <?php echo BootForm::password('password', 'Пароль'); ?>

        <?php if($entity->id): ?>
        <span class="help-block">Оставьте поле пустым, если не хотите менять пароль</span>
        <?php endif; ?>
    </div>


    <div class="col-md-12">
        <?php echo BootForm::submit('Сохранить'); ?>

    </div>

    <?php echo BootForm::close(); ?>





</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>