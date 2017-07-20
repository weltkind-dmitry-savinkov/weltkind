@if(Auth::guard('admin')->user()->canPublish())
    {!! Form::open(['route' => [$routePrefix.'update', 'id'=>$id], 'method' => 'put']) !!}

    {!! BootForm::hidden('published', abs($entity->published -1)) !!}

    <button type="submit" class="btn btn-default btn-sm"
            title="@if($entity->published) Снять с публикации @else Опубликовать @endif">
        <i class="glyphicon @if($entity->published)glyphicon-ban-circle  @else glyphicon-ok-circle @endif"></i>
    </button>
    {!! Form::close() !!}
@endif