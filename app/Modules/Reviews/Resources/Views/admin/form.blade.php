@extends('admin::admin.form')

@section('form_content')


    {!! BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update', 'autocomplete' => 'off',
    'files' => true]) !!}


    <div class="col-md-5">
        {!! BootForm::text('title', 'Заголовок') !!}
    </div>

    <div class="col-md-5 col-md-offset-1">
        {!! BootForm::text('date', 'Дата', \Carbon\Carbon::now()->toDateString()) !!}
    </div>

    <div class="col-md-5">
        {!! BootForm::hidden('published', 0) !!}
        {!! BootForm::checkbox('published', 'Опубликовать', 1) !!}
    </div>
    <div class="clearfix"></div>

    @include('admin::common.forms.image', ['entity'=>$entity, 'routePrefix'=>$routePrefix, 'field'=>'image'])

@endsection