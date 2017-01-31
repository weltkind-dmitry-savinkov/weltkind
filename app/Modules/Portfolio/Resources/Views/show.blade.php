@extends('layouts.inner')

@section('content')
<section class="work-full">
    <div class="row">
        <div class="col_md_6">
            <div class="work-full__left">
                @foreach($entity->images()->order()->get() as $image)
                <a class="work-full__preview" href="{{$image->image_thumb}}">
                    <img src="{{$image->image_thumb}}" alt="img">
                </a>
                @endforeach
            </div>
        </div>
        <div class="col_md_6">
            <div class="work-full__right">
                <div class="work-full__nav">
                    <div class="tabs-inline">
                        <div class="tabs-inline__item">
                            <a class="tabs-inline__link" href="{!! route($page->slug) !!}">Все работы</a>
                        </div>
                        <div class="tabs-inline__item">
                            @if ($next)
                                <a class="tabs-inline__link" href="{!! route($routePrefix.'show', ['id'=>$next]) !!}">Следующая работа »</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="work-full__info">
                    {!! $entity->content !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
