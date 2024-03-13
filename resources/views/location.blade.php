@extends('layout/base')

@section('content')
    <div class="games-items top-line">
        <h4><span>Карты</span></h4>
        <div class="row equal-height equal-height-child">
            <div class="game-item main-container col-lg-12 col-sm-12 col-xs-12">
                <h3 class="fs-20 mb-20 text-center">Карта <span class="color-blue">{{ $location->name }}</span>
                    @if($location->link)
                        <a href="{{ $location->link }}" target="_blank" class="fs-14 color-orange">[Карта]</a>
                    @endif
                </h3>
            </div>
            <div class="game-item main-container col-lg-6 col-sm-6 col-xs-12">
                <h3 class="fs-20 mb-20 mt-0 text-center">Предмети на локации</h3>
                <div class="p-10">
                    @if($location->items->count())
                        <table class="table table-bordered">
                            @foreach($location->items as $item)
                                <tr style="vertical-align: middle;">
                                    <td style="width: 67px"><img src="{{ asset($item->image) }}" alt=""></td>
                                    <td style="padding: 19px 10px; font-size: 16px"><a href="{{ route('item.details', ['id' => $item->id]) }}" class="link">{{ $item->name }}</a></td>
                                    <td style="width: 50px;padding: 19px;font-size: 16px;">{{ $item->pivot->quantity }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>На локации нет предметов</p>
                    @endif
                </div>
            </div>
            <div class="game-item main-container col-lg-6 col-sm-6 col-xs-12">
                <h3 class="fs-20 mb-20 mt-0 text-center">НПС</h3>
                <div class="p-10">
                    @if($location->nps->count())
                        <table class="table">
                            <thead>
                            <tr>
                                <th>НПС</th>
                                <th>Локация</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($location->nps as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->location_number }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>На локации нет НПС</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="games-items top-line">
        <h4><span>Монстры локации <span class="color-blue">{{ $location->name }}</span></span></h4>

        <div class="row equal-height equal-height-child">
            <div class="game-item main-container col-lg-12 col-sm-12 col-xs-12">

                <div class="p-10">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Монстр</th>
                            <th>ХП</th>
                            <th>Атака</th>
                            <th>Уворот</th>
                            <th>Броня</th>
                            <th>Мин урон</th>
                            <th>Макс урон</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($location->monsters as $monster)
                            <tr>
                                <td><a href="{{ route('monster.details', ['id' => $monster->parent->id, 'child_id' => $monster->id]) }}" class="link">{{ $monster->name }} {{ $monster->lvl }}</a></td>
                                <td>{{ $monster->hp }}</td>
                                <td>{{ $monster->attack }}</td>
                                <td>{{ $monster->dodge }}</td>
                                <td>{{ $monster->armor }}</td>
                                <td>{{ $monster->min_dmg }}</td>
                                <td>{{ $monster->max_dmg }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
