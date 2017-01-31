


<?php echo $__env->make('admin::common.controls.publish', ['routePrefix'=>$routePrefix, 'id'=>$id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('admin::common.controls.edit', ['routePrefix'=>$routePrefix, 'id'=>$id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('admin::common.controls.destroy', ['routePrefix'=>$routePrefix, 'id'=>$id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

