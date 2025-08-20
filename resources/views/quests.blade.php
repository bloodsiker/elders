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
        ul {
            padding-left: 0;
        }
        .reward {
            color: #ed9829;
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
        .quest-menu-active {
            color: #1e90ff;
        }
        .quest-menu li.quest-menu-active::before{
            border: var(--marker-border) solid #1e90ff;
        }
        .quest-menu li.quest-menu-active::after{
            background: #1e90ff;
        }
    </style>
    <div class="games-items top-line">
        <h4><span>Квесты</span></h4>
        <div class="row equal-height equal-height-child">
            <div class="game-item main-container col-lg-3 col-sm-3 col-xs-12">
                <div class="p-10">
                    <ul class="quest-menu">
                        @foreach($categories as $category)
                            <li class="{{ isset($selectCategory) && $selectCategory?->id === $category->id ? 'quest-menu-active' : '' }}">
                                <a href="{{ route('quest.category', ['slug' => $category->slug]) }}" class="{{ isset($selectCategory) && $selectCategory?->id === $category->id ? 'quest-menu-active' : '' }}">{{ $category->name }} ({{ $category->quests()->count() }})</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="game-item main-container col-lg-9 col-sm-9 col-xs-12">
                <div class="p-10">
                    @foreach($quests as $quest)
                        <table class="table table-bordered">
                            <tr class="fs-14" style="vertical-align: middle;">
                                <td style="padding: 10px;">
                                    <a href="{{ route('quest', ['id' => $quest->id]) }}" class="link underline">{{ $quest->title }}</a>
                                    <br>
                                    <b>НПС:</b> <span class="item_name">{{ $quest->npc->name }}</span>
                                    <br>
                                    <b>Локация:</b> <span>
                                        @foreach($quest->npc->locations as $location)
                                            <a href="{{ route('location', ['id' => $location->id]) }}" class="link underline">{{ $location->name }}</a>@if(!$loop->last), @endif
                                        @endforeach
                                            [{{ $quest->npc->location_number }}]
                                    </span>
                                    <br>
                                    <b>Награда:</b> <br>
                                    <span class="reward">{!! $quest->reward !!}</span>
                                </td>
                            </tr>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
