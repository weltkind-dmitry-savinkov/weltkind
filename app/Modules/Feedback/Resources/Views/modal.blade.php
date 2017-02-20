<section class="box-modal">
    <div class="box-modal__top">
        <h2 class="box-modal__title">Напишите нам:</h2>
        <div class="box-modal__close arcticmodal-close">
        </div>
    </div>
    <div class="box-modal__content">
        <div class="feedback feedback_modal">
            {!! Form::open(['action' => '\App\Modules\Feedback\Http\Controllers\IndexController@store', 'class' => 'form-feedback']) !!}
            <div class="feedback__message"></div>
            <div class="feedback__item">
                <label class="feedback__label" for="form_name">Ваше имя *</label>
                <input type="text" placeholder="Ваше имя" required id="form_name" name="name" value="{{old('name')}}">
            </div>
            <div class="feedback__item">
                <label class="feedback__label" for="form_email">Ваш e-mail *</label>
                <input type="text" placeholder="Ваш E-mail" required id="form_email" name="email"
                       value="{{old('email')}}" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
            </div>
            <div class="feedback__item">
                <label class="feedback__label" for="form_message">Текст сообщения *</label>
                <textarea type="text" placeholder="Текст сообщения" required id="form_message" name="message">{{old('message')}}</textarea>
            </div>
            <div class="feedback__item">
                <label class="feedback__label" for="form_captcha">Спам фильтр *</label>
                <div class="captcha">
                    <div class="captcha__left">
                        <div class="captcha__image" title="Нажмите, чтобы обновить изображение">
                            {!! captcha_img('flat') !!}
                        </div>
                    </div>
                    <div class="captcha__right">
                        <input type="text" required placeholder="Введите надпись на картинке" id="form_captcha" name="captcha">
                    </div>
                </div>
            </div>
            <div class="feedback__item">
                <div class="feedback__button">
                    <input class="button button_dark button_lg" type="submit" value="Отправить">
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>