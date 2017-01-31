<?php $__env->startPush('js'); ?>
<script src="/adminlte/plugins/ckeditor/ckeditor.js"></script>
<script src="/adminlte/plugins/ckeditor/adapters/jquery.js"></script>
<script>

    <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    $('#<?php echo $field['id']; ?>').ckeditor({
        filebrowserImageBrowseUrl: '/<?php echo e(config('cms.uri')); ?>/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/<?php echo e(config('cms.uri')); ?>/laravel-filemanager/upload?type=Images&_token=<?php echo e(csrf_token()); ?>',
        filebrowserBrowseUrl: '/<?php echo e(config('cms.uri')); ?>/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/<?php echo e(config('cms.uri')); ?>/laravel-filemanager/upload?type=Files&_token=<?php echo e(csrf_token()); ?>',
        removeButtons: 'Underline',
        allowedContent: true,
        height: "350px"
    });
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</script>

<?php $__env->stopPush(); ?>