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
                            <main>
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
                        @include('blog::main')
                    </div>
                </div>
                <div class="col_md_6">
                    <div class="block-home__more">
                        <!-- Это новый пустой блок -->
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

@endsection
