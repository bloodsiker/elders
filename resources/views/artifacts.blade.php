@extends('layout/base')

@section('content')
    <div class="games-items top-line">
        <h4><span>Артефакты</span></h4>
        <div class="row equal-height equal-height-child">
            <div class="game-item main-container col-lg-12 col-sm-12 col-xs-12">
                <h3 class="fs-20 mb-20 text-center">Артефакты</h3>
            </div>
            <div class="game-item main-container col-lg-6 col-sm-6 col-xs-12">
                <h3 class="fs-20 mb-20 mt-0 text-center">Игровые</h3>
                <div class="p-10">
                    <table class="table table-bordered">
                        <tr>
                            <th></th>
                            <th>Предмет</th>
                            <th>Бонус</th>
                            <th class="text-center">Мин. уровень</th>
                        </tr>
                        @foreach($artifacts as $artifact)
                            @if($artifact->itemArtifact->premium == 0)
                                <tr class="fs-14" style="vertical-align: middle;">
                                    <td style="width: 67px"><img src="{{ asset($artifact->image) }}" alt=""></td>
                                    <td style="padding: 10px;">
                                        <a href="{{ route('item.details', ['id' => $artifact->id]) }}" class="link">{{ $artifact->name }}</a>
                                    </td>
                                    <td style="padding: 10px; width: 190px">
                                        <div>
                                            @if($artifact->itemArtifact->hp)
                                                <span>Здоровье: <b class="color-blue">{{ $artifact->itemArtifact->lvl }}</b></span><br>
                                            @endif
                                            @if($artifact->itemArtifact->armor)
                                                <span>Броня: <b class="color-blue">{{ $artifact->itemArtifact->armor }}</b></span><br>
                                            @endif
                                            @if($artifact->itemArtifact->dodge)
                                                <span>Уворот: <b class="color-blue">{{ $artifact->itemArtifact->dodge }}</b></span><br>
                                            @endif
                                            @if($artifact->itemArtifact->attack)
                                                <span>Атака: <b class="color-blue">{{ $artifact->itemArtifact->attack }}</b></span><br>
                                            @endif
                                            @if($artifact->itemArtifact->attack_mag)
                                                <span>Магическая атака: <b class="color-blue">{{ $artifact->itemArtifact->attack_mag }}</b></span><br>
                                            @endif
                                            @if($artifact->itemArtifact->mp)
                                                <span>Энергия: <b class="color-blue">{{ $artifact->itemArtifact->mp }}</b></span><br>
                                            @endif
                                            @if($artifact->itemArtifact->intellect)
                                                <span>Интелект: <b class="color-blue">{{ $artifact->itemArtifact->intellect }}</b></span><br>
                                            @endif
                                            @if($artifact->itemArtifact->mudrost)
                                                <span>Мудрость: <b class="color-blue">{{ $artifact->itemArtifact->mudrost }}</b></span><br>
                                            @endif
                                            @if($artifact->itemArtifact->str)
                                                <span>Сила: <b class="color-blue">{{ $artifact->itemArtifact->str }}</b></span><br>
                                            @endif
                                            @if($artifact->itemArtifact->agility)
                                                <span>Ловкость: <b class="color-blue">{{ $artifact->itemArtifact->agility }}</b></span><br>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-center" style="padding: 10px;">
                                        {{ $artifact->itemArtifact->lvl }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="game-item main-container col-lg-6 col-sm-6 col-xs-12">
                <h3 class="fs-20 mb-20 mt-0 text-center">Премиум</h3>
                <div class="p-10">
                    <table class="table table-bordered">
                        <tr>
                            <th></th>
                            <th>Предмет</th>
                            <th>Бонус</th>
                            <th class="text-center">Мин. уровень</th>
                        </tr>
                        @foreach($artifacts as $artifact)
                            @if($artifact->itemArtifact->premium == 1)
                                <tr class="fs-14" style="vertical-align: middle;">
                                    <td style="width: 67px"><img src="{{ asset($artifact->image) }}" alt=""></td>
                                    <td style="padding: 10px;">
                                        <a href="{{ route('item.details', ['id' => $artifact->id]) }}" class="link">{{ $artifact->name }}</a>
                                    </td>
                                    <td style="padding: 10px; width: 190px">
                                        <div>
                                            @if($artifact->itemArtifact->hp)
                                                <span>Здоровье: <b class="color-blue">{{ $artifact->itemArtifact->lvl }}</b></span><br>
                                            @endif
                                            @if($artifact->itemArtifact->armor)
                                                <span>Броня: <b class="color-blue">{{ $artifact->itemArtifact->armor }}</b></span><br>
                                            @endif
                                            @if($artifact->itemArtifact->dodge)
                                                <span>Уворот: <b class="color-blue">{{ $artifact->itemArtifact->dodge }}</b></span><br>
                                            @endif
                                            @if($artifact->itemArtifact->attack)
                                                <span>Атака: <b class="color-blue">{{ $artifact->itemArtifact->attack }}</b></span><br>
                                            @endif
                                            @if($artifact->itemArtifact->attack_mag)
                                                <span>Магическая атака: <b class="color-blue">{{ $artifact->itemArtifact->attack_mag }}</b></span><br>
                                            @endif
                                            @if($artifact->itemArtifact->mp)
                                                <span>Энергия: <b class="color-blue">{{ $artifact->itemArtifact->mp }}</b></span><br>
                                            @endif
                                            @if($artifact->itemArtifact->intellect)
                                                <span>Интелект: <b class="color-blue">{{ $artifact->itemArtifact->intellect }}</b></span><br>
                                            @endif
                                            @if($artifact->itemArtifact->mudrost)
                                                <span>Мудрость: <b class="color-blue">{{ $artifact->itemArtifact->mudrost }}</b></span><br>
                                            @endif
                                            @if($artifact->itemArtifact->str)
                                                <span>Сила: <b class="color-blue">{{ $artifact->itemArtifact->str }}</b></span><br>
                                            @endif
                                            @if($artifact->itemArtifact->agility)
                                                <span>Ловкость: <b class="color-blue">{{ $artifact->itemArtifact->agility }}</b></span><br>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-center" style="padding: 10px;">
                                        {{ $artifact->itemArtifact->lvl }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
