<section class="box-modal" id="modal_feedback">
    <div class="box-modal__top">
        <h2 class="box-modal__title">Напишите нам:
        </h2>
        <div class="box-modal__close arcticmodal-close">
        </div>
    </div>
    <div class="box-modal__content">
        <div class="feedback">

            {!! Form::open(['action' => '\App\Modules\Feedback\Http\Controllers\IndexController@store'])  !!}
            <div class="feedback__item">
                <label class="feedback__label" for="form_name">Ваше имя *</label>
                <input type="text" placeholder="Ваше имя" required id="form_name" name="name"
                       value="{{old('name')}}"
                       @if ($errors->has('name')) class="error" @endif>
                @if ($errors->has('name'))
                    <div class="feedback__error">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="feedback__item">
                <label class="feedback__label" for="form_email">Ваш e-mail *
                </label>
                <input type="text" placeholder="Ваш E-mail" required id="form_email" name="email"
                       value="{{old('email')}}" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"
                       @if ($errors->has('email')) class="error" @endif>
                @if ($errors->has('email'))
                    <div class="feedback__error">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="feedback__item">
                <label class="feedback__label" for="form_message">Текст сообщения *
                </label>
                <textarea type="text" placeholder="Текст сообщения" required id="form_message" name="message"
                          @if ($errors->has('message')) class="error" @endif>{{old('message')}}</textarea>
                @if ($errors->has('message'))
                    <div class="feedback__error">{{ $errors->first('message') }}</div>
                @endif
            </div>
            <div class="feedback__item">
                <label class="feedback__label" for="form_captcha">Спам фильтр *
                </label>
                <div class="captcha">
                    <div class="captcha__left">
                        <div class="captcha__image">
                            {!! captcha_img('flat') !!}
                        </div>
                    </div>
                    <div class="captcha__right">
                        <input type="text" required placeholder="Введите надпись на картинке" id="form_captcha" name="captcha"
                               @if ($errors->has('captcha')) class="error" @endif>
                        @if ($errors->has('captcha'))
                            <div class="feedback__error">{{ $errors->first('captcha') }}</div>
                        @endif
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

<section class="box-modal" id="modal_info">
    <div class="box-modal__top">
        <div class="box-modal__close arcticmodal-close"></div>
    </div>
    <div class="box-modal__content">
        Сообщение
    </div>
</section>
