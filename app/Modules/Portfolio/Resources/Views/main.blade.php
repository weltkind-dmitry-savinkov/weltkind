@if (count($items))
<section class="list-works list-works_compact">
    <div class="list-works__arrows">
        <a href="#">
            <div class="list-works__arrow list-works__arrow_left"></div>
        </a>
        <a href="#">
            <div class="list-works__arrow list-works__arrow_right"></div>
        </a>
    </div>
    <div class="list-works__top">
        <div class="title-small">
            <h2 class="title-small__title">
                <a href="{!! URL::route('portfolio') !!}">@lang('portfolio::index.works')</a>
            </h2>
            <a class="title-small__link" href="{!! URL::route('portfolio') !!}">@lang('portfolio::index.works.all')</a>
        </div>
    </div>
    <ul class="list-works__list">
        @foreach($items as $item)
            @include('portfolio::_item', ['item'=>$item])
        @endforeach
    </ul>
</section>
@endif
