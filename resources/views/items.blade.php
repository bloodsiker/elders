@extends('layout/base')

@section('content')
    <div class="games-items top-line">
        <h4><span>Предмети</span></h4>

        <div class="row equal-height equal-height-child filter-holder">
            <div class="main-container col-lg-6 col-sm-6 col-xs-12">
                <label>Поиск</label>
                <input type="text" id="searchFilterItems" class="form-control item-search" placeholder="Рубин">
            </div>

            <div class="main-container col-lg-6 col-sm-6 col-xs-12">
                <label>Категории предметов</label>
                <select class="item-filter" id="selectFilterItems" data-placeholder="Select a category">
                    <option value="all">Все</option>
                    <option value="resource">Ресурсы</option>
                    <option value="armor">Броня</option>
                    <option value="artifact">Артефакты</option>
                    <option value="weapon">Оружие</option>
                    <option value="quest">Квестовые</option>
                    <option value="key">Ключи</option>
                </select>
            </div>

            <div class="game-item main-container col-lg-12 col-sm-12 col-xs-12">
                <div class="p-10">
                    <table class="table table-bordered table-items">
                        @foreach($items as $item)
                            <tr style="vertical-align: middle;" data-type="{{ $item->type }}" data-name="{{ strtolower($item->name) }}">
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

@push('footer_scripts')
    <script>
        $('#selectFilterItems').on('change', function() {
            var selectedValue = $(this).val();
            $('.table-items tr').show();

            if (selectedValue === 'all') {
                return;
            }
            $('.table-items tr').filter(function() {
                var type = $(this).data('type');
                return type !== selectedValue;
            }).hide();
        });

        $('#searchFilterItems').on('input', function() {
            var searchValue = $(this).val().toLowerCase();
            if (searchValue === '') {
                $('.table-items tr').show();
                return;
            }
            $('.table-items tr').filter(function() {
                var name = $(this).data('name').toLowerCase();
                return !name.includes(searchValue);
            }).hide();
        });
    </script>
@endpush
