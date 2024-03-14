@extends('layout/base')

@section('content')
    <div class="games-items top-line">
        <h4><span>Предмет</span></h4>
        <div class="row equal-height equal-height-child">
            <div class="game-item main-container col-lg-12 col-sm-12 col-xs-12">
                <h3 class="fs-20 mb-20 text-center">
                    @if($item->itemArtifact)
                        Артефакт
                    @else
                        Предмет
                    @endif
                    <span class="color-blue">{{ $item->name }}</span>
                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                </h3>
            </div>

            @if($item->description)
                <div class="game-item main-container col-lg-12 col-sm-12 col-xs-12">
                    <div class="p-10 text-center">
                        {{ $item->description }}
                    </div>
                </div>
            @endif

            <div class="game-item main-container col-lg-6 col-sm-6 col-xs-12">
                <h3 class="fs-20 mb-20 mt-0 text-center">Локации где встречаеться предмет</h3>
                <div class="p-10">
                    @if($item->locations->count())
                        <table class="table table-bordered">
                            @foreach($item->locations as $location)
                                <tr class="fs-14" style="vertical-align: middle;">
                                    <td style="padding: 10px 10px;"><a href="{{ route('location', ['id' => $location->id]) }}" class="link">{{ $location->name }}</a></td>
                                    <td style="width: 50px;padding: 10px;"><a href="{{ $location->link }}" target="_blank" class="link">Карта</a></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>Нет информации</p>
                    @endif
                </div>
            </div>
            <div class="game-item main-container col-lg-6 col-sm-6 col-xs-12">
                @if($item->itemArtifact)
                    <h3 class="fs-20 mb-20 mt-0 text-center">Характеристики</h3>
                    <div class="p-10">
                        <table class="table table-bordered fs-14">
                            @if($item->itemArtifact->lvl)
                                <tr style="vertical-align: middle;">
                                    <td style="padding: 10px;">Минимальный уровень</td>
                                    <td style="width: 50px;padding: 10px 19px;">{{ $item->itemArtifact->lvl }}</td>
                                </tr>
                            @endif

                            @if($item->itemArtifact->hp)
                                <tr style="vertical-align: middle;">
                                    <td style="padding: 10px;">Здоровье</td>
                                    <td style="width: 50px;padding: 10px 19px">{{ $item->itemArtifact->hp }}</td>
                                </tr>
                            @endif

                            @if($item->itemArtifact->armor)
                                <tr style="vertical-align: middle;">
                                    <td style="padding: 10px;">Броня</td>
                                    <td style="width: 50px;padding: 10px 19px">{{ $item->itemArtifact->armor }}</td>
                                </tr>
                            @endif

                            @if($item->itemArtifact->dodge)
                                <tr style="vertical-align: middle;">
                                    <td style="padding: 10px;">Уворот</td>
                                    <td style="width: 50px;padding: 10px 19px;">{{ $item->itemArtifact->dodge }}</td>
                                </tr>
                            @endif

                            @if($item->itemArtifact->attack)
                                <tr style="vertical-align: middle;">
                                    <td style="padding: 10px;">Атака</td>
                                    <td style="width: 50px;padding: 10px 19px">{{ $item->itemArtifact->attack }}</td>
                                </tr>
                            @endif

                            @if($item->itemArtifact->attack_mag)
                                <tr style="vertical-align: middle;">
                                    <td style="padding: 10px;">Магическая атака</td>
                                    <td style="width: 50px;padding: 10px 19px;">{{ $item->itemArtifact->attack_mag }}</td>
                                </tr>
                            @endif

                            @if($item->itemArtifact->mp)
                                <tr style="vertical-align: middle;">
                                    <td style="padding: 10px;">Энергия</td>
                                    <td style="width: 50px;padding: 10px 19px">{{ $item->itemArtifact->mp }}</td>
                                </tr>
                            @endif

                            @if($item->itemArtifact->intellect)
                                <tr style="vertical-align: middle;">
                                    <td style="padding: 10px;">Интелект</td>
                                    <td style="width: 50px;padding: 10px 19px;">{{ $item->itemArtifact->intellect }}</td>
                                </tr>
                            @endif

                            @if($item->itemArtifact->mudrost)
                                <tr style="vertical-align: middle;">
                                    <td style="padding: 10px;">Мудрость</td>
                                    <td style="width: 50px;padding: 10px 19px;">{{ $item->itemArtifact->mudrost }}</td>
                                </tr>
                            @endif

                            @if($item->itemArtifact->str)
                                <tr style="vertical-align: middle;">
                                    <td style="padding: 10px;">Сила</td>
                                    <td style="width: 50px;padding: 10px 19px;">{{ $item->itemArtifact->str }}</td>
                                </tr>
                            @endif

                            @if($item->itemArtifact->agility)
                                <tr style="vertical-align: middle;">
                                    <td style="padding: 10px;">Ловкость</td>
                                    <td style="width: 50px;padding: 10px 19px;">{{ $item->itemArtifact->agility }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>

                    <div class="top-line mb-20"></div>
                @endif

                @if($item->items->count())
                    <h3 class="fs-20 mb-20 mt-0 text-center">Может содержитать предметы</h3>
                    <div class="p-10">
                        <table class="table table-bordered">
                            <tr>
                                <th>Предмет</th>
                                <th>Шт</th>
                            </tr>
                            @foreach($item->items as $relationItem)
                                <tr class="fs-14" style="vertical-align: middle;">
                                    <td style="padding: 10px;"><a href="{{ route('item.details', ['id' => $relationItem->id]) }}" class="link">{{ $relationItem->name }}</a></td>
                                    <td style="width: 120px;padding: 10px 19px;">{{ $relationItem->pivot->quantity }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="top-line mb-20"></div>
                @endif

                @if($item->parent_items->count())
                    <h3 class="fs-20 mb-20 mt-0 text-center">Можна найти в предметах</h3>
                    <div class="p-10">
                        <table class="table table-bordered">
                            @foreach($item->parent_items as $parentItem)
                                <tr style="vertical-align: middle;">
                                    <td style="width: 67px"><img src="{{ asset($parentItem->item->image) }}" alt=""></td>
                                    <td style="padding: 19px 10px; font-size: 16px"><a href="{{ route('item.details', ['id' => $parentItem->item->id]) }}" class="link">{{ $parentItem->item->name }}</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="top-line mb-20"></div>
                @endif

                <h3 class="fs-20 mb-20 mt-0 text-center">Дроп с монстров</h3>
                <div class="p-10">
                    @if($item->monsters->count())
                        <table class="table table-bordered fs-14">
                            <tr>
                                <th>Монстр</th>
                                <th>Шт</th>
                            </tr>
                            @foreach($item->monsters as $item)
                                <tr style="vertical-align: middle;">
                                    <td style="padding: 10px;"><a href="{{ route('monster', ['id' => $item->id]) }}" class="link">{{ $item->name }}</a></td>
                                    <td style="width: 50px;padding: 10px 19px;">{{ $item->pivot->quantity }}</td>
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
