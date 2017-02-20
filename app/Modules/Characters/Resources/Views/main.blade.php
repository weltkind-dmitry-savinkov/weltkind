@if (count ($entity))
<div class="faq-layout__cloud">
    <div class="faq-layout__text">
        {!! $entity->content !!}
    </div>
    <div class="faq-layout__button">
        <a class="button button_dark button_block call-feedback" href="{{ route('feedback.modal') }}">Заказать сайт</a>
        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
    </div>
</div>
<div class="faq-layout__cartoon">
    <img src="/uploads/characters/{{ $entity->image }}" alt="{{ $entity->name }}" title="{{ $entity->name }}">
</div>
@endif