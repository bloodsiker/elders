@extends('layout/base')

@section('content')
    <div class="games-items top-line">
        <h4><span>Предмет</span></h4>
        <div class="row equal-height equal-height-child">
            <div class="game-item main-container col-lg-12 col-sm-12 col-xs-12">
                <h3 class="fz-20 mb-20 text-center">Предмет
                    <span class="color-blue">{{ $item->name }}</span>
                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                </h3>
            </div>
            <div class="game-item main-container col-lg-6 col-sm-6 col-xs-12">
                <h3 class="fz-20 mb-20 mt-0 text-center">Локации где встречаеться предмет</h3>
                <div class="p-10">
                    @if($item->locations->count())
                        <table class="table table-bordered">
                            @foreach($item->locations as $location)
                                <tr style="vertical-align: middle;">
                                    <td style="padding: 19px 10px; font-size: 16px"><a href="{{ route('location', ['id' => $location->id]) }}" class="link">{{ $location->name }}</a></td>
                                    <td style="width: 50px;padding: 19px;font-size: 16px;"><a href="{{ $location->link }}" target="_blank" class="link">Карта</a></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>Нет информации</p>
                    @endif
                </div>
            </div>
            <div class="game-item main-container col-lg-6 col-sm-6 col-xs-12">
                <h3 class="fz-20 mb-20 mt-0 text-center">Дроп с монстров</h3>
                <div class="p-10">
                    @if($item->monsters->count())
                        <table class="table table-bordered">
                            <tr>
                                <th>Монстр</th>
                                <th>Шт</th>
                            </tr>
                            @foreach($item->monsters as $item)
                                <tr style="vertical-align: middle;">
                                    <td style="padding: 10px; font-size: 16px"><a href="{{ route('monster.details', ['id' => $item->parent->id, 'child_id' => $item->id]) }}" class="link">{{ $item->name }} {{ $item->lvl }} лвл</a></td>
                                    <td style="width: 50px;padding: 10px 19px;font-size: 16px;">{{ $item->pivot->quantity }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>Нет дропа</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
