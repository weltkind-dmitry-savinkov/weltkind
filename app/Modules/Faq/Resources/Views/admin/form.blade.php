@extends('admin::admin.form')


@section('form_content')


    {!! BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update', 'autocomplete' => 'off',
    'files' => true]) !!}


    <div class="col-md-5">
        {!! BootForm::text('title', 'Вопрос') !!}
    </div>

    <div class="col-md-5 col-md-offset-1">
        {!! BootForm::text('date', 'Дата', \Carbon\Carbon::now()->toDateString()) !!}
    </div>


    <div class="col-md-11">
        {!! BootForm::textarea('preview', 'Краткий ответ', null, ['style'=>'height:100px']) !!}
    </div>


    <div class="col-md-11">
        {!! BootForm::textarea('content', 'Ответ', null) !!}
        <div class="clearfix"></div>
    </div>

    <div class="col-md-5">
        {!! BootForm::hidden('published', 0) !!}
        {!! BootForm::checkbox('published', 'Опубликовать', 1) !!}
    </div>

    <div class="col-md-5 col-md-offset-1">
        {!! BootForm::hidden('on_main', 0) !!}
        {!! BootForm::checkbox('on_main', 'Вывести на главной', 1) !!}

    </div>

@endsection