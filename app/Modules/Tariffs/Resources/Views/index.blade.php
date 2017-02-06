@extends('layouts.inner')

@section('content')
    @if (count ($entities))
        @foreach ($entities as $entity)
            <p>werwer</p>
        @endforeach
    @endif
@endsection
