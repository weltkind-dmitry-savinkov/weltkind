@extends('layouts.inner')

@section('content')
    @foreach ($entities as $entity)
        <article itemscope itemtype="https://schema.org/Article">
            <h2 itemprop="name" id="answer_{!! $entity->id !!}">{!! $entity->title !!}</h2>
            <p itemprop="description">{!! $entity->content !!}</p>
        </article>
    @endforeach
@endsection



