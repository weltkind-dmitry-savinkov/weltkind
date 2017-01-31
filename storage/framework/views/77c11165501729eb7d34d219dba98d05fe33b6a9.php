<?php if(count($errors) > 0): ?>
<!-- Список ошибок формы -->
<div class="alert alert-danger">
    <strong>Ошибка при сохранении формы</strong>

    <br><br>

    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<?php if(session()->has('message')): ?>
    <div class="alert alert-info"><?php echo e(session('message')); ?></div>
<?php endif; ?>