<?php echo Form::open(['route' => [$routePrefix.'priority', 'id'=>$entity->id, 'direction'=>'up'], 'method' => 'put']); ?>

<button type="submit" class="btn btn-sm" title="Поднять">
    <i class="glyphicon glyphicon-arrow-up"></i>
</button>
<?php echo Form::close(); ?>


<?php if(isset($entity->priority)): ?>
<span class="btn btn-sm"><?php echo $entity->priority; ?></span>
<?php endif; ?>

<?php echo Form::open(['route' => [$routePrefix.'priority', 'id'=>$entity->id, 'direction'=>'down'], 'method' => 'put']); ?>

<button type="submit" class="btn btn-sm" title="Опустить">
    <i class="glyphicon glyphicon-arrow-down"></i>
</button>
<?php echo Form::close(); ?>

