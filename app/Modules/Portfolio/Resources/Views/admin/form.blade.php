@extends('admin::admin.form')

@section('form_content')


    {!! BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update', 'autocomplete' => 'off',
    'files' => true]) !!}


    <div class="col-md-5">
        {!! BootForm::text('title', 'Название работы') !!}
    </div>

    <div class="col-md-5 col-md-offset-1">
        {!! BootForm::text('date', 'Дата', \Carbon\Carbon::now()->toDateString()) !!}
    </div>

    <div class="col-md-5">

        {!! BootForm::text('url', 'URL') !!}

        {!! BootForm::text('priority', 'Приоритет') !!}


        {!! BootForm::hidden('published', 0) !!}
        {!! BootForm::checkbox('published', 'Опубликовать', 1) !!}

        {!! BootForm::hidden('on_main', 0) !!}
        {!! BootForm::checkbox('on_main', 'Вывести на главной', 1) !!}


        {!! BootForm::select('categories[]', 'Категории', \App\Modules\Portfolio\Models\Category::getSelect(),  $entity->categories->pluck('id')->all(), ['id' => 'categories', 'multiple' => 'multiple'] ) !!}


    </div>

    <div class="col-md-5 col-md-offset-1">

        @include('admin::common.forms.image', ['entity'=>$entity, 'routePrefix'=>$routePrefix, 'field'=>'main_image'])
    </div>




    <div class="col-md-12">
        {!! BootForm::textarea('content', 'Полный текст', null) !!}
        <div class="clearfix"></div>
    </div>


    <div class="col-md-12">
        @include('admin::images.form', ['id'=>$entity->id, 'routePrefix'=>$routePrefix.'images.'])
    </div>


@endsection