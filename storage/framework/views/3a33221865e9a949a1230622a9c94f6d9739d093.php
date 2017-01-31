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
<div class="feedback">
    <div class="row">
        <div class="col_md_6">
            <div class="feedback__title">Контактные данные:
            </div>
            <?php echo $page->content; ?>

            <div class="feedback__title">Мы находимся:
            </div>
            <div class="feedback__item">
                <div class="feedback__map" id="map"></div>
            </div>
        </div>
        <div class="col_md_6">
            <div class="feedback__title">Свяжитесь с нами:
            </div>
            <?php if(session()->has('message')): ?>
                <p><?php echo e(session('message')); ?></p>
            <?php endif; ?>

            <?php echo Form::open(['action' => '\App\Modules\Feedback\Http\Controllers\IndexController@store']); ?>

            <div class="feedback__item">
                <label class="feedback__label" for="form_name">Ваше имя *</label>
                <input type="text" placeholder="Ваше имя" required id="form_name" name="name"
                       value="<?php echo e(old('name')); ?>"
                       <?php if($errors->has('name')): ?> class="error" <?php endif; ?>>
                <?php if($errors->has('name')): ?>
                    <div class="feedback__error"><?php echo e($errors->first('name')); ?></div>
                <?php endif; ?>
            </div>
            <div class="feedback__item">
                <label class="feedback__label" for="form_email">Ваш e-mail *
                </label>
                <input type="text" placeholder="Ваш E-mail" required id="form_email" name="email"
                       value="<?php echo e(old('email')); ?>" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"
                       <?php if($errors->has('email')): ?> class="error" <?php endif; ?>>
                <?php if($errors->has('email')): ?>
                    <div class="feedback__error"><?php echo e($errors->first('email')); ?></div>
                <?php endif; ?>
            </div>
            <div class="feedback__item">
                <label class="feedback__label" for="form_message">Текст сообщения *
                </label>
                <textarea type="text" placeholder="Текст сообщения" required id="form_message" name="message"
                          <?php if($errors->has('message')): ?> class="error" <?php endif; ?>><?php echo e(old('message')); ?></textarea>
                <?php if($errors->has('message')): ?>
                    <div class="feedback__error"><?php echo e($errors->first('message')); ?></div>
                <?php endif; ?>
            </div>
            <div class="feedback__item">
                <label class="feedback__label" for="form_captcha">Спам фильтр *
                </label>
                <div class="captcha">
                    <div class="captcha__left">
                        <div class="captcha__image">
                            <?php echo captcha_img('flat'); ?>

                        </div>
                    </div>
                    <div class="captcha__right">
                        <input type="text" required placeholder="Введите надпись на картинке" id="form_captcha" name="captcha"
                               <?php if($errors->has('captcha')): ?> class="error" <?php endif; ?>>
                        <?php if($errors->has('captcha')): ?>
                            <div class="feedback__error"><?php echo e($errors->first('captcha')); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="feedback__item">
                <div class="feedback__button">
                    <input class="button button_dark button_lg" type="submit" value="Отправить">
                </div>
            </div>
            <?php echo Form::close(); ?>


        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.inner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>