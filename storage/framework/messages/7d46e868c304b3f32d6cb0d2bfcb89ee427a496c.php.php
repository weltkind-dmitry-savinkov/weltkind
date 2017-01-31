<div class="row">

  <?php if((sizeof($file_info) > 0) || (sizeof($directories) > 0)): ?>

  <?php $__currentLoopData = $directories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dir_name): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
  <?php echo $__env->make('laravel-filemanager::folders', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

  <?php $__currentLoopData = $file_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $file): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
  <?php echo $__env->make('laravel-filemanager::item', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

  <?php else: ?>
  <div class="col-md-12">
    <p><?php echo e(Lang::get('laravel-filemanager::lfm.message-empty')); ?></p>
  </div>
  <?php endif; ?>

</div>
