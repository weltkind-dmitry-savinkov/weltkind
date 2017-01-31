<?php if(isset($routePrefix)): ?>
<div class="header-module-controls">
    <a class="btn btn-default" href="<?php echo route($routePrefix.'index'); ?>">
        <i class="glyphicon glyphicon-list-alt"></i> Список
    </a>

    <a class="btn btn-primary" href="<?php echo route($routePrefix.'create'); ?>">
        <i class="glyphicon glyphicon-plus"></i> Добавить
    </a>
</div>
<?php endif; ?>