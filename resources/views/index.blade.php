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
