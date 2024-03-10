<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elders</title>
    <link href="{{ asset('front/libs/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700|PT+Serif:400,700" rel="stylesheet">
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/libs/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('front/assets/images/favicon.png') }}" type="image/x-icon">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="wrapper">
    <div class="wrap-topbar">
        <div class="container">
            <div class="row">
                <div class="topbar-left col-xs-8 col-sm-6">
                    <div class="custom"><p>Добро пожаловать на сайт Elders</p></div>
                </div>
                <div class="topbar-right pull-right col-xs-4 col-sm-6">

                    <div class="languageswitcherload">
                        <div class="mod-languages"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layout/header')

    @include('layout/menu')

    <div class="wrap-bg row">
        <div class="wrap-bg-container">
            <div class="wrap-bg-title">
                <h1>Elders</h1>
{{--                <h2>Path of Exile is an action-RPG developed by Grinding Gear Games, and is considered by many to be the spiritual successor to Diablo II. With regular content updates, a fair business model, deep and engaging gameplay, PoE has won over many old-school ARPG-fans</h2>--}}
            </div>
            @php
                $backgroundImage = 'front/assets/images/header-bg.jpg';
            @endphp
            <div class="img-header-top" style="background-image: url({{ asset($backgroundImage) }});">
            </div>
            <div class="img-header" style="background-image: url({{ asset($backgroundImage) }});"></div>
            <div class="img-header-bottom" style="background-image: url({{ asset($backgroundImage) }});">
            </div>
            <div class="img-header-bottom-mask">
            </div>
        </div>
    </div>


    <div class="main-body">
        <div class="container">
            @yield('content')
        </div>
    </div>

    @include('layout/footer')
</div>

@include('layout/modal')

<script src="{{ asset('front/libs/jquery/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('front/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/libs/select2/dist/js/select2.min.js') }}"></script>

@yield('script')
@stack('footer_scripts')

<script>
    $(function () {
        $('.btn-search').click(function () {
            $('.head-search').toggleClass('btn-open');
            $('.head-right').toggleClass('btn-open');
            if ($('.head-search').hasClass('btn-open')) {
                $('#mod-search-searchword').focus();
            }
        });
        $(document).on('click', function (e) {
            if ($(e.target).closest(".btn-search").length === 1 || $(e.target).closest("#mod-search-searchword").length === 1) {
                e.stopPropagation();
            } else {
                $('.head-search').removeClass('btn-open');
            }
        });

        /* Cart modal */
        $('#show-head-cart').on('click', function () {
            $('#modal-cart').modal('show');
        });

        /* Add to cart modal */
        $('.add-to-cart').on('click', function () {
            $('#modal-add-cart').modal('show');
        });

        /* Select */
        $(document).ready(function() {
            $('.item-filter').select2({
                minimumResultsForSearch: -1
            });
        });
    });
</script>
</body>
</html>
