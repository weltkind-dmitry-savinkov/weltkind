@extends('admin::admin.index')

@section('th')
<th>@sortablelink('created_at', 'Дата добавления')</th>
<th>@sortablelink('name', ' Имя')</th>
<th>@sortablelink('email', ' Email')</th>
<th>Управление</th>
@endsection

@section('td')
@foreach ($entities as $entity)
<tr>
    <td>{{ $entity->created_at }}</td>
    <td>{{ $entity->name }}</td>
    <td>{{ $entity->email }}</td>
    <td>

        @include('admin::common.controls.edit', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])

        @if (Auth::user()->id != $entity->id)
            @include('admin::common.controls.destroy', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])
        @endif
    </td>
</tr>
@endforeach
@endsection