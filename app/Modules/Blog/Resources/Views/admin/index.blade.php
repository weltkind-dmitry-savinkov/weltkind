@extends('admin::admin.index')

@section('th')
    <th>@sortablelink('date', ' Дата')</th>
    <th>@sortablelink('title', ' Название')</th>
    <th>@sortablelink('preview', ' Превью')</th>
    <th>Автор</th>
    <th>Управление</th>
@endsection

@section('td')
    @foreach ($entities as $entity)
        <tr @if (!$entity->published) class="unpublished" @endif>
            <td>{{ $entity->date }}</td>
            <td>{{ $entity->title }}</td>
            <td>{!!  $entity->preview !!}</td>
            <td>{{ $entity->user->name }} </td>
            <td class="controls">@include ('admin::common.controls.all', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])</td>
        </tr>
    @endforeach
@endsection