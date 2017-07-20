@if(Auth::guard('admin')->user()->canCreate())
    <a class="btn btn-primary" href="{!! route($routePrefix.'create') !!}">
        <i class="glyphicon glyphicon-plus"></i> Добавить
    </a>
@endif