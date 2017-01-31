@extends('admin::layouts.app')

@section('content')
<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('admin::common.errors')

    {!! BootForm::open(['model' => $entity, 'store' => $routePrefix.'store', 'update' => $routePrefix.'update', 'autocomplete' => 'off']) !!}

    <!-- The text and password here are to prevent FF from auto filling my login credentials because it ignores autocomplete="off"-->
    <input type="text" style="display:none">
    <input type="password" style="display:none">


    <div class="col-md-5">
        {!! BootForm::text('name', 'Имя') !!}
    </div>

    <div class="col-md-5 col-md-offset-1">
        {!! BootForm::email('email', 'Электронная почта') !!}
    </div>

    <div class="col-md-5">
        {!! BootForm::password('password', 'Пароль') !!}
        @if ($entity->id)
        <span class="help-block">Оставьте поле пустым, если не хотите менять пароль</span>
        @endif
    </div>


    <div class="col-md-12">
        {!! BootForm::submit('Сохранить') !!}
    </div>

    {!! BootForm::close() !!}




</div>
@endsection