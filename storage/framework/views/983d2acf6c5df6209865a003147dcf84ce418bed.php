<?php if(isset($routePrefix)): ?>
<div class="header-module-controls">
    <?php echo $__env->make('admin::common.topmenu.list', ['routePrefix'=>$routePrefix], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('admin::common.topmenu.create', ['routePrefix'=>$routePrefix], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<?php endif; ?>