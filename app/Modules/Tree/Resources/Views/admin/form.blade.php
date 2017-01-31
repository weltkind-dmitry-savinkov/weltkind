@extends('admin::admin.form')


@section('topmenu')
    <div class="header-module-controls">
        @include('admin::common.topmenu.list', ['routePrefix'=>$routePrefix])

            <a class="btn btn-primary" href="{!! route($routePrefix.'create', ['parent'=>@$entity->parent?:Request::get('parent')]) !!}">
                <i class="glyphicon glyphicon-plus"></i> Добавить
            </a>

    </div>
@endsection



@section('form_content')


{!! BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update',]) !!}

<div class="col-md-5">
    {!! BootForm::text('title', 'Название страницы') !!}
</div>

<div class="col-md-5 col-md-offset-1">
    @if (Request::get('parent') || $entity->parent_id)
    {!! BootForm::text('slug', 'Адресное имя') !!}
    @endif
</div>


<div class="col-md-11">
    {!! BootForm::textarea('content', 'Содержание', null) !!}
    <div class="clearfix"></div>
</div>

<div class="col-md-5">
    {!! BootForm::hidden('published', 0) !!}
    {!! BootForm::checkbox('published', 'Опубликовать', 1) !!}
</div>

<div class="col-md-5 col-md-offset-1">
    {!! BootForm::hidden('in_menu', 0) !!}
    {!! BootForm::checkbox('in_menu', 'Вывести в главном меню', 1) !!}

</div>


<div class="col-md-5">
    {!! BootForm::select('module', 'Модуль', module_config('settings.modules')) !!}
</div>

<div class="col-md-5 col-md-offset-1">
    {!! BootForm::select('template', 'Шаблон', module_config('settings.templates')) !!}

</div>

<div class="col-md-5">
    @if (Request::get('parent') || $entity->parent_id)
    {!! BootForm::select('parent_id', 'Родительский узел', Tree::getSelect(), Request::get('parent')) !!}
    @endif
</div>

@include('admin::common.forms.seo')

@endsection