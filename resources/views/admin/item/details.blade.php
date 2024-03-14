@extends('../layout/' . $layout)

@section('subhead')
    <title>Item</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12">
                    @if (session()->has('success'))
                        <div class="alert show alert-success mb-4">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <div class="col-span-12 mt-5">
                        <div class="intro-y block sm:flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Локации
                            </h2>
                            <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                <a href="javascript:;" class="btn btn-success box flex items-center text-gray-700 dark:text-gray-300" data-toggle="modal" data-target="#addLocation">
                                    Добавить локацию
                                </a>
                            </div>
                        </div>
                        <hr class="mt-5 mb-5" style="border-bottom: 1px solid #e2e8f0">
                        <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                            <table class="table table-report sm:mt-2">
                                <thead>
                                <tr>
                                    <th class="whitespace-nowrap">ID</th>
                                    <th class="whitespace-nowrap">Назва</th>
                                    <th class="whitespace-nowrap">Количество</th>
                                    <th class="text-center whitespace-nowrap"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($item->locations as $location)
                                    <tr class="intro-x">
                                        <td class="w-40">
                                            <div class="flex">
                                                <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ $location->id }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript:;" data-id="{{ $location->id }}" data-toggle="modal" data-target="#editTransaction" class="font-medium whitespace-nowrap transaction-edit">
                                                @if($location->parent)
                                                    [{{ $location->parent->name }}]
                                                @endif
                                                {{ $location->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ $location->pivot->quantity }}</div>
                                        </td>
                                        <td class="w-5 table-report__action">
                                            <a class="flex items-center text-theme-6" href="{{ route('admin.item.delete_location', ['id' => $item->id, 'location_id' => $location->id]) }}">
                                                <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="col-span-12 mt-5">
                        <div class="intro-y block sm:flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Монстры
                            </h2>
                            <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                <a href="javascript:;" class="btn btn-success box flex items-center text-gray-700 dark:text-gray-300" data-toggle="modal" data-target="#addMonster">
                                    Добавить монстра
                                </a>
                            </div>
                        </div>
                        <hr class="mt-5 mb-5" style="border-bottom: 1px solid #e2e8f0">
                        <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                            <table class="table table-report sm:mt-2">
                                <thead>
                                <tr>
                                    <th class="whitespace-nowrap">ID</th>
                                    <th class="whitespace-nowrap">Назва</th>
                                    <th class="whitespace-nowrap">LVL</th>
                                    <th class="whitespace-nowrap">Количество</th>
                                    <th class="text-center whitespace-nowrap"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($item->monsters as $monster)
                                    <tr class="intro-x">
                                        <td class="w-40">
                                            <div class="flex">
                                                <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ $monster->id }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript:;" data-id="{{ $monster->id }}" data-toggle="modal" data-target="#editTransaction" class="font-medium whitespace-nowrap transaction-edit">{{ $monster->name }}</a>
                                        </td>
                                        <td>
                                            <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ $monster->lvl }}</div>
                                        </td>
                                        <td>
                                            <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ $monster->pivot->quantity }}</div>
                                        </td>
                                        <td class="w-5 table-report__action">
                                            <a class="flex items-center text-theme-6" href="{{ route('admin.item.delete_monster', ['id' => $item->id, 'monster_id' => $monster->id]) }}">
                                                <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-span-12 mt-5">
                        <div class="intro-y block sm:flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Содержит предметы
                            </h2>
                            <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                <a href="javascript:;" class="btn btn-success box flex items-center text-gray-700 dark:text-gray-300" data-toggle="modal" data-target="#addItem">
                                    Добавить предмет
                                </a>
                            </div>
                        </div>
                        <hr class="mt-5 mb-5" style="border-bottom: 1px solid #e2e8f0">
                        <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                            <table class="table table-report sm:mt-2">
                                <thead>
                                <tr>
                                    <th class="whitespace-nowrap">ID</th>
                                    <th class="whitespace-nowrap">Назва</th>
                                    <th class="whitespace-nowrap">Количество</th>
                                    <th class="text-center whitespace-nowrap"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($item->items as $childItem)
                                    <tr class="intro-x">
                                        <td class="w-40">
                                            <div class="flex">
                                                <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ $childItem->id }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript:;" data-id="{{ $childItem->id }}" data-toggle="modal" data-target="#editTransaction" class="font-medium whitespace-nowrap transaction-edit">
                                                {{ $childItem->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ $childItem->pivot->quantity }}</div>
                                        </td>
                                        <td class="w-5 table-report__action">
                                            <a class="flex items-center text-theme-6" href="{{ route('admin.item.delete_item', ['id' => $item->id, 'item_id' => $childItem->id]) }}">
                                                <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
            </div>
        </div>

        <div class="col-span-12 xxl:col-span-3">
            <div class="xxl:border-l border-theme-5 -mb-10 pb-10">
                <div class="xxl:pl-6 grid grid-cols-12 gap-6">
                    <!-- BEGIN: Transactions -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 xxl:col-span-12 mt-3 xxl:mt-6">
                        <div class="mt-5">
                            <div class="intro-x">
                                <a href="javascript:;" class="budget-edit" data-category-id="" data-toggle="modal" data-target="#editBudget">
                                    <div class="box px-3 py-3 mb-3 flex items-center zoom-in ">
                                        <div class="">
                                            <div class="text-gray-600 text-xs mt-0.5">Имя</div>
                                            <div class="font-medium">{{ $item->name }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="intro-x">
                                <a href="javascript:;" class="budget-edit" data-category-id="" data-toggle="modal" data-target="#editBudget">
                                    <div class="box px-3 py-3 mb-3 flex items-center zoom-in ">
                                        <div class="">
                                            <div class="text-gray-600 text-xs mt-0.5">Тип</div>
                                            <div class="font-medium">{{ $item->type }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="intro-x">
                                <a href="javascript:;" class="budget-edit" data-category-id="" data-toggle="modal" data-target="#editBudget">
                                    <div class="box px-3 py-3 mb-3 flex items-center zoom-in ">
                                        <div class="">
                                            <div class="text-gray-600 text-xs mt-0.5">Описание</div>
                                            <div class="font-medium">{{ $item->description }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="intro-x flex items-center h-10 mt-5">
                            <h2 class="text-lg font-medium truncate mr-5">Артефакт</h2>
                            <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                <a href="javascript:;" class="btn btn-success box flex items-center text-gray-700 dark:text-gray-300" data-toggle="modal" data-target="#addArtefact">
                                    Добавить
                                </a>
                            </div>
                        </div>

                        <div class="mt-5">
                            @if($item->itemArtifact?->lvl)
                                <div class="intro-x">
                                    <a href="javascript:;" class="budget-edit">
                                        <div class="box px-3 py-3 mb-3 flex items-center zoom-in ">
                                            <div class="">
                                                <div class="text-gray-600 text-xs mt-0.5">Уровень</div>
                                                <div class="font-medium">{{ $item->itemArtifact?->lvl }}</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            @if($item->itemArtifact?->hp)
                                <div class="intro-x">
                                    <a href="javascript:;" class="budget-edit">
                                        <div class="box px-3 py-3 mb-3 flex items-center zoom-in ">
                                            <div class="">
                                                <div class="text-gray-600 text-xs mt-0.5">Здоровье</div>
                                                <div class="font-medium">{{ $item->itemArtifact?->hp }}</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            @if($item->itemArtifact?->armor)
                                <div class="intro-x">
                                    <a href="javascript:;" class="budget-edit">
                                        <div class="box px-3 py-3 mb-3 flex items-center zoom-in ">
                                            <div class="">
                                                <div class="text-gray-600 text-xs mt-0.5">Броня</div>
                                                <div class="font-medium">{{ $item->itemArtifact?->armor }}</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            @if($item->itemArtifact?->dodge)
                                <div class="intro-x">
                                    <a href="javascript:;" class="budget-edit">
                                        <div class="box px-3 py-3 mb-3 flex items-center zoom-in ">
                                            <div class="">
                                                <div class="text-gray-600 text-xs mt-0.5">Уворот</div>
                                                <div class="font-medium">{{ $item->itemArtifact?->dodge }}</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            @if($item->itemArtifact?->attack)
                                <div class="intro-x">
                                    <a href="javascript:;" class="budget-edit">
                                        <div class="box px-3 py-3 mb-3 flex items-center zoom-in ">
                                            <div class="">
                                                <div class="text-gray-600 text-xs mt-0.5">Атака</div>
                                                <div class="font-medium">{{ $item->itemArtifact?->attack }}</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            @if($item->itemArtifact?->attack_mag)
                                <div class="intro-x">
                                    <a href="javascript:;" class="budget-edit">
                                        <div class="box px-3 py-3 mb-3 flex items-center zoom-in ">
                                            <div class="">
                                                <div class="text-gray-600 text-xs mt-0.5">Магическая атака</div>
                                                <div class="font-medium">{{ $item->itemArtifact?->attack_mag }}</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            @if($item->itemArtifact?->mp)
                                <div class="intro-x">
                                    <a href="javascript:;" class="budget-edit">
                                        <div class="box px-3 py-3 mb-3 flex items-center zoom-in ">
                                            <div class="">
                                                <div class="text-gray-600 text-xs mt-0.5">Энергия</div>
                                                <div class="font-medium">{{ $item->itemArtifact?->mp }}</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            @if($item->itemArtifact?->intellect)
                                <div class="intro-x">
                                    <a href="javascript:;" class="budget-edit">
                                        <div class="box px-3 py-3 mb-3 flex items-center zoom-in ">
                                            <div class="">
                                                <div class="text-gray-600 text-xs mt-0.5">Интелект</div>
                                                <div class="font-medium">{{ $item->itemArtifact?->intellect }}</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            @if($item->itemArtifact?->mudrost)
                                <div class="intro-x">
                                    <a href="javascript:;" class="budget-edit">
                                        <div class="box px-3 py-3 mb-3 flex items-center zoom-in ">
                                            <div class="">
                                                <div class="text-gray-600 text-xs mt-0.5">Мудрость</div>
                                                <div class="font-medium">{{ $item->itemArtifact?->mudrost }}</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            @if($item->itemArtifact?->str)
                                <div class="intro-x">
                                    <a href="javascript:;" class="budget-edit">
                                        <div class="box px-3 py-3 mb-3 flex items-center zoom-in ">
                                            <div class="">
                                                <div class="text-gray-600 text-xs mt-0.5">Сила</div>
                                                <div class="font-medium">{{ $item->itemArtifact?->str }}</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            @if($item->itemArtifact?->agility)
                                <div class="intro-x">
                                    <a href="javascript:;" class="budget-edit">
                                        <div class="box px-3 py-3 mb-3 flex items-center zoom-in ">
                                            <div class="">
                                                <div class="text-gray-600 text-xs mt-0.5">Ловкость</div>
                                                <div class="font-medium">{{ $item->itemArtifact?->agility }}</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        </div>

                    </div>
                    <!-- END: Transactions -->
                </div>
            </div>
        </div>
    </div>

    <div id="addLocation" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.item.add_location', ['id' => $item->id]) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Добавить локацию</h2>
                    </div>
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="location_id" class="form-label">Категорія</label>
                            <select class="form-select select2" name="location_id" id="location_id">
                                @foreach($locations as $location)
                                    <option value="{{ $location->id }}">
                                        @if($location->parent)
                                            [{{ $location->parent->name }}]
                                        @endif
                                        {{ $location->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="quantity" class="form-label">Количество</label>
                            <input id="quantity" type="text" class="form-control" name="quantity" value="1" placeholder="1">
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button class="btn btn-primary w-20">Додати</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="addMonster" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.item.add_monster', ['id' => $item->id]) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Добавить монстра</h2>
                    </div>
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="monster_id" class="form-label">Монстр</label>
                            <select class="form-select select2" name="monster_id" id="monster_id">
                                @foreach($monsters as $monster)
                                    <option value="{{ $monster->id }}">{{ $monster->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="quantity" class="form-label">Количество</label>
                            <input id="quantity" type="text" class="form-control" name="quantity" value="1" placeholder="1">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <input checked id="all" type="checkbox" class="custom-checkbox" name="all" value="1">
                            <label for="all" class="form-label">Добавить для всех</label>
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button class="btn btn-primary w-20">Додати</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="addItem" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.item.add_item', ['id' => $item->id]) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Добавить предмет</h2>
                    </div>
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="item_id" class="form-label">Категорія</label>
                            <select class="form-select select2" name="item_id" id="item_id">
                                @foreach($items as $itemRelation)
                                    <option value="{{ $itemRelation->id }}">
                                        {{ $itemRelation->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="quantity" class="form-label">Количество</label>
                            <input id="quantity" type="text" class="form-control" name="quantity" value="1" placeholder="1">
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button class="btn btn-primary w-20">Додати</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="addArtefact" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.item.add_artifact', ['id' => $item->id]) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Добавить артефакт</h2>
                    </div>
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="lvl" class="form-label">Уровень</label>
                            <input id="lvl" type="text" class="form-control" name="lvl" value="{{ $item->itemArtifact?->lvl }}" placeholder="1" required>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="hp" class="form-label">Здоровье</label>
                            <input id="hp" type="text" class="form-control" name="hp" value="{{ $item->itemArtifact?->hp }}" placeholder="2000">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="armor" class="form-label">Броня</label>
                            <input id="armor" type="text" class="form-control" value="{{ $item->itemArtifact?->armor }}" name="armor" placeholder="2000">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="dodge" class="form-label">Уворот</label>
                            <input id="dodge" type="text" class="form-control" value="{{ $item->itemArtifact?->dodge }}" name="dodge" placeholder="2000">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="attack" class="form-label">Атака</label>
                            <input id="attack" type="text" class="form-control" value="{{ $item->itemArtifact?->attack }}" name="attack" placeholder="2000">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="attack_mag" class="form-label">Магическая атака</label>
                            <input id="attack_mag" type="text" class="form-control" value="{{ $item->itemArtifact?->attack_mag }}" name="attack_mag" placeholder="2000">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="mp" class="form-label">Энергия</label>
                            <input id="mp" type="text" class="form-control" name="mp" value="{{ $item->itemArtifact?->mp }}" placeholder="2000">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="intellect" class="form-label">Интелект</label>
                            <input id="intellect" type="text" class="form-control" value="{{ $item->itemArtifact?->intellect }}" name="intellect" placeholder="2000">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="mudrost" class="form-label">Мудрость</label>
                            <input id="mudrost" type="text" class="form-control" value="{{ $item->itemArtifact?->mudrost }}" name="mudrost" placeholder="2000">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="str" class="form-label">Сила</label>
                            <input id="str" type="text" class="form-control" value="{{ $item->itemArtifact?->str }}" name="str" placeholder="2000">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="agility" class="form-label">Ловкость</label>
                            <input id="agility" type="text" class="form-control" value="{{ $item->itemArtifact?->agility }}" name="agility" placeholder="2000">
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button class="btn btn-primary w-20">Додати</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="editBudget" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Змінити бюджет <b class="category-name"></b></h2>
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="edit_budget" class="form-label">Бюджет</label>
                            <input id="edit_budget" type="number" class="form-control" name="budget" placeholder="2000" required>
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button class="btn btn-primary w-20">Змінити</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('footer_scripts')
    <script>

        $(document).on('click', '.budget-edit', function () {
            let monthId = '1';
            let categoryId = $(this).data('category-id');

            $.ajax({
                method: "POST",
                url: '',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: { month_id: monthId, category_id: categoryId}
            }).done(function (response) {
                $('#edit_budget').val(response.budget);
                $('#edit_category_id').val(categoryId);
                $('.category-name').text(response.category.name)
            });
        })

        $(document).on('click', '.transaction-edit', function () {
            let transactionId = $(this).data('id');

            $.ajax({
                method: "POST",
                url: '',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: { id: transactionId}
            }).done(function (response) {
                $('#edit_transaction_id').val(transactionId);
                $('#edit_category').val(response.category_id);
                $('#edit_title').val(response.title);
                $('#edit_amount').val(response.amount);
                $('#edit_type').val(response.type);
                var date = new Date(response.created_at);
                $('#edit_created_at').val(date.toISOString().slice(0,16));
            });
        })
    </script>
@endpush
