$(document).ready(function() {

    // ====================================================================================================
    // Инициализация плагинов:

    // Инициализация плагина FormStyler и модуля "button"
    function initializeFormStyler() {
        $('input, textarea, select').addClass('styler');
        $('.styler-disable *').removeClass('styler');
        var btn_tags = 'button,' +
                       'input[type=\"submit\"],' +
                       'input[type=\"reset\"],' +
                       'input[type=\"button\"]';
        $(btn_tags).removeClass('styler').addClass('button');
        $('.styler').styler();
    };
    $('.jq-selectbox__select').hover(function() {
        var fs_parent = $(this).parent('.jq-selectbox').find('select');
        fs_parent.removeClass('styler').trigger('refresh');
    });
    initializeFormStyler();

    // Инициализируем скролл в начало страницы
    toPageTop.init();

    // # Fancybox
    // ## Награды
    $('.card-reward__link').attr('rel', 'gal');
    $('.card-reward__link').fancybox();
    // ## Портфолио - полная
    $('.work-full__preview').attr('rel', 'gal');
    $('.work-full__preview').fancybox();



    // ====================================================================================================
    // Модалка обратной связи

    // Отправляем
    $(document).on('click', '.call-feedback', function(e) {
        $.arcticmodal({
            ajax: {
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('#token').attr('value')
                }
            },
            type: 'ajax',
            url: $(this).attr('href'),
            afterLoadingOnShow : function()
            {
                initializeFormStyler();
                feedbackSendForm();
            }
        });
        e.preventDefault();
    });

    // Получаем
    function feedbackSendForm() {
        $('.form-feedback').submit(function(e){
            e.preventDefault();
            // Сбрасываем форму
            $(this).find('*').removeClass('error');
            $(this).find('.feedback__error').remove();
            $(this).find('.feedback__message').html('');
            $.post({
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success : function(data)
                {
                    $('.box-modal__title').html('Спасибо!')
                    $('.box-modal__content').html('<p style="font-size: 1.2em;">Ваше сообщение успешно отправлено. Наши менеджеры свяжутся с Вами в ближайшее время.</p>')
                    // Закрываем окно после отправки
                    var timerId = setTimeout(function() {
                        $.arcticmodal('close');
                    }, 5000);
                },
                error: function(data)
                {
                    refreshCaptcha();
                    // Вывод ошибок
                    var errors = data.responseJSON;
                    for (var value in errors) {
                        $('.form-feedback').find('#form_' + value).addClass('error');
                        $('.form-feedback').find('#form_' + value).closest('.feedback__item').append('<div class="feedback__error">' + errors[value] + '</div>');
                    }
                }
            });
        });
    };

    // Обновление капчи
    function refreshCaptcha() {
        $('.captcha__image img').attr('src','/captcha/flat?' + Math.random());
    }

    $(document).on('click', '.captcha__image', function(e) {
        refreshCaptcha();
    });



    // ====================================================================================================
    // # Блок FAQ:

    // ## Контроллеры
    // При нажатии на ссылку - открывает ответ
    $('.faq-list__link').click(function(event) {
        event.preventDefault();
        el = $(this);
        openFaqAnswer(el);
    });
    // При нажатии на крестик - закрывает ответ
    $('.faq-answer__close').click(function() {
        closeFaqAnswer();
    });
    // При клике вне ссылки или попапа - закрывает ответ
    $(document).click(function(event) {
        if ($(event.target).closest(".faq-list__link").length
            || $(event.target).closest(".faq-list__popup").length ) {
            return;
        };
        closeFaqAnswer()
        event.stopPropagation();
    });
    // При нажатии Esc - закрывает ответ
    $(document).keydown(function(event) {
        if (event.keyCode  == 27) {
            event.preventDefault();
            closeFaqAnswer()
        }
    });

    // ## Методы
    // Открываем ответ
    function openFaqAnswer(el) {
        // Картинка, пока её не видно, случайно меняется
        if (!($(el).closest('.faq-list').find('.faq-list__popup').hasClass('faq-list__popup_active'))) {
            var url = el.attr('href');
            $.get({
                url: url,
                success: function(data){
                    $('.faq-layout__right').html(data);
                },
            });
        };
        // К ссылке добавляется помеченный стиль
        $('.faq-list__link').removeClass('faq-list__link_active');
        $(el).addClass('faq-list__link_active');
        // Появляется облако с ответом на вопрос
        $('.faq-list__popup').removeClass('faq-list__popup_active');
        $(el).closest('.faq-list__item').find('.faq-list__popup').addClass('faq-list__popup_active');
        // Правая часть с человечком и его сообщением скрывается
        $('.faq-layout__right').addClass('faq-layout__right_hidden');
    };
    // Закрываем ответ
    function closeFaqAnswer() {
        // Убирается активный класс ссылки
        $('.faq-list__link').removeClass('faq-list__link_active');
        // Сообщение скрывается
        $('.faq-list__popup').removeClass('faq-list__popup_active');
        // Правая часть возвращается
        $('.faq-layout__right').removeClass('faq-layout__right_hidden');
    };



    // ====================================================================================================
    // Регуляция количества иконок клиентов:
    $('.list-clients .list-clients__more').click(function(event) {
        event.preventDefault();
        if ($('.list-clients__list').hasClass('list-clients__list_prepared')) {
            $('.list-clients__list').removeClass('list-clients__list_prepared');
            $('.list-clients__more').html("Скрыть");
        } else {
            $('.list-clients__list').addClass('list-clients__list_prepared');
            $('.list-clients__more').html("Показать ещё");
        }
    });



    // ====================================================================================================
    // Разное:

    // Яндекс метрика
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter31568893 = new Ya.Metrika({
                    id:31568893,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });
        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";
        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");



});
