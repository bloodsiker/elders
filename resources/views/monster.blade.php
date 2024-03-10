@extends('layout/base')

@section('content')
    <div class="games-items top-line">
        <h4><span>Монстр</span></h4>
        <div class="row equal-height equal-height-child">
            <div class="game-item main-container col-lg-12 col-sm-12 col-xs-12">
                <h3 class="fz-20 mb-20 text-center">Монстр
                    <span class="color-blue">{{ $monster->name }}</span>
                    @if($monster->lvl)
                        <span class="color-blue">{{ $monster->lvl }}</span>
                    @endif
                </h3>
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
                        @foreach($monster->children as $child)
                            <tr>
                                <td><a href="{{ route('monster.details', ['id' => $monster->id, 'child_id' => $child->id]) }}" class="link">{{ $child->name }} {{ $child->lvl }}</a></td>
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
