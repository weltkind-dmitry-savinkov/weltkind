@extends('admin::layouts.app')

@section('form_js')
    @if ($entity->type == 'wysiwyg')
    @include('admin::common.forms.ckeditor', ['fields'=>[['id'=>'content']]])
    @endif
@endsection

@section('content')
    <div class="panel-body">
        @include('admin::common.errors')

        {!! BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update', 'autocomplete' => 'off',
        'files' => true]) !!}


        <div class="col-md-5">
            {!! BootForm::text('title', 'Название') !!}
        </div>

        <div class="col-md-5 col-md-offset-1">
            {!! BootForm::text('slug', 'Адресное имя') !!}
        </div>



        <div class="col-md-5">
            {!! BootForm::hidden('published', 0) !!}
            {!! BootForm::checkbox('published', 'Опубликовать', 1) !!}
        </div>

        <div class="col-md-5 col-md-offset-1">
            {!! BootForm::select('type', 'Тип', ['html'=>'Текстовый', 'wysiwyg'=>'Визуальный редактор']) !!}
        </div>

        <div class="col-md-11">
            {!! BootForm::textarea('content', 'Содержание', null) !!}
        </div>

        <div class="col-md-12">
            {!! BootForm::submit('Сохранить') !!}
        </div>
        {!! BootForm::close() !!}
    </div>
@endsection
