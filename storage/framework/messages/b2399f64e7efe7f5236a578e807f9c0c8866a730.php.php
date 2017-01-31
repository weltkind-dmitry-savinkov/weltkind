<!DOCTYPE html>

<html lang="<?php echo lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php if(isset($meta->title) && $meta->title): ?>
    <title><?php echo e($meta->title); ?></title>
    <?php endif; ?>

    <?php if(isset($og->site_name) && $og->site_name): ?>
    <meta property="og:site_name" content="<?php echo e($og->site_name); ?>" />
    <?php endif; ?>

    <?php if(isset($og->image) && $og->image): ?>
        <meta property="og:image" content="<?php echo e($og->image); ?>" />
    <?php endif; ?>

    <?php if(isset($og->title) && $og->title): ?>
        <meta property="og:title" content="<?php echo e($og->title); ?>" />
    <?php endif; ?>

    <?php if(isset($og->description) && $og->description): ?>
        <meta property="og:description" content="<?php echo e($og->description); ?>" />
    <?php endif; ?>


    <?php if(isset($meta->keywords) && $meta->keywords): ?>
    <meta name="keywords" content="<?php echo e($meta->keywords); ?>" />
    <?php endif; ?>

    <?php if(isset($meta->description) && $meta->description): ?>
    <meta name="description" content="<?php echo e($meta->description); ?>" />
    <?php endif; ?>


    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/jquery.colorbox.css">
    <link rel="stylesheet" href="/css/social-likes_birman.css">
    <link rel="stylesheet" href="/css/jquery.fullPage.css">
    <link rel="stylesheet" href="/css/style.css">

    <?php echo $__env->yieldPushContent('css'); ?>

    <!--[if lt IE 9]>
    <script src="/js/jquery-1.11.2.min.js"></script>
    <![endif]-->


    <!--[if gt IE 8]><!-->
    <script src="/js/jquery-2.1.3.min.js"></script>
    <!--<![endif]-->

    <?php $__env->startSection('css'); ?>
    <?php $__env->stopSection(); ?>

</head>
<body>

<div class="b-page">
    <div class="b-page__wrapper">
        <!-- HEADER-->
        <div class="b-page__header">
            <?php $__env->startSection('header'); ?>
            <header class="b-header">
                <div class="b-header__top">
                    <div class="b-header__logo">
                        <div class="b-logo"><a href="<?php echo home(); ?>"><img src="/img/logo.png" alt="Weltkind"></a></div>
                    </div>
                    <div class="b-header__middle-block">
                        <div class="b-header__company-name">
                            <h1 class="b-bold-title"><?php echo Widget::get('head.title'); ?></h1>
                        </div>
                        <div class="b-header__phone"><?php echo Widget::get('head.phone'); ?></div>
                        <div class="clear"></div>
                    </div>
                    <div class="b-header__right-block">
                        <div class="b-header__social">
                            <div class="b-social">
                                <?php echo Widget::get('social-links'); ?>

                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="b-header__lang">
                            <div class="b-lang"><a href="#" class="b-lang__link">English version</a></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php echo $__env->make('tree::menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </header>
            <?php echo $__env->yieldSection(); ?>
        </div>
        <!-- END HEADER-->
        <!-- MAIN-->
        <div class="b-page__content">
            <?php $__env->startSection('page_content'); ?>

            <?php echo $__env->yieldSection(); ?>
        </div>
        <!-- END MAIN-->
        <div class="b-page__buffer"></div>
    </div>
    <!-- FOOTER-->
    <div class="b-page__footer">
        <?php $__env->startSection('footer'); ?>
        <footer class="b-footer">
            <div class="b-footer__social-block">
                <div class="b-footer__friends">
                    <div class="b-friends-block">
                        <div class="b-friends-block__title">
                            <h2 class="b-small-title">Друзья:</h2>
                        </div>
                        <div class="b-friends-block__photo-list">
                            <ul>
                                <li class="b-friends-block__item"><a href="#" class="b-friends-block__link"><img src="/img/content/f-1.jpg" alt="photo"></a></li>
                                <li class="b-friends-block__item"><a href="#" class="b-friends-block__link"><img src="/img/content/f-2.jpg" alt="photo"></a></li>
                                <li class="b-friends-block__item"><a href="#" class="b-friends-block__link"><img src="/img/content/f-3.jpg" alt="photo"></a></li>
                                <li class="b-friends-block__item"><a href="#" class="b-friends-block__link"><img src="/img/content/f-4.jpg" alt="photo"></a></li>
                                <li class="b-friends-block__item"><a href="#" class="b-friends-block__link"><img src="/img/content/f-5.jpg" alt="photo"></a></li>
                                <li class="b-friends-block__item"><a href="#" class="b-friends-block__link"><img src="/img/content/f-6.jpg" alt="photo"></a></li>
                                <li class="b-friends-block__item"><a href="#" class="b-friends-block__link"><img src="/img/content/f-7.jpg" alt="photo"></a></li>
                                <li class="b-friends-block__item"><a href="#" class="b-friends-block__link"><img src="/img/content/f-1.jpg" alt="photo"></a></li>
                                <li class="b-friends-block__item"><a href="#" class="b-friends-block__link"><img src="/img/content/f-2.jpg" alt="photo"></a></li>
                                <li class="b-friends-block__item"><a href="#" class="b-friends-block__link"><img src="/img/content/f-3.jpg" alt="photo"></a></li>
                                <li class="b-friends-block__item"><a href="#" class="b-friends-block__link"><img src="/img/content/f-4.jpg" alt="photo"></a></li>
                                <li class="b-friends-block__item"><a href="#" class="b-friends-block__link"><img src="/img/content/f-5.jpg" alt="photo"></a></li>
                                <li class="b-friends-block__item"><a href="#" class="b-friends-block__link"><img src="/img/content/f-6.jpg" alt="photo"></a></li>
                            </ul>
                        </div>
                        <div class="b-friends-block__like-button"><img src="/img/content/like.jpg" alt="like"></div>
                        <div class="clear">
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="b-footer__social-likes">
                    <div class="b-share">
                        <div class="social-likes social-likes_light">
                            <div title="Поделиться ссылкой на Фейсбуке" class="facebook">Facebook</div>
                            <div title="Поделиться ссылкой в Твиттере" class="twitter">Twitter</div>
                            <div title="Поделиться ссылкой в Гугл-плюсе" class="plusone">Google+</div>
                            <div title="Поделиться ссылкой во Вконтакте" class="vkontakte">Вконтакте</div>
                            <div title="Поделиться ссылкой в Одноклассниках" class="odnoklassniki">Одноклассники</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="b-footer__info-block">
                <div class="b-footer__copyright">
                    <div class="b-copyright">© Веб студия Weltkind 2005–<?php echo date('Y'); ?></div>
                </div>
                <div class="b-footer__contacts">
                    <div class="b-bottom-contacts">
                        <?php echo Widget::get('footer-contacts'); ?>

                    </div>
                </div>
                <div class="b-footer__counters">
                    <div class="b-bottom-counters">
                        <ul>
                            <li class="b-bottom-counters__item"><img src="/img/content/counter-1.jpg" alt="counter"></li>
                            <li class="b-bottom-counters__item"><img src="/img/content/counter-2.jpg" alt="counter"></li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </footer>
        <?php echo $__env->yieldSection(); ?>
    </div>
    <!-- END FOOTER-->
</div>
<script src="/js/scriptjava.js"></script>
<script src="/js/cartoon_background.js"></script>
<script src="/js/plugins.min.js"></script>
<script src="/js/script.js"></script>

<?php echo $__env->yieldPushContent('js'); ?>

</body>
</html>