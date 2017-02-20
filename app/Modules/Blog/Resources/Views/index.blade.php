@extends('layouts.blog')

@section('content')
    @if (count($entities))
        <ul class="list-blogs">
            @foreach($entities as $entity )
            <li class="list-blogs__item">
                <article>
                    <header class="list-blogs__header">
                        <h2 class="list-blogs__title">
                            <a href="{{route('blog.show', $entity)}}">{{$entity->title}}</a>
                        </h2>
                        <div class="list-blogs__info">
                            <div class="info-small">
                                <time class="info-small__time" datetime="{{Date::_('Y-m-d', $entity->date)}}">{{Date::_('d.m.Y', $entity->date)}}</time>
                                <span class="info-small__separator"> &mdash; </span>
                                <a class="info-small__author" href="#">{{$entity->user->name}}</a>
                            </div>
                        </div>
                    </header>
                    <div class="list-blogs__content">{!! $entity->preview !!}</div>
                </article>
            </li>
            @endforeach
        </ul>
        {{ $entities->appends(\Request::except('page'))->links('common.paginate') }}
    @else
        <p>Нет записей</p>
    @endif
@endsection