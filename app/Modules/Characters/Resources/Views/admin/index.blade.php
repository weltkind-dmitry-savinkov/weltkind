@extends('admin::admin.index')

@section('th')
    <th>@sortablelink('name', ' Имя')</th>
    <th>@sortablelink('content', ' Сообщение')</th>
    <th>@sortablelink('image', ' Изображение')</th>
    <th>Управление</th>
@endsection

@section('td')
    @foreach ($entities as $entity)
        <tr @if (!$entity->published) class="unpublished" @endif>
            <td>{{ $entity->name }}</td>
            <td>{{ $entity->content }}</td>
            <td><img height="150" src="/uploads/characters/{{ $entity->image }}" alt="{{ $entity->title }}"></td>
            <td class="controls">@include ('admin::common.controls.all', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])</td>
        </tr>
    @endforeach
@endsection
