<?php $__env->startPush('js'); ?>
    <script>
        $(document).ready(function () {
            $('table.table').on('click', 'button.btn-danger', function (event) {
                if (!confirm('Удалить запись?')) {
                    return false;
                }
            });
        });
    </script>

<?php $__env->stopPush(); ?>


<?php $__env->startSection('title'); ?>
    <h2><?php echo e($title); ?></h2>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php echo $__env->yieldContent('filters'); ?>

    <?php echo $__env->make('admin::common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php if(count($entities) > 0): ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <?php echo $__env->yieldContent('th'); ?>
            </tr>
            </thead>
            <tbody>
            <?php echo $__env->yieldContent('td'); ?>
            </tbody>
        </table>

        <?php echo $entities->appends(\Request::except('page'))->render(); ?>


    <?php else: ?>
        <p>Нет записей</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>