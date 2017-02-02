@extends('admin::admin.form')

@section('form_js')
    @include('admin::common.forms.datepicker', ['fields'=>[['id'=>'date', 'date'=>\Carbon\Carbon::now()->toDateString()]]])
    @include('admin::common.forms.ckeditor', ['fields'=>[['id'=>'content'], ['id'=>'preview']]])
@endsection

@section('title')
    <h2><a href="{!! URL::route($routePrefix.'index') !!}">Персонажи</a></h2>
@endsection

@section('form_content')

    {!! BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update', 'autocomplete' => 'off',
    'files' => true]) !!}

    <div class="col-md-5">
        {!! BootForm::text('name', 'Имя') !!}
    </div>

    <div class="col-md-11">
        {!! BootForm::textarea('content', 'Полный текст', null) !!}
        <div class="clearfix"></div>
    </div>

    <div class="col-md-5">
        {!! BootForm::hidden('published', 0) !!}
        {!! BootForm::checkbox('published', 'Опубликовать', 1) !!}
    </div>

@endsection
