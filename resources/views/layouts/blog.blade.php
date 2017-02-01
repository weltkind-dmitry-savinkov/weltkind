@extends('layouts.app')
@section('page_content')
    <div class="layout">
        <div class="layout__wrapper">
            @yield('content')
        </div>
    </div>

    <!-- Arcticmodal block-->
    <div class="div" style="display: none;">
        @include('common.modal-feedback')
    </div>
@endsection
