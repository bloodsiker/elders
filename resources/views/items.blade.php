@extends('layout/base')

@section('content')
    <div class="games-items top-line">
        <h4><span>Предмети</span></h4>
        <div class="row equal-height equal-height-child">
            <div class="game-item main-container col-lg-12 col-sm-12 col-xs-12">
                <h3 class="fz-20 mb-20 text-center">Предмети</h3>
                <div class="p-10">
                    <table class="table table-bordered">
                        @foreach($items as $item)
                            <tr style="vertical-align: middle;">
                                <td style="width: 67px"><img src="{{ asset($item->image) }}" alt=""></td>
                                <td style="padding: 19px 10px; font-size: 16px"><a href="{{ route('item.details', ['id' => $item->id]) }}" class="link">{{ $item->name }}</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
