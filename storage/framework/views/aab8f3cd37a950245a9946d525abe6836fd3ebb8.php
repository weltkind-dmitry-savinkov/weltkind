<?php echo Form::open(['route' => [$routePrefix.'destroy', 'id'=>$id], 'method' => 'delete']); ?>

<button type="submit" class="btn btn-danger btn-sm" title="Удалить">
    <i class="glyphicon glyphicon-trash"></i>
</button>
<?php echo Form::close(); ?>