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
                                    <td style="padding: 10px 10px;">
                                        <a href="{{ route('location', ['id' => $location->id]) }}" class="link">
                                            {{ $location->name }}
                                            @if($location->pivot->number_location)[{{ $location->pivot->number_location }}] @endif
                                        </a>
                                    </td>
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
                @if($item->itemEquipment)
                    <h3 class="fs-20 mb-20 mt-0 text-center">Характеристики</h3>
                    <div class="p-10">
                        <span>Базовое повреждение: <b class="color-blue">{{ $item->itemEquipment->min_attack }}-{{ $item->itemEquipment->max_attack }}</b></span><br>
                        @if($item->itemEquipment->armor)
                            <span>Броня: <b class="color-blue">{{ $item->itemEquipment->armor }}</b></span><br>
                        @endif
                        @if($item->itemEquipment->attack_mag)
                            <span>Магическая атака: <b class="color-blue">{{ $item->itemEquipment->attack_mag }}</b></span><br>
                        @endif
                        @if($item->itemEquipment->dodge)
                            <span>Уворот: <b class="color-blue">{{ $item->itemEquipment->dodge }}</b></span><br>
                        @endif
                        @if($item->itemEquipment->intellect)
                            <span>Интеллект: <b class="color-blue">{{ $item->itemEquipment->intellect }}</b></span><br>
                        @endif
                        @if($item->itemEquipment->mudrost)
                            <span>Мудрость: <b class="color-blue">{{ $item->itemEquipment->mudrost }}</b></span><br>
                        @endif
                        @if($item->itemEquipment->two_hand)
                            <span>Использование: <b class="color-blue">требуются обе руки</b></span><br>
                        @endif

                        <br>

                        @if($item->itemEquipment->minReq())
                            <p>Минимальные требования:</p>
                            <ul style="padding-left: 0">
                                @if($item->itemEquipment->min_str)
                                    <li>- сила: <b class="color-blue">{{ $item->itemEquipment->min_str }}</b></li>
                                @endif
                                @if($item->itemEquipment->min_agility)
                                    <li>- ловкость: <b class="color-blue">{{ $item->itemEquipment->min_agility }}</b></li>
                                @endif
                                @if($item->itemEquipment->min_intellect)
                                    <li>- интеллект: <b class="color-blue">{{ $item->itemEquipment->min_intellect }}</b></li>
                                @endif
                                @if($item->itemEquipment->min_mudrost)
                                    <li>- мудрость: <b class="color-blue">{{ $item->itemEquipment->min_mudrost }}</b></li>
                                @endif
                                @if($item->itemEquipment->skill_lvl)
                                    <li>- навык "{{ $item->itemEquipment->skill->name }}": <b class="color-blue">{{ $item->itemEquipment->skill_lvl }}</b></li>
                                @endif
                            </ul>
                            <br>
                        @endif
                        <span>Вес предмета: <b class="color-blue">{{ $item->itemEquipment->weight }} кг</b></span><br>
                        <span>Тип предмета: <b class="color-blue">{{ $item->itemEquipment->type_string }}</b></span><br>
                        <span>Базовый навык: <b class="color-blue">{{ $item->itemEquipment->skill->name }}</b></span>
                    </div>
                    <br>

                    <div class="top-line mb-20"></div>
                @endif

                @if($item->itemArtifact)
                    <h3 class="fs-20 mb-20 mt-0 text-center">Характеристики</h3>

                    <div class="p-10">
                        @if($item->itemArtifact->lvl)
                            <span>Минимальный уровень: <b class="color-blue">{{ $item->itemArtifact->lvl }}</b></span><br>
                        @endif
                        @if($item->itemArtifact->hp)
                            <span>Здоровье: <b class="color-blue">{{ $item->itemArtifact->lvl }}</b></span><br>
                        @endif
                        @if($item->itemArtifact->armor)
                            <span>Броня: <b class="color-blue">{{ $item->itemArtifact->armor }}</b></span><br>
                        @endif
                        @if($item->itemArtifact->dodge)
                            <span>Уворот: <b class="color-blue">{{ $item->itemArtifact->dodge }}</b></span><br>
                        @endif
                        @if($item->itemArtifact->attack)
                            <span>Атака: <b class="color-blue">{{ $item->itemArtifact->attack }}</b></span><br>
                        @endif
                        @if($item->itemArtifact->attack_mag)
                            <span>Магическая атака: <b class="color-blue">{{ $item->itemArtifact->attack_mag }}</b></span><br>
                        @endif
                        @if($item->itemArtifact->mp)
                            <span>Энергия: <b class="color-blue">{{ $item->itemArtifact->mp }}</b></span><br>
                        @endif
                        @if($item->itemArtifact->intellect)
                            <span>Интелект: <b class="color-blue">{{ $item->itemArtifact->intellect }}</b></span><br>
                        @endif
                        @if($item->itemArtifact->mudrost)
                            <span>Мудрость: <b class="color-blue">{{ $item->itemArtifact->mudrost }}</b></span><br>
                        @endif
                        @if($item->itemArtifact->str)
                            <span>Сила: <b class="color-blue">{{ $item->itemArtifact->str }}</b></span><br>
                        @endif
                        @if($item->itemArtifact->agility)
                            <span>Ловкость: <b class="color-blue">{{ $item->itemArtifact->agility }}</b></span><br>
                        @endif
                    </div>
                    <br>

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
                            @foreach($item->monsters as $itemMonster)
                                <tr style="vertical-align: middle;">
                                    <td style="padding: 10px;"><a href="{{ route('monster', ['id' => $itemMonster->id]) }}" class="link">{{ $itemMonster->name }}</a></td>
                                    <td style="width: 100px;padding: 10px;">{{ $itemMonster->pivot->quantity }}</td>
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

    @if($item->itemEquipment)
        <div class="games-items top-line">
            <h4><span>{{ $item->itemEquipment->skill->name }}</span></h4>

            <div class="row equal-height equal-height-child">
                <div class="game-item main-container col-lg-12 col-sm-12 col-xs-12">
                    <div class="p-10">
                        @if($item->itemEquipment->skill->name === 'Оружие режущее/рассекающее')
                            <table class="table table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th>название</th>
                                    <th>Урон предмета</th>
                                    <th>Средний урон</th>
                                    <th>Дву-ручное</th>
                                    <th>Вес</th>
                                    <th>уровень</th>
                                    <th>сила</th>
                                    <th>ловкость</th>
                                    <th>навык</th>
                                    <th>Цена</th>
                                    <th>Где купить?</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($revelationItems as $equipment)
                                    <tr class="text-center @if($equipment->item->id === $item->id) active_tr @endif">
                                        <td class="text-left"><a href="{{ route('item.details', ['id' => $equipment->id]) }}" class="link">{{ $equipment->item->name }}</a></td>
                                        <td>{{ $equipment->min_attack }}</td>
                                        <td>
                                            @if($equipment->two_hand)
                                                {{ $equipment->min_attack + $equipment->max_attack / 2 }}
                                            @else
                                                {{ $equipment->min_attack + $equipment->max_attack }}
                                            @endif
                                        </td>
                                        <td>{{ $equipment->two_hand ? '+' : '' }}</td>
                                        <td>{{ $equipment->weight }} кг</td>
                                        <td>{{ $equipment->min_lvl ?: '-' }}</td>
                                        <td>{{ $equipment->min_str ?: '-' }}</td>
                                        <td>{{ $equipment->min_agility ?: '-' }}</td>
                                        <td>{{ $equipment->skill_lvl ?: '-' }}</td>
                                        <td>{{ $equipment->price ?: '' }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
