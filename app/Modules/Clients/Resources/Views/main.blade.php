@if (count($items))
<section class="list-clients">
    <div class="list-clients__top">
        <div class="title-small">
            <h2 class="title-small__title">
                <a href="{!! URL::route('reviews') !!}">Клиенты:</a>
            </h2>
        </div>
    </div>
    <ul class="list-clients__list list-clients__list_prepared">
        @foreach($items as $num=>$item)
            @include('clients::_item', ['item'=>$item])
        @endforeach
    </ul>
    <div class="list-clients__bottom">
        <a class="list-clients__more link-dashed" href="{!! URL::route('reviews') !!}">Показать ещё</a>
    </div>
</section>
@endif
