<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>

<script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="/adminlte/plugins/datepicker/locales/bootstrap-datepicker.ru.js"></script>

<script src="/adminlte/plugins/input-mask/jquery.inputmask.js"></script>
<script src="/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="/adminlte/plugins/input-mask/jquery.inputmask.extensions.js"></script>


<script>
    $(function () {
        <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

        $('#<?php echo $field['id']; ?>').inputmask("yyyy-mm-dd").datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
            language: 'ru',
            <?php if(isset($field['date'])): ?>
                date: '<?php echo $field['date']; ?>',
            <?php endif; ?>

        });

        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    });
</script>

<?php $__env->stopPush(); ?>