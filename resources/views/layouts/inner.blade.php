@extends('layouts.app')
@section('page_content')
    <div class="layout">
        <div class="layout__wrapper">
        @include('tree::breadcrumbs')

        @hasSection('h1')
            <h1 class="page-title">@yield('h1')</h1>
        @elseif(isset($meta->h1) && $meta->h1)
            <h1 class="page-title">{{$meta->h1}}</h1>
        @endif

        @yield('content')

        </div>
    </div>

    <!-- Arcticmodal block-->
    <div class="div" style="display: none;">
        @include('common.modal-feedback')
    </div>
@endsection
