<?php $__env->startSection('title'); ?>
<h2>Главная страница</h2>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<p>Добропожаловать в панель управления</p>
<p>Скоро здесь будут ссылки на руководство пользователя.</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>