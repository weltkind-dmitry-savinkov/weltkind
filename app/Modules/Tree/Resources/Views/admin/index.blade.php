@extends('admin::admin.index')

@section('topmenu')
    <div class="header-module-controls">
        @include('admin::common.topmenu.list', ['routePrefix'=>$routePrefix])
        @if ($entities)
        <a class="btn btn-primary" href="{!! route($routePrefix.'create', ['parent'=>$entities[0]->id]) !!}">
            <i class="glyphicon glyphicon-plus"></i> Добавить
        </a>
        @endif
    </div>
@endsection


@section('content')
    @include('admin::common.errors')
    @if (count($entities) > 0)
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Название</th>
                <th>Адр. имя</th>
                <th>Приоритет</th>
                <th>Управление</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($entities as $entity)
                <tr @if (!$entity->published) class="unpublished" @endif>

                    <td> {!! str_repeat('<span class="fa padding"></span> ', $entity->depth) !!} <span
                                class="fa @if ($entity->isRoot())fa-cog @elseif(!$entity->isLeaf()) fa-folder @else fa-sticky-note-o @endif"></span> {{ $entity->title }}
                    </td>
                    <td>{{ $entity->slug }}</td>
                    <td class="priority">
                        @if (!$entity->isRoot())
                            @include ('admin::common.controls.priority', ['routePrefix'=>$routePrefix, 'entity'=>$entity])</td>
                    @endif
                    <td class="controls">
                        <a class="btn btn-default btn-sm"
                           href="{!! route($routePrefix.'create', ['parent' => $entity->id]) !!}">
                            <i class="glyphicon glyphicon-plus"></i>
                        </a>

                        @include('admin::common.controls.publish', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])

                        @include('admin::common.controls.edit', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])

                        @if (!$entity->isRoot())
                            @include('admin::common.controls.destroy', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])
                        @endif

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $entities->appends(\Request::except('page'))->render() !!}
    @else
        <a href="{!! route($routePrefix.'create') !!}" class="btn btn-primary icon-plus icon-white ">
            <span>Создать корневой узел</span>
        </a>
        </p>
    @endif
@endsection
