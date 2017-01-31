@extends('admin::layouts.app')

@section('topmenu')
    <div class="header-module-controls">
        @include('admin::common.topmenu.list', ['routePrefix'=>$routePrefix])
    </div>
@endsection

@section('title')
    <h2><a href="{!! URL::route($routePrefix.'index') !!}">{{$title}}</a></h2>
@endsection

@section('content')
    <div class="panel-body">

        <div class="col-md-5">
            <label>Дата</label>
            <p>{{$entity->date}}</p>
        </div>

        <div class="col-md-5 col-md-offset-1">
            <label>IP</label>
            <p>{{long2ip($entity->ip)}}</p>
        </div>

        <div class="col-md-5">
          <label>Имя</label>
            <p>{{$entity->name}}</p>
        </div>

        <div class="col-md-5 col-md-offset-1">
            <label>Имя</label>
            <p>{{$entity->email}}</p>
        </div>

        <div class="col-md-11">
            <label>Сообщение</label>
            <p>{!! nl2br($entity->message) !!}</p>
        </div>

    </div>
@endsection