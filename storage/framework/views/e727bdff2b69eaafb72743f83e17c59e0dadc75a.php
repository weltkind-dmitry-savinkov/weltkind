<?php $__env->startPush('js'); ?>

<script type="text/javascript">
    function initMap() {
        var myLatLng = {lat: <?=Settings::get('lat')?>, lng: <?=Settings::get('lng')?>};

        var map = new google.maps.Map(document.getElementById('map'), {
            scrollwheel: false,
            zoom: <?=Settings::get('zoom')?:8?>,
            center: myLatLng
        });



        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map
        });
    }

</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=<?=config('googlemaps.key')?>&callback=initMap"></script>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <div class="b-contacts">
        <div class="b-contacts__left">
            <div class="b-contacts__info">
                <div class="b-contacts__title">
                    <h2 class="b-small-title b-small-title_bold">Контактные данные:</h2>
                </div>
                <div class="b-bottom-contacts">
                    <?php echo $page->content; ?>

                </div>
            </div>
        </div>
        <div class="b-contacts__right">
            <div class="b-contacts__form">
                <div class="b-contacts__title">
                    <h2 class="b-small-title b-small-title_bold">Свяжитесь с нами:</h2>
                </div>
                <div class="b-form">

                    <?php if(session()->has('message')): ?>
                        <div class="alert alert-info"><?php echo e(session('message')); ?></div>
                    <?php endif; ?>


                    <?php echo Form::open(['action' => '\App\Modules\Feedback\Http\Controllers\IndexController@store']); ?>

                    <div class="b-form__item">
                        <div class="b-form-item b-form-item_type_text b-form-item_style_default">
                            <label for="name" class="b-form-item__label">Ваше имя:</label>

                            <div class="b-form-item__input">
                                <input type="text" name="name" placeholder="Введите ваше имя" id="name"
                                       value="<?php echo e(old('name')); ?>">
                            </div>


                            <?php if($errors->has('name')): ?>
                                <span class="error">
                                       <?php echo e($errors->first('name')); ?>

                                </span>
                            <?php endif; ?>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="b-form__item">
                        <div class="b-form-item b-form-item_type_email b-form-item_style_default">
                            <label for="email" class="b-form-item__label">Ваш email:</label>

                            <div class="b-form-item__input">
                                <input type="email" name="email" placeholder="info@example.com" id="email"
                                       pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" title="Введите верный адрес email"
                                       value="<?php echo e(old('email')); ?>">
                            </div>

                            <?php if($errors->has('email')): ?>
                                <span class="error">
                                        <?php echo e($errors->first('email')); ?>

                                </span>
                            <?php endif; ?>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="b-form__item">
                        <div class="b-form-item b-form-item_type_textarea b-form-item_style_default">
                            <label for="message" class="b-form-item__label">Сообщение:</label>

                            <div class="b-form-item__input">
                                <textarea name="message" cols="80" rows="24" placeholder="Введите сообщение"
                                          id="message"><?php echo e(old('message')); ?></textarea>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="b-form__item">
                        <div class="b-form-item b-form-item_type_captcha b-form-item_style_default">
                            <label for="captcha" class="b-form-item__label">Спам фильтр<span> *</span></label>

                            <div class="b-form-item__input-image">
                                <a href="#" title="Reload image"><?php echo captcha_img('flat'); ?></a>
                            </div>
                            <div class="b-form-item__input">
                                <input type="text" name="captcha" id="captcha">
                            </div>

                            <div class="clear"></div>

                            <?php if($errors->has('captcha')): ?>
                                <span class="error">
                                        <?php echo e($errors->first('captcha')); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="b-form__button">
                        <button type="submit"
                                class="b-button b-button_block b-button_color_transparent b-button_size_lg b-button_bold">
                            Отправить
                        </button>
                    </div>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="b-contacts__map">
            <div class="b-map">
                <div class="b-map__title">
                    <h2 class="b-small-title b-small-title_bold">Мы находимся:</h2>
                </div>
                <div class="b-map__map" id="map"></div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>