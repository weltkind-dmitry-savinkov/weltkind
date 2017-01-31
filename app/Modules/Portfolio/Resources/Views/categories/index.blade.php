@extends('admin::admin.index')
@section('title')
    <h2>Портфолио</h2> / Категории
@endsection


@section('th')
    <th>@sortablelink('title', ' Название')</th>
    <th>@sortablelink('priority', ' Приоритет')</th>
    <th>Управление</th>
@endsection

@section('td')
    @foreach ($entities as $entity)
        <tr @if (!$entity->published) class="unpublished" @endif>
            <td>{{ $entity->title }}</td>
            <td class="priority">@include ('admin::common.controls.priority', ['routePrefix'=>$routePrefix, 'entity'=>$entity])</td>
            <td class="controls">@include ('admin::common.controls.all', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])</td>
        </tr>
    @endforeach
@endsection