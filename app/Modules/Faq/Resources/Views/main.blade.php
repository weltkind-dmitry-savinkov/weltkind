<div class="faq-list">
    <h2 class="faq-list__title">
        <a href="/faq">FAQ:</a>
    </h2>
    <ul class="faq-list__list">
        @foreach ($entities as $entity)
        <li class="faq-list__item">
            <span class="faq-list__link">{!! $entity->title !!}</span>
            <div class="faq-list__popup">
                <div class="faq-answer">
                    <div class="faq-answer__close">
                    </div>
                    <div class="faq-answer__text">
                        {!! $entity->preview !!}
                    </div>
                    <a class="faq-answer__link" href="/faq">Далее...</a>
                </div>
            </div>
        </li>
        @endforeach
        <li class="faq-list__item">
            <a href="/faq">И т.д.</a>
        </li>
    </ul>
</div>
