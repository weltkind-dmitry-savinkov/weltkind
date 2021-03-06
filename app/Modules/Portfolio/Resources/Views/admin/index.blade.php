@extends('admin::admin.index')

@section('th')
    <th>@sortablelink('date', ' Дата')</th>
    <th>@sortablelink('title', ' Название')</th>
    <th>Изображение</th>
    <th>@sortablelink('priority', ' Приоритет')</th>
    <th>Управление</th>
@endsection

@section('td')
    @foreach ($entities as $entity)
        <tr @if (!$entity->published) class="unpublished" @endif>
            <td>{{ $entity->date }}</td>
            <td>{{ $entity->title }}</td>
            <td><img width="200" src="/uploads/portfolio/main/{{ $entity->image }}" alt="{{ $entity->title }}" /></td>
            <td class="priority">@include ('admin::common.controls.priority', ['routePrefix'=>$routePrefix, 'entity'=>$entity])</td>
            <td class="controls">@include ('admin::common.controls.all', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])</td>
        </tr>
    @endforeach
@endsection