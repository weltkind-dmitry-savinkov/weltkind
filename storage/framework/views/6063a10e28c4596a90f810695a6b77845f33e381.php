<!DOCTYPE html>

<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $__env->yieldContent('title', config('app.name')); ?></title>
    <?php if (! empty(trim($__env->yieldContent('og_site_name')))): ?>
    <meta property="og:site_name" content="<?php echo $__env->yieldContent('og_site_name'); ?>" />
    <?php endif; ?>
    <?php if (! empty(trim($__env->yieldContent('og_image')))): ?>
    <meta property="og:image" content="<?php echo $__env->yieldContent('og_image'); ?>" />
    <?php endif; ?>
    <?php if (! empty(trim($__env->yieldContent('keywords')))): ?>
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords'); ?>" />
    <?php endif; ?>
    <?php if (! empty(trim($__env->yieldContent('description')))): ?>
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>" />
    <?php endif; ?>
    <?php if (! empty(trim($__env->yieldContent('author')))): ?>
    <meta name="author" content="<?php echo $__env->yieldContent('author'); ?>" />
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