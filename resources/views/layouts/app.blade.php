<!DOCTYPE html>

<html class="no-js" lang="{!! lang() !!}">
    <head>
        <meta charset="utf-8">

        @hasSection('meta-title')
            <title>@yield('meta-title') — {!! widget('title') !!}</title>
        @elseif(isset($meta->title) && $meta->title)
            <title>{{$meta->title}} — {!! widget('title') !!}</title>
        @endif

        <!-- OG meta-tags -->
        @if(isset($og->site_name) && $og->site_name)
            <meta property="og:site_name" content="{{$og->site_name}}" />
        @endif

            <meta property="og:type" content="website">
            <meta property="og:url" content="{{Request::url()}}">

        @if(isset($og->image) && $og->image)
            <meta property="og:image" content="{{$og->image}}" />
            <link rel="image_src" href="{{$og->image}}">
            <meta property="og:image:type" content="image/png">
            <meta property="og:image:width" content="400">
            <meta property="og:image:height" content="400">
        @endif

        @if(isset($og->title) && $og->title)
            <meta property="og:title" content="{{$og->title}}" />
        @endif

        @if(isset($og->description) && $og->description)
            <meta property="og:description" content="{{$og->description}}" />
            <meta property="twitter:description" content="{{$og->description}}" />
        @endif

        @if(isset($meta->keywords) && $meta->keywords)
            <meta name="keywords" content="{{$meta->keywords}}" />
        @endif

        @if(isset($meta->description) && $meta->description)
            <meta name="description" content="{{$meta->description}}" />
        @endif

        <!-- Other -->
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="HandheldFriendly" content="true">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta name="robots" content="noodp, noydir">

        <!-- Favicons -->
        <link href="/favicons/favicon.ico" type="image/png" rel="icon" sizes="32x32">
        <link href="/favicons/favicon.ico" rel="shortcut icon">
        <link href="/favicons/favicon-16x16.png" type="image/png" rel="icon" sizes="16x16">
        <link href="/favicons/favicon-32x32.png" type="image/png"  rel="icon" sizes="32x32">
        <link href="/favicons/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180">
        <link href="/favicons/safari-pinned-tab.svg" rel="mask-icon" color="#ffffff">
        <link href="/favicons/manifest.json" rel="manifest">
        <meta name="theme-color" content="#ffffff">
        <meta name="msapplication-config" content="favicons/browserconfig.xml">

        <!-- Head links -->
        <link href="/css/reset.css" rel="stylesheet">
        <link href="/css/modules.css" rel="stylesheet">
        <link href="/css/main.css" rel="stylesheet">
        <script src="/js/jquery-2.2.4.min.js"></script>
        <script src="/js/modernizr.min.js"></script>


    </head>
    <body class="page">
        <!--[if lt IE 9]>
            <p class="browsehappy">Вы используете <strong>устаревший </strong>браузер. Пожалуйста <a href="http://browsehappy.com" target="_blank">обновите браузер </a>для лучшего отображения сайта.</p>
        <![endif]-->
        <div class="page__content">
            <div class="page__wrapper">
                <div class="page__header">
                    @section('header')
                    <header class="header">
                        <div class="header__wrapper header__wrapper_full-md">
                            <div class="header__logo">
                                @if (Request::is('/'))
                                <div class="logo">
                                    <a class="logo__link" href="/"></a>
                                    <div class="logo__image">
                                        <img src="/img/logo-main.png" alt="Веб-студия &quot;Weltkind&quot;">
                                    </div>
                                </div>
                                @else
                                <div class="logo logo_animated">
                                    <a class="logo__link" href="/"></a>
                                    <div class="logo__image">
                                        <img src="/img/logo-main.png" alt="Веб-студия &quot;Weltkind&quot;">
                                    </div>
                                    <div class="logo__text">Вернуться на главную
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="header__right">
                                {!! widget('head.social') !!}
                                @include('common.languages')
                            </div>
                            <div class="header__more">
                                <div class="header__phone">
                                    <a href="tel:{!! widget('head.phone') !!}">{!! widget('head.phone') !!}</a>
                                </div>
                                <div class="header__button">
                                    <a class="call-feedback" href="#">@lang('index.order')</a>
                                </div>
                            </div>
                            <div class="header__main">
                                <div class="header__top-info">
                                    <h1 class="header__title">{!! widget('head.title') !!}</h1>
                                    <div class="header__phone header__phone_small">
                                        <a href="tel:{!! widget('head.phone') !!}">{!! widget('head.phone') !!}</a>
                                    </div>
                                </div>
                                @include('tree::menu')
                            </div>
                        </div>
                    </header>
                    @show
                </div>
                <div class="page__main">
                    @section('page_content')
                    @show
                </div>
                <div class="page__buffer"></div>
            </div>
            <div class="page__footer">
                @section('footer')
                <footer class="footer">
                    <div class="footer__wrapper">
                        <div class="row">
                            <div class="col_md_6">
                                <div class="footer__left">
                                    <div class="footer__top">
                                        <div class="title-small">
                                            <h2 class="title-small__title">Друзья:
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="footer__friends">
                                        <div class="facebook-block">
                                            <div class="facebook-block__left">
                                                <div class="facebook-block__friends">
                                                    <div class="fb-like-box fb_iframe_widget" data-width="450" data-href="http://www.facebook.com/WeltkindStudio" data-height="200" data-show-faces="true" data-stream="false" data-header="false" fb-xfbml-state="rendered"
                                                        fb-iframe-plugin-query="app_id=&amp;container_width=0&amp;header=false&amp;height=200&amp;href=http%3A%2F%2Fwww.facebook.com%2FWeltkindStudio&amp;locale=ru_RU&amp;sdk=joey&amp;show_faces=true&amp;stream=false&amp;width=450">
                                                        <span style="vertical-align: bottom; width: 450px; height: 154px;">
                                                            <iframe class width="450px" name="f100164b560ce1a" scrolling="no" src="https://www.facebook.com/plugins/like_box.php?app_id=&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FqXiJsurHCex.js%3Fversion%3D42%23cb%3Dfc0b104f1b1a%26domain%3Dweltkind.com%26origin%3Dhttp%253A%252F%252Fweltkind.com%252Ff28ae8c3c985adc%26relation%3Dparent.parent&amp;container_width=0&amp;header=false&amp;height=200&amp;href=http%3A%2F%2Fwww.facebook.com%2FWeltkindStudio&amp;locale=ru_RU&amp;sdk=joey&amp;show_faces=true&amp;stream=false&amp;width=450"
                                                                    title="fb:like_box Facebook Social Plugin" allowtransparency="true" allowfullscreen="true" style="border: medium none; visibility: visible; width: 450px; height: 154px;" height="200px" frameborder="0"></iframe>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="facebook-block__right">
                                                <div class="facebook-block__button">
                                                    <div class="fb-like fb_iframe_widget" data-width="100" data-href="http://www.facebook.com/WeltkindStudio" data-send="false" data-layout="button_count" data-show-faces="true" data-font="verdana" fb-xfbml-state="rendered"
                                                        fb-iframe-plugin-query="app_id=&amp;container_width=0&amp;font=verdana&amp;href=http%3A%2F%2Fwww.facebook.com%2FWeltkindStudio&amp;layout=button_count&amp;locale=ru_RU&amp;sdk=joey&amp;send=false&amp;show_faces=true&amp;width=100">
                                                        <span style="vertical-align: bottom; width: 123px; height: 20px;">
                                                            <iframe class width="100px" name="f184d6fef44c96e" scrolling="no" src="https://www.facebook.com/plugins/like.php?app_id=&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FqXiJsurHCex.js%3Fversion%3D42%23cb%3Dfc1417d3a3df0c%26domain%3Dweltkind.com%26origin%3Dhttp%253A%252F%252Fweltkind.com%252Ff28ae8c3c985adc%26relation%3Dparent.parent&amp;container_width=0&amp;font=verdana&amp;href=http%3A%2F%2Fwww.facebook.com%2FWeltkindStudio&amp;layout=button_count&amp;locale=ru_RU&amp;sdk=joey&amp;send=false&amp;show_faces=true&amp;width=100"
                                                                    title="fb:like Facebook Social Plugin" allowtransparency="true" allowfullscreen="true" style="border: medium none; visibility: visible; width: 123px; height: 20px;" height="1000px" frameborder="0"></iframe>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer__likes">
                                        <div class="social-likes">
                                            <div class="facebook" title="Поделиться ссылкой на Фейсбуке">Facebook</div>
                                            <div class="twitter" title="Поделиться ссылкой в Твиттере">Twitter</div>
                                            <div class="plusone" title="Поделиться ссылкой в Гугл-плюсе">Google+</div>
                                            <div class="vkontakte" title="Поделиться ссылкой во Вконтакте">Вконтакте</div>
                                            <div class="odnoklassniki" title="Поделиться ссылкой в Одноклассниках">Одноклассники</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col_md_6">
                                <div class="footer__center">
                                    <address>
                                        <div class="list-address" itemscope itemtype="http://schema.org/Organization">
                                            <div class="list-address__title"">
                                                <span class="list-address__copyright">&copy;</span>Веб студия
                                                <span itemprop="name">Weltkind </span>2005–{!! date('Y') !!}
                                            </div>
                                            {!! widget('footer.contacts') !!}
                                        </div>
                                    </address>
                                </div>
                                <div class="footer__right">
                                    <div class="footer__counter">
                                        <a href="//www.liveinternet.ru/click" target="_blank">
                                            <img width="88" src="//counter.yadro.ru/hit?t18.1;r;s1280*1024*24;uhttp%3A//weltkind.com/;0.9005933558359519" title="LiveInternet: показано число просмотров за 24 часа, посетителей за 24 часа и за сегодня" alt height="31"
                                                border="0">
                                        </a>
                                    </div>
                                    <div class="footer__counter">
                                        <div>
                                            <a href="https://metrika.yandex.ru/stat/?id=31568893&amp;from=informer" target="_blank" rel="nofollow">
                                                <img src="https://mc.yandex.ru/informer/31568893/3_0_202020FF_000000FF_1_pageviews" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" alt="Яндекс.Метрика" style="width:88px; height:31px; border:0;"
                                                    onclick="try{Ya.Metrika.informer({i:this,id:31568893,lang:'ru'});return false}catch(e){}">
                                            </a>
                                            <noscript>&lt;div&gt;&lt;img src="https://mc.yandex.ru/watch/31568893" style="position:absolute; left:-9999px;" alt="" /&gt;&lt;/div&gt;</noscript>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                @show
            </div>
        </div>
        <script src="/js/plugins.js"></script>
        <script src="/js/main.js"></script>
        @stack('js')
        <!-- This page took {{ (microtime(true) - LARAVEL_START) }} seconds to render -->
    </body>
</html>