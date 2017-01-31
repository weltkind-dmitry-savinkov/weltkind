@extends('layouts.inner')

@section('content')

@if (count($categories))
<ul class="tabs-inline">

    @if(!Request::get('category'))
    <li class="tabs-inline__item">Все работы</li>
    @else
    <li class="tabs-inline__item">
        <a class="tabs-inline__link" href="{!! route($page->slug) !!}">Все работы</a>
    </li>
    @endif

    @foreach($categories as $category)
    @if(Request::get('category')==$category->id)
    <li class="tabs-inline__item">{{$category->title}}</li>
    @else
    <li class="tabs-inline__item">
        <a class="tabs-inline__link" href="{!! route($page->slug, ['category'=>$category->id] ) !!}">{{$category->title}}</a>
    </li>
    @endif
    @endforeach
</ul>
@endif

@if (count($entities))
<section class="list-works">
    <ul class="list-works__list">
        @foreach($entities as $entity)
        <li class="list-works__item">
            <figure class="list-works__inner">
                <a class="list-works__link" href="{!! URL::route('portfolio.show', $entity->id) !!}"></a>
                <div class="list-works__image">
                    <img class="fit" src="{{$entity->image_thumb}}" alt="{{$entity->title}}">
                </div>
                <figcaption class="list-works__bottom">
                    <a class="list-works__name" href="{!! URL::route('portfolio.show', $entity->id) !!}">{{$entity->title}}</a>
                </figcaption>
            </figure>
        </li>
        @endforeach
    </ul>
</section>
@endif

{{  $entities->appends(\Request::except('page'))->links('common.paginate') }}
@endsection


