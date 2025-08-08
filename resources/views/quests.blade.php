@extends('layout/base')

@section('content')
    <style>
        :root{
            --marker-size: 18px;     /* диаметр внешнего круга */
            --inner-size: 8px;      /* диаметр внутреннего круга */
            --marker-border: 1px;    /* толщина обводки внешнего круга */
            --marker-color: #fff;    /* цвет обводки внешнего круга */
            --inner-color: #1e90ff;  /* цвет внутреннего круга (синий) */
            --gap: 12px;             /* отступ текста от маркера */
        }
        .quest-menu {
            padding-left: 0;
        }
        .quest-menu li{
            position: relative;
            padding-left: calc(var(--marker-size) + var(--gap));
            margin: 10px 0;
            line-height: 1.3;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            color: #222;
        }

        /* внешний круг (маркер) */
        .quest-menu li::before{
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: var(--marker-size);
            height: var(--marker-size);
            border: var(--marker-border) solid var(--marker-color);
            border-radius: 50%;
            box-sizing: border-box;
            background: transparent;
        }

        /* внутренний синий кружок */
        .quest-menu li::after{
            content: "";
            position: absolute;
            left: calc(var(--marker-size) / 2);
            top: 50%;
            transform: translate(-50%, -50%);
            width: var(--inner-size);
            height: var(--inner-size);
            background: #fff;
            border-radius: 50%;
            box-shadow: 0 1px 2px rgba(0,0,0,0.12);
        }

        /* небольшой эффект при наведении — для наглядности */
        .quest-menu li:hover::after{
            transform: translate(-50%, -50%) scale(1.08);
            transition: transform 120ms ease;
            background: #1e90ff;
        }
        .quest-menu li:hover::before{
            border: var(--marker-border) solid #1e90ff;
        }
    </style>
    <div class="games-items top-line">
        <h4><span>Квесты</span></h4>
        <div class="row equal-height equal-height-child">
            <div class="game-item main-container col-lg-3 col-sm-3 col-xs-12">
                <div class="p-10">
                    <ul class="quest-menu">
                        <li><a href="">Квесты Майа</a></li>
                        <li><a href="">Квесты Тейла</a></li>
                        <li><a href="">Квесты Зарам Дума</a></li>
                    </ul>
                </div>
            </div>
            <div class="game-item main-container col-lg-9 col-sm-9 col-xs-12">
                <h3 class="fs-20 mb-20 text-center">Этот раздел в разработке</h3>
                <div class="p-10">

                </div>
            </div>
        </div>
    </div>

@endsection
