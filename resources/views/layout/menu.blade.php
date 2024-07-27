<div class="header-menu">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar-top" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbar-top">
                <ul class="nav navbar-nav navbar-left">
                    <li class="@if(request()->route()->getName() == 'maps') active @endif"><a href="{{ route('maps') }}">Карты</a></li>
{{--                    <li><a href="games.html">Games</a>--}}
{{--                        <ul class="submenu">--}}
{{--                            <li><a href="">FIFA 19</a></li>--}}
{{--                            <li><a href="">Counter Strike</a></li>--}}
{{--                            <li><a href="">League of Legends</a></li>--}}
{{--                            <li><a href="">Path of Exile</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                    <li class="@if(request()->route()->getName() == 'monsters') active @endif"><a href="{{ route('monsters') }}">Монстры</a></li>
                    <li class="@if(request()->route()->getName() == 'nps') active @endif"><a href="{{ route('nps') }}">НПС</a></li>
                    <li class="@if(request()->route()->getName() == 'items') active @endif"><a href="{{ route('items') }}">Предметы</a></li>
                    <li class="@if(request()->route()->getName() == 'artifacts') active @endif"><a href="{{ route('artifacts') }}">Артефакты</a></li>
                    <li class="@if(request()->route()->getName() == 'quests') active @endif"><a href="{{ route('quests') }}">Квесты</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right hidden">
                    <li><a href="/">Test</a></li>
                    <li><a href="/">Test</a></li>
                    <li><a href="/">Test</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
