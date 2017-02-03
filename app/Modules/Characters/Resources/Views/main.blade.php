@if (count ($entity))
<div class="faq-layout__cloud">
    <div class="faq-layout__text">
        {!! $entity->content !!}
    </div>
    <div class="faq-layout__button">
        <a class="button button_dark button_block call-feedback" href="#">Заказать сайт</a>
    </div>
</div>
<div class="faq-layout__cartoon">
    <img src="/uploads/characters/{{ $entity->image }}" alt="{{ $entity->name }}" title="{{ $entity->name }}">
</div>
@endif