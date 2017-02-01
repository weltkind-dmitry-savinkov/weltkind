@extends('layouts.inner')

@section('content')
    @foreach ($entities as $entity)
        <article>
            <h2>{!! $entity->title !!}</h2>
            <p>{!! $entity->content !!}</p>
        </article>
    @endforeach
@endsection



