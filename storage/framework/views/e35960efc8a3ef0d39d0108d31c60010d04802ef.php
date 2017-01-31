<?php echo Form::open(['route' => [$routePrefix.'update', 'id'=>$id], 'method' => 'put']); ?>



<?php echo BootForm::hidden('published', abs($entity->published -1)); ?>


<button type="submit" class="btn btn-default btn-sm" title="<?php if($entity->published): ?> Снять с публикации <?php else: ?> Опубликовать <?php endif; ?>">
    <i class="glyphicon <?php if($entity->published): ?>glyphicon-ban-circle  <?php else: ?> glyphicon-ok-circle <?php endif; ?>"></i>
</button>
<?php echo Form::close(); ?>