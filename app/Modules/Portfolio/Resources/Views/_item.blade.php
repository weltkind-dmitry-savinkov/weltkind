<li class="list-works__item">
    <figure class="list-works__inner">
        <a class="list-works__link" href="{!! URL::route('portfolio.show', $item->id) !!}" title="{{$item->title}}"></a>
        <div class="list-works__image">
            <img class="fit" src="{{$item->imagePath('thumb')}}" alt="{{$item->title}}">
        </div>
        <figcaption class="list-works__bottom">
            <a class="list-works__name" href="{!! URL::route('portfolio.show', $item->id) !!}">{{$item->title}}</a>
        </figcaption>
    </figure>
</li>
