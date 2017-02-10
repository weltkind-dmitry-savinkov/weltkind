@extends('layouts.inner')
@section('h1')
Рекомeндации
@endsection

@section('content')
@if (count($entities))
    <ul class="list-rewards">
        @foreach($entities as $entity)
            <li class="list-rewards__item">
                <div class="card-reward" itemscope itemtype="https://schema.org/Thing">
                    <a itemprop="url" class="card-reward__link" href="/uploads/reviews/full/{{$entity->image}}"></a>
                    <div class="card-reward__image">
                        <img itemprop="image" src="/uploads/reviews/full/{{$entity->image}}" alt="{{$entity->title}}">
                    </div>
                    <div class="card-reward__text" itemprop="description">{{$entity->title}}</div>
                </div>
            </li>
        @endforeach
    </ul>
@else
    <p>Нет записей</p>
@endif
@endsection
