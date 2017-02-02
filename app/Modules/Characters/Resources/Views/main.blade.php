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
    <img class="random-cartoon" src="#" alt=" ">
</div>
@endif