@extends('admin::admin.index')

@section('th')
    <th>@sortablelink('slug', ' Адресное имя')</th>
    <th>@sortablelink('title', ' Название')</th>
    <th>Управление</th>
@endsection

@section('td')
    @foreach ($entities as $entity)
        <tr @if (!$entity->published) class="unpublished" @endif>
            <td>{{ $entity->slug }}</td>
            <td>{{ $entity->title }}</td>
            <td class="controls">@include ('admin::common.controls.all', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])</td>
        </tr>
    @endforeach
@endsection