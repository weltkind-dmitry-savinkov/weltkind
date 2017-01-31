@extends('admin::admin.index')

@section('topmenu')
    <div class="header-module-controls">
        @include('admin::common.topmenu.list', ['routePrefix'=>$routePrefix])
    </div>
@endsection

@section('filters')
    {!! BootForm::open([ 'route' => 'admin.settings.store', 'method' => 'post']) !!}
    <div class="box box-primary">
        <div class="box-header"></div>
        <div class="box-body">
            <div class="col-md-3">
                {!! BootForm::text('settings[lat]', 'Широта',  Settings::get('lat')) !!}
            </div>

            <div class="col-md-3">
                {!! BootForm::text('settings[lng]', 'Долгота',  Settings::get('lng')) !!}
            </div>

            <div class="col-md-3">
                {!! BootForm::text('settings[zoom]', 'Приближение',  Settings::get('zoom')) !!}
            </div>

            <div class="col-md-2">
                {!! BootForm::submit('Сохранить') !!}
            </div>

        </div>
    </div>
    {!! BootForm::close() !!}
@endsection


@section('th')
    <th>@sortablelink('date', ' Дата')</th>
    <th>@sortablelink('email', 'Email')</th>
    <th>@sortablelink('name', ' Имя')</th>
    <th>Управление</th>
@endsection

@section('td')
    @foreach ($entities as $entity)
        <tr>
            <td>{{ $entity->date }}</td>
            <td>{{ $entity->email }}</td>
            <td>{{ $entity->name }}</td>
            <td class="controls">
                @include('admin::common.controls.edit', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])
                @include('admin::common.controls.destroy', ['routePrefix'=>$routePrefix, 'id'=>$entity->id])
            </td>
        </tr>
    @endforeach
@endsection