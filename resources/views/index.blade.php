@extends('layouts.app')

@section('page_content')
<div class="layout layout_line">
    <div class="layout__wrapper">
        <section class="block-note">
            <h2 class="block-note__title">{!! widget('advertisement') !!}</h2>
        </section>
    </div>
</div>
<div class="layout">
    <div class="layout__wrapper">
        @include('portfolio::main')
    </div>
</div>
<div class="layout">
    <div class="layout__wrapper">
        <div class="block-home">
            <div class="row">
                <div class="col_md_6">
                    <div class="block-home__clients">
                        @include('clients::main')
                    </div>
                </div>
                <div class="col_md_6 col_r">
                    <div class="block-home__info">
                        <section class="info-small-titles">
                            <main role="main">
                                {!! $page->content !!}
                            </main>
                        </section>
                    </div>
                </div>
                <div class="col_md_6 col_r">
                    <div class="block-home__faq">
                        <section class="faq-layout">
                            <div class="faq-layout__left">
                                <div class="faq-list">
                                    <h2 class="faq-list__title">
                                        <a href="/faq">FAQ:</a>
                                    </h2>
                                    <ul class="faq-list__list">
                                        <li class="faq-list__item">
                                            <span class="faq-list__link">Сколько сто́ит сайт?</span>
                                            <div class="faq-list__popup">
                                                <div class="faq-answer">
                                                    <div class="faq-answer__close">
                                                    </div>
                                                    <div class="faq-answer__text">Стоимость сайта определяется, прежде всего, трудоемкостью его разработки и напрямую связана с количеством времени, которое мы затратим на его изготовление.
                                                    </div>
                                                    <a class="faq-answer__link" href="/faq">Далее...</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="faq-list__item">
                                            <span class="faq-list__link">Почему так дорого?</span>
                                            <div class="faq-list__popup">
                                                <div class="faq-answer">
                                                    <div class="faq-answer__close">
                                                    </div>
                                                    <div class="faq-answer__text">Если наши расценки показались Вам слишком дорогими, можем Вас успокоить – наши цены являются самыми низкими в КР на услуги подобного качества. Мы постоянно мониторим рынок веб-разработок
                                                        и при необходимости делаем соответствующие корректировки, чтобы наши цены оставались конкурентоспособными по сравнению с другими компания такого же уровня качества.
                                                    </div>
                                                    <a class="faq-answer__link" href="/faq">Далее...</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="faq-list__item">
                                            <span class="faq-list__link">Какие сроки?</span>
                                            <div class="faq-list__popup">
                                                <div class="faq-answer">
                                                    <div class="faq-answer__close">
                                                    </div>
                                                    <div class="faq-answer__text">Сроки разработки также напрямую зависят от специфики разрабатываемого проекта. Разработка сайта в минимальной комплектации, как правило, составляет не менее 3-х недель. Сюда входит
                                                        разработка схемы юзабилити, дизайна, верстка и интеграция с CMS.
                                                    </div>
                                                    <a class="faq-answer__link" href="/faq">Далее...</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="faq-list__item">
                                            <span class="faq-list__link">Что такое CMS?</span>
                                            <div class="faq-list__popup">
                                                <div class="faq-answer">
                                                    <div class="faq-answer__close">
                                                    </div>
                                                    <div class="faq-answer__text">CMS (англ. Content management system) - Система управления содержимым сайта.
                                                    </div>
                                                    <a class="faq-answer__link" href="/faq">Далее...</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="faq-list__item">
                                            <span class="faq-list__link">На каких CMS Вы работаете?</span>
                                            <div class="faq-list__popup">
                                                <div class="faq-answer">
                                                    <div class="faq-answer__close">
                                                    </div>
                                                    <div class="faq-answer__text">Все наши проекты «под ключ», мы разрабатываем исключительно на собственных CMS, чтобы иметь возможность гарантировать качество и отказоустойчивость каждого компонента системы.
                                                    </div>
                                                    <a class="faq-answer__link" href="/faq">Далее...</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="faq-list__item">
                                            <span class="faq-list__link">Какая гарантия на Ваши продукты?</span>
                                            <div class="faq-list__popup">
                                                <div class="faq-answer">
                                                    <div class="faq-answer__close">
                                                    </div>
                                                    <div class="faq-answer__text">На все наши продукты, выполненные «под ключ» дается пожизненная гарантия. Ознакомьтесь, пожалуйста, с условиями гарантии.
                                                    </div>
                                                    <a class="faq-answer__link" href="/faq">Далее...</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="faq-list__item">
                                            <a href="/faq">И т.д.</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="faq-layout__right">
                                <div class="faq-layout__cloud">
                                    <div class="faq-layout__text">
                                        {!! widget('faq-default') !!}
                                    </div>
                                    <div class="faq-layout__button">
                                        <a class="button button_dark button_block call-feedback" href="#">Заказать сайт</a>
                                    </div>
                                </div>
                                <div class="faq-layout__cartoon">
                                    <img class="random-cartoon" src="#" alt=" ">
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Arcticmodal block-->
<div class="div" style="display: none;">
    @include('common.modal-feedback')
</div>
@endsection
