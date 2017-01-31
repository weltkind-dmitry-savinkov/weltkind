@extends('admin::admin.form')

@section('title')
    <h2>Портфолио</h2> / <a href="{!! URL::route($routePrefix.'index') !!}">Категории</a>
@endsection


@section('form_content')


    {!! BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update', 'autocomplete' => 'off',
    'files' => true]) !!}


    <div class="col-md-5">
        {!! BootForm::text('title', 'Название категории') !!}
    </div>

    <div class="col-md-5 col-md-offset-1">
        {!! BootForm::hidden('only_in_list', 0) !!}
        {!! BootForm::checkbox('only_in_list', 'Выводить работы только внутри категории', 1) !!}
    </div>

    <div class="clearfix"></div>

    <div class="col-md-5">
        {!! BootForm::text('priority', 'Приоритет') !!}
    </div>

    <div class="col-md-5 col-md-offset-1">
        {!! BootForm::hidden('published', 0) !!}
        {!! BootForm::checkbox('published', 'Опубликовать', 1) !!}
    </div>


@endsection