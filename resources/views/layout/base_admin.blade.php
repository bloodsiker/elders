<!DOCTYPE html>
<!--
Template Name: Rubick - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{ asset('dist/img/logo.png') }}" rel="shortcut icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Дистанційна школа 5-11 класи">
    <meta name="keywords" content="Базова програма навчання +, «Живі» вебінари у реальному часі, Індивідуальні консультації та онлайн-чати з вчителями, Соціалізація – дружнє ком’юніті, спілкування з однолітками, обговорення актуальних для дітей тем, цікаві зустрічі та події, Документ про навчання державного зразка">
    <meta name="author" content="Finance">

@yield('head')

<!-- BEGIN: CSS Assets-->
    <link href="{{ asset('front/libs/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}?v=1.002" />
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}?v=1.006" />
    <style>
        html {
            --tw-bg-opacity: 1;
            background-color: #54c2b9;
        }

        .side-nav > ul > li > .side-menu:hover:not(.side-menu--active):not(.side-menu--open) .side-menu__icon:before{
            --tw-bg-opacity: 1;
            background-color: #5ed1c8;
        }
    </style>
    <style>
        .select2-container {
            z-index: 10001;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('front/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{asset('dist/lib/ckeditor/ckeditor4-master/ckeditor.js')}}"></script>
    <script src="/scripts.js"> </script>
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

@yield('body')

<script>
    /* Select */
    $(document).ready(function() {
        $('.select2').select2({
            // minimumResultsForSearch: -1,
            // minimumInputLength: 2
        });
    });
</script>

<script>
    $(document).ready(function() {
        document.querySelectorAll('.ckeditor').forEach(function(el) {
            CKEDITOR.replace(el, {
                width: '100%',
                height: '400px',
                allowedContent: true,
            });
        });
    });
</script>

</html>
