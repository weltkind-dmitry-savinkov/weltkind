@extends('layouts.inner')

@section('content')
    @foreach ($entities as $entity)
        <article>
            <h2 id="faq_{!! $entity->id !!}">{!! $entity->title !!}</h2>
            <p>{!! $entity->content !!}</p>
        </article>
    @endforeach
@endsection



