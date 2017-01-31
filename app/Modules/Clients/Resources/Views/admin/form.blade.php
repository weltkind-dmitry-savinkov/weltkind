@extends('admin::admin.form')

@section('form_js')
    @include('admin::common.forms.datepicker', ['fields'=>[['id'=>'add_date']]])
@endsection


@section('form_content')


    {!! BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update', 'autocomplete' => 'off',
    'files' => true]) !!}


    <div class="col-md-5">
        {!! BootForm::text('title', 'Название') !!}
    </div>


    <div class="col-md-5 col-md-offset-1">
        {!! BootForm::text('add_date', 'Дата', $entity->add_date?null:\Carbon\Carbon::now()->toDateString()) !!}
    </div>

<div class="clearfix"></div>

    <div class="col-md-5">
        {!! BootForm::text('URL', 'URL') !!}
        {!! BootForm::hidden('published', 0) !!}
        {!! BootForm::checkbox('published', 'Опубликовать', 1) !!}
        {!! BootForm::text('priority', 'Приоритет') !!}
    </div>

    <div class="col-md-5 col-md-offset-1">
        @include('admin::common.forms.image', ['entity'=>$entity, 'routePrefix'=>$routePrefix, 'field'=>'image'])
    </div>



@endsection