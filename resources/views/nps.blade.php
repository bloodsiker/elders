@extends('layout/base')

@section('content')
    <div class="games-items top-line">
        <h4><span>НПС</span></h4>
        <div class="row equal-height equal-height-child">
            <div class="game-item main-container col-lg-12 col-sm-12 col-xs-12">
                <h3 class="fz-20 mb-20 text-center">НПС</h3>
                <div class="p-10">
                    <table class="table table-bordered">
                        <tr>
                            <th>Имя</th>
                            <th>Номер</th>
                            <th>Локация</th>
                        </tr>
                        @foreach($nps as $item)
                            <tr style="vertical-align: middle;">
                                <td style="padding: 19px 10px; font-size: 16px"><span class="item_name">{{ $item->name }}</span></td>
                                <td style="padding: 19px 10px; font-size: 16px">
                                    <span class="item_name">{{ $item->location_number }}</span>
                                </td>
                                <td style="padding: 19px 10px; font-size: 16px">
                                    @foreach($item->locations as $location)
                                        <a href="{{ route('location', ['id' => $location->id]) }}" class="link underline">{{ $location->name }}</a>@if(!$loop->last), @endif
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
