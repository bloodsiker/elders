@extends('layout/base')

@section('content')
    <div class="games-items top-line">
        <h4><span>Монстры</span></h4>
        <div class="row equal-height equal-height-child">
            <div class="game-item main-container col-lg-12 col-sm-12 col-xs-12">
                <h3 class="fs-20 mb-20 text-center">Монстры</h3>
            </div>
            <div class="game-item main-container col-lg-6 col-sm-6 col-xs-12">
                <h3 class="fs-20 mb-20 mt-0 text-center">Обычные</h3>
                <div class="p-10">
                    <table class="table table-bordered">
                        @foreach($monsters as $monster)
                            <tr style="vertical-align: middle;">
                                <td style="padding: 10px; font-size: 16px">
                                    <a href="{{ route('monster', ['id' => $monster->id]) }}" class="link">{{ $monster->name }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="game-item main-container col-lg-6 col-sm-6 col-xs-12">
                <h3 class="fs-20 mb-20 mt-0 text-center">Босы</h3>
                <div class="p-10">
                    <table class="table table-bordered">
                        @foreach($boss as $bossMonster)
                            <tr style="vertical-align: middle;">
                                <td style="padding: 10px; font-size: 16px">
                                    <a href="{{ route('monster', ['id' => $bossMonster->id]) }}" class="link">{{ $bossMonster->name }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
