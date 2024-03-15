@extends('layout/base')

@section('content')
    <div class="games-items top-line">
        <h4><span>Монстр</span></h4>
        <div class="row equal-height equal-height-child">
            <div class="game-item main-container col-lg-12 col-sm-12 col-xs-12">
                <h3 class="fs-20 mb-20 text-center">Монстр
                    <span class="color-blue">{{ $monster->name }}</span>
                    @if($monster->lvl)
                        <span class="color-blue">{{ $monster->lvl }}</span>
                    @endif
                </h3>
            </div>
            <div class="game-item main-container col-lg-5 col-sm-5 col-xs-12">
                <h3 class="fs-20 mb-20 mt-0 text-center">Локации монстра</h3>
                <div class="p-10">
                    @if($monster->locations->count())
                        <table class="table table-bordered fs-14">
                            @foreach($monster->locations as $location)
                                <tr>
                                    <td style="vertical-align: middle;padding: 10px;"><a href="{{ route('location', ['id' => $location->id]) }}" class="link">{{ $location->name }}</a></td>
                                    <td class="text-center" style="vertical-align: middle;width: 50px;padding: 10px;"><a href="{{ $location->link }}" target="_blank" class="link">Карта</a></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>Нет информации</p>
                    @endif
                </div>

                <div class="top-line mb-20"></div>

                <h3 class="fs-20 mb-20 mt-0 text-center">Дроп с монстра</h3>
                <div class="p-10">
                    @if($monster->parent->items->count())
                        <table class="table table-bordered">
                            @foreach($monster->parent->items as $item)
                                <tr>
                                    <td style="vertical-align: middle;width: 67px"><img src="{{ asset($item->image) }}" alt=""></td>
                                    <td style="vertical-align: middle;padding: 10px; font-size: 16px"><a href="{{ route('item.details', ['id' => $item->id]) }}" class="link">{{ $item->name }}</a></td>
                                    <td class="text-center fs-14" style="vertical-align: middle;width: 50px;padding: 10px;">{{ $item->pivot->quantity }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>Нет дропа</p>
                    @endif
                </div>
            </div>
            <div class="game-item main-container col-lg-7 col-sm-7 col-xs-12">
                <div class="p-10">
                    <div class="monster_image">
                        <img src="{{ asset($monster->image) }}" class="img-responsive" alt="{{ $monster->name }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="games-items top-line">
        <h4><span>Монстры</span></h4>

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
                        @foreach($parentMonster->children as $child)
                            <tr class="@if($child->id === $monster->id) active_tr @endif">
                                <td><a href="{{ route('monster.details', ['id' => $parentMonster->id, 'child_id' => $child->id]) }}" class="link">{{ $child->name }} {{ $child->lvl }}</a></td>
                                <td>{{ $child->hp }}</td>
                                <td>{{ $child->attack }}</td>
                                <td>{{ $child->dodge }}</td>
                                <td>{{ $child->armor }}</td>
                                <td>{{ $child->min_dmg }}</td>
                                <td>{{ $child->max_dmg }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
