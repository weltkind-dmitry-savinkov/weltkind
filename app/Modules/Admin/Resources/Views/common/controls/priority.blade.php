{!! Form::open(['route' => [$routePrefix.'priority', 'id'=>$entity->id, 'direction'=>'up'], 'method' => 'put']) !!}
<button type="submit" class="btn btn-sm" title="Поднять">
    <i class="glyphicon glyphicon-arrow-up"></i>
</button>
{!! Form::close() !!}

@if(isset($entity->priority))
<span class="btn btn-sm">{!!$entity->priority !!}</span>
@endif

{!! Form::open(['route' => [$routePrefix.'priority', 'id'=>$entity->id, 'direction'=>'down'], 'method' => 'put']) !!}
<button type="submit" class="btn btn-sm" title="Опустить">
    <i class="glyphicon glyphicon-arrow-down"></i>
</button>
{!! Form::close() !!}
