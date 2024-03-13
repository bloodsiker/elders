@extends('layout/base')

@section('content')
    @php
        function buildMenu($locations) {
            $menu = '';
            foreach ($locations as $location) {
                $menu .= $location->parent_id ? '<li>' : '<li class="main-location">';
                $menu .= '<a href="' . route('location', $location->id) . '" class="location-link">' . $location->name . '</a>';

                if ($location->link) {
                    $menu .= '<a href="' . $location->link. '" target="_blank" class="location-link location-link-original">Карта</a>';;
                }

                if ($location->children->count() > 0) {
                    $menu .= '<ul>' . buildMenu($location->children) . '</ul>';
                }

                $menu .= '</li>';
            }
            return $menu;
        }
    @endphp

    <div class="games-items top-line">
        <h4><span>Карты</span></h4>
        <div class="row equal-height equal-height-child">
            <div class="game-item main-container col-lg-12 col-sm-12 col-xs-12">
                <h3 class="fs-20 mb-50 text-center">Карты областей мира Тэйл (игра Skazanie)</h3>

                <div>
                    <ul class="locations">
                        @php
                            echo buildMenu($locations);
                        @endphp
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
