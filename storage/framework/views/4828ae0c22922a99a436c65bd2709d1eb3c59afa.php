<?php $__env->startPush('js'); ?>
<script>
    $(document).ready(function () {
        $(document).on('click', '.timeline-body a.btn-danger', function (event) {
            if (confirm('Удалить изображение?')) {
                $.ajax({
                    url: $(this).attr('data-href'),
                    type: 'DELETE',  // user.destroy
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                    },
                    success: function (result) {
                        location.reload();
                        return false;
                    }
                });
                return false;
            }
            else {
                return false;
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<div class="images-list">

    <?php echo BootForm::label('Изображение'); ?>

    <div class="clearfix"></div>

    <?php if($entity->$field): ?>
    <div class="timeline-body">

        <?php if($entity->imagePath('full')): ?>
            <a href="<?php echo $entity->imagePath('full'); ?>" rel="ajax"><img src="<?php echo $entity->imagePath('mini')?:$entity->imagePath('thumb'); ?>"></a>
        <?php else: ?>
            <img src="<?php echo $entity->imagePath('mini')?:$entity->imagePath('thumb'); ?>">
        <?php endif; ?>

        <a class="btn btn-danger"
                data-href="<?php echo URL::route($routePrefix.'delete-upload', ['id'=>$entity, 'field'=>$field]); ?>">
            <i class="glyphicon glyphicon-trash"></i>
        </a>
    </div>
    <?php else: ?>
    <?php echo Form::file($field); ?>

    <?php endif; ?>
</div>