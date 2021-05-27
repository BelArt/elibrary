<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Reader</title>
    <meta id="site-viewport" name="viewport" content="width=320">
    <meta name="format-detection" content="telephone=no">

    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="194x194" href="/images/favicons/favicon-194x194.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/images/favicons/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/images/favicons/site.webmanifest">
    <link rel="mask-icon" href="/images/favicons/safari-pinned-tab.svg" color="#2b5797">
    <link rel="shortcut icon" href="/images/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="msapplication-TileImage" content="/images/favicons/mstile-144x144.png">
    <meta name="msapplication-config" content="/images/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <script>
        if (screen.width > 736)
        {
            var svp = document.getElementById('site-viewport');
            svp.setAttribute('content','width=1300');
        }
    </script>

    <style>
        .preloader {
            background: #000;
            color: #fff;
            height: 100%;
            left: 0;
            opacity: 0;
            position: fixed;
            top: 0;
            -webkit-transition: opacity .15s ease, visibility .15s ease;
            -o-transition: opacity .15s ease, visibility .15s ease;
            transition: opacity .15s ease, visibility .15s ease;
            visibility: hidden;
            width: 100%;
            z-index: 99999;
        }

        .preloader_active {
            opacity: 1;
            visibility: visible;
        }

        .preloader__content {
            left: 50%;
            position: absolute;
            top: 50%;
            -webkit-transform: translate(-50%,-50%);
            -ms-transform: translate(-50%,-50%);
            -o-transform: translate(-50%,-50%);
            transform: translate(-50%,-50%);
        }

        .preloader__rolling {
            -webkit-animation-name: spin;
            -webkit-animation-duration: 2000ms;
            -webkit-animation-iteration-count: infinite;
            -webkit-animation-timing-function: linear;
            -moz-animation-name: spin;
            -moz-animation-duration: 2000ms;
            -moz-animation-iteration-count: infinite;
            -moz-animation-timing-function: linear;
            -ms-animation-name: spin;
            -ms-animation-duration: 2000ms;
            -ms-animation-iteration-count: infinite;
            -ms-animation-timing-function: linear;
            animation-name: spin;
            animation-duration: 2000ms;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
            background: transparent url(/images/preloader.svg) no-repeat center center;
            -webkit-background-size: 5em 5em;
            background-size: 5em 5em;
            height: 5em;
            margin: 0 auto 0 auto;
            width: 5em;
        }

        .preloader__text {
            display: none;
            font-size: 1em;
            font-weight: 300;
            line-height: 120%;
            opacity: .5;
            text-align: center;
        }

        @-ms-keyframes spin {
            from {
                -ms-transform: rotate(0deg);
            }
            to {
                -ms-transform: rotate(360deg);
            }
        }

        @-moz-keyframes spin {
            from {
                -moz-transform: rotate(0deg);
            }
            to {
                -moz-transform: rotate(360deg);
            }
        }

        @-webkit-keyframes spin {
            from {
                -webkit-transform: rotate(0deg);
            }
            to {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        .i-check-mobile {
            display:none;
        }

        .i-check-mid {
            display:none;
        }

        @media only screen and (max-width: 736px){
            .i-check-mobile {
                display: block;
            }
        }
        @media only screen and (max-width: 1599px){
            .i-check-mid {
                display: block;
            }
        }
    </style>

</head>
<body data-zoom="100">
<div class="wrapper">
    @each('public.page.parts.item', $case->pages, 'page')
</div>

<div class="control-panel">
    <div class="control-panel__element control-panel__element_paginator paginator">
        <span class="paginator__label">Страница №</span>
        <input type="text" class="paginator__current" value="1" data-last="1">
        <span class="paginator__divider">&nbsp;/&nbsp;</span>
        <span class="paginator__total">&nbsp;</span>
    </div>
    <div class="control-panel__element control-panel__element_minus"></div>
    <div class="control-panel__element control-panel__element_plus"></div>
    <div class="control-panel__element control-panel__element_scale scale">Масштаб <span class="scale__value">100</span>%</div>
</div>

<!-- Preloader -->
<div class="preloader preloader_active">
    <div class="preloader__content">
        <div class="preloader__rolling"></div>
        <div class="preloader__text">Загрузка...</div>
    </div>
</div>
<!-- \Preloader -->

<div class="i-check-mobile"></div>
<div class="i-check-mid"></div>

<!-- Styles -->
<link rel="stylesheet" href="/css/normalize.min.css">
<link rel="stylesheet" href="/css/viewer.css">
<link rel="stylesheet" href="/css/mobile.min.css" media="only screen and (max-width:736px)">

<script src="{{ asset('js/vendor/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/vendor/mobile-detect.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/vendor/lazyload.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/viewer.js') }}" type="text/javascript"></script>

</body>
</html>