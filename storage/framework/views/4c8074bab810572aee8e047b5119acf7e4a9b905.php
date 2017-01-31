<section class="box-modal" id="modal_feedback">
    <div class="box-modal__top">
        <h2 class="box-modal__title">Напишите нам:
        </h2>
        <div class="box-modal__close arcticmodal-close">
        </div>
    </div>
    <div class="box-modal__content">
        <div class="feedback">
            <form action="#" method="post">
                <div class="feedback__error-large">Ошибка при отправке формы
                </div>
                <div class="feedback__item">
                    <label class="feedback__label">Ваше имя *
                    </label>
                    <input type="text" required placeholder="Имя">
                </div>
                <div class="feedback__item">
                    <label class="feedback__label">Ваш e-mail *
                    </label>
                    <input class="error" type="text" required placeholder="E-mail">
                    <div class="feedback__error">Неверный E-mail
                    </div>
                </div>
                <div class="feedback__item">
                    <label class="feedback__label">Текст сообщения *
                    </label>
                    <textarea type="text" required placeholder="Текст сообщения"></textarea>
                </div>
                <div class="feedback__item">
                    <label class="feedback__label">Введите защитный код *
                    </label>
                    <div class="captcha">
                        <div class="captcha__left">
                            <div class="captcha__image">
                                <img width="120px" src="/img/captcha-demo.png" alt="captcha" height="40px">
                            </div>
                        </div>
                        <div class="captcha__right">
                            <input type="text" required placeholder="Введите надпись на картинке">
                        </div>
                    </div>
                </div>
                <div class="feedback__item">
                    <div class="feedback__button">
                        <input class="button button_light button_block" type="submit" value="Отправить">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>