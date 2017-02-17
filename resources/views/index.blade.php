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
                                @include('faq::main')
                            </div>
                            <div class="faq-layout__right">
                                @include('characters::main')
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="layout">
    <div class="layout__wrapper">
        <div class="block-home">
            <div class="row">
                <div class="col_md_6 hidded_md">
                    <div class="block-home__blogs">
                        <section class="blog-widget">
                            <div class="blog-widget__top">
                                <div class="title-small">
                                    <h2 class="title-small__title">
                                        <A href="#">Новое в блоге:</A>
                                    </h2>
                                    <a class="title-small__link" href="#">список блогов</a>
                                </div>
                            </div>
                            <ul class="blog-widget__list">
                                <li class="blog-widget__item">
                                    <div class="blog-widget__info">
                                        <div class="info-small">
                                            <time class="info-small__time" datetime="2017-02-24">24.02.2017</time>
                                            <span class="info-small__separator">—</span>
                                            <a class="info-small__author" href="#">Анатолий Лелёвкин</a>
                                        </div>
                                    </div>
                                    <a class="blog-widget__title" href="#">Создание эксклюзивных сайтов. Как защититься от плагиата? – Часть 2</a>
                                </li>
                                <li class="blog-widget__item">
                                    <div class="blog-widget__info">
                                        <div class="info-small">
                                            <time class="info-small__time" datetime="2017-02-24">24.02.2017</time>
                                            <span class="info-small__separator">—</span>
                                            <a class="info-small__author" href="#">Анатолий Лелёвкин</a>
                                        </div>
                                    </div>
                                    <a class="blog-widget__title" href="#">Создание эксклюзивных сайтов. Как защититься от плагиата? – Часть 2</a>
                                </li>
                            </ul>
                        </section>
                    </div>
                </div>
                <div class="col_md_6">
                    <div class="block-home__more">
                        <div class="info-meduim">
                            <div class="info-meduim__top">
                                <div class="title-small">
                                    <h2 class="title-small__title">
                                        <A href="#">Секретный элемент:</A>
                                    </h2>
                                    <a class="title-small__link" href="#">Ссылка, если нужна</a>
                                </div>
                            </div>
                            <div class="info-meduim__main">
                                <div class="info-meduim__left">
                                    <div class="info-meduim__image">
                                        <img class="fit" src="#" alt="img">
                                    </div>
                                </div>
                                <div class="info-meduim__right">
                                    <h3 class="info-meduim__title">Заголовок блока
                                    </h3>
                                    <div class="info-meduim__info">Маленькое инфо
                                    </div>
                                    <div class="info-meduim__content">Таким образом рамки и место обучения кадров требуют определения и уточнения системы обучения кадров, соответствует насущным потребностям.
                                    </div>
                                </div>
                            </div>
                        </div>
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
