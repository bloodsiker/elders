@extends('../layout/' . $layout)

@section('subhead')
    <title>Процес реєстрації</title>
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
                                {{ $monster->name }}
                            </h2>
                            <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                <a href="javascript:;" class="btn btn-success box flex items-center text-gray-700 dark:text-gray-300" data-toggle="modal" data-target="#addMonster">
                                    Добавить лвл монстра
                                </a>
                            </div>
                        </div>
                        <hr class="mt-5 mb-5" style="border-bottom: 1px solid #e2e8f0">
                        <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                            <table class="table table-report sm:mt-2">
                                <thead>
                                <tr>
                                    <th class="whitespace-nowrap">ID</th>
                                    <th class="whitespace-nowrap">Image</th>
                                    <th class="whitespace-nowrap">LVL</th>
                                    <th class="whitespace-nowrap">HP</th>
                                    <th class="whitespace-nowrap">Атака</th>
                                    <th class="whitespace-nowrap">Уворот</th>
                                    <th class="whitespace-nowrap">Бронь</th>
                                    <th class="whitespace-nowrap">Мин атак</th>
                                    <th class="whitespace-nowrap">Макс атак</th>
                                    <th class="text-center whitespace-nowrap"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($monster->children as $child)
                                    <tr class="intro-x">
                                        <td>
                                            <div class="flex">
                                                <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ $child->id }}</div>
                                            </div>
                                        </td>
                                        <td class="w-40">
                                            <div class="flex">
                                                <div class="mt-0.5">
                                                    <a href="javascript:;" data-toggle="modal" class="monster-edit" data-id="{{ $child->id }}" data-target="#editMonster">
                                                        <img src="{{ asset($child->image) }}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-center">{{ $child->lvl }}</td>
                                        <td class="text-center">{{ $child->hp }}</td>
                                        <td class="text-center">{{ $child->attack }}</td>
                                        <td class="text-center">{{ $child->dodge }}</td>
                                        <td class="text-center">{{ $child->armor }}</td>
                                        <td class="text-center">{{ $child->min_dmg }}</td>
                                        <td class="text-center">{{ $child->max_dmg }}</td>
                                        <td class="w-5 table-report__action">
                                            <a class="flex items-center text-theme-6" href="{{ route('admin.monster.delete', ['id' => $child->id]) }}">
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
                                            <div class="font-medium">{{ $monster->name }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="intro-x">
                                <a href="javascript:;" class="budget-edit" data-category-id="" data-toggle="modal" data-target="#editBudget">
                                    <div class="box px-3 py-3 mb-3 flex items-center zoom-in ">
                                        <div class="">
                                            <div class="text-gray-600 text-xs mt-0.5">Босс</div>
                                            <div class="font-medium">{{ $monster->is_boss ? 'Да' : 'Нет' }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="addMonster" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.monster.add', ['id' => $monster->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Добавить лвл</h2>
                    </div>
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="lvl" class="form-label">LVL</label>
                            <input id="lvl" type="text" class="form-control" name="lvl" placeholder="1" required>
                        </div>

                        <div class="col-span-12 sm:col-span-12">
                            <label for="min_dmg" class="form-label">Мин атака</label>
                            <input id="min_dmg" type="text" class="form-control" name="min_dmg" placeholder="250">
                        </div>

                        <div class="col-span-12 sm:col-span-12">
                            <label for="max_dmg" class="form-label">Макс атака</label>
                            <input id="max_dmg" type="text" class="form-control" name="max_dmg" placeholder="250">
                        </div>

                        <div class="col-span-12 sm:col-span-12">
                            <label for="hp" class="form-label">HP</label>
                            <input id="hp" type="text" class="form-control" name="hp" placeholder="250" required>
                        </div>

                        <div class="col-span-12 sm:col-span-12">
                            <label for="attack" class="form-label">Атака</label>
                            <input id="attack" type="text" class="form-control" name="attack" placeholder="250" required>
                        </div>

                        <div class="col-span-12 sm:col-span-12">
                            <label for="dodge" class="form-label">Уворот</label>
                            <input id="dodge" type="text" class="form-control" name="dodge" placeholder="250" required>
                        </div>

                        <div class="col-span-12 sm:col-span-12">
                            <label for="armor" class="form-label">Бронь</label>
                            <input id="armor" type="text" class="form-control" name="armor" placeholder="250" required>
                        </div>

                        <div class="col-span-12 sm:col-span-12">
                            <label for="image" class="form-label">Картинка</label>
                            <input id="image" type="file" class="form-control" name="image">
                        </div>

                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button class="btn btn-primary w-20">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="editMonster" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.monster.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Добавить лвл</h2>
                    </div>
                    <input type="hidden" id="edit_monster_id" name="id">
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="edit_lvl" class="form-label">LVL</label>
                            <input id="edit_lvl" type="text" class="form-control" name="lvl" placeholder="1" required>
                        </div>

                        <div class="col-span-12 sm:col-span-12">
                            <label for="edit_min_dmg" class="form-label">Мин атака</label>
                            <input id="edit_min_dmg" type="text" class="form-control" name="min_dmg" placeholder="250">
                        </div>

                        <div class="col-span-12 sm:col-span-12">
                            <label for="edit_max_dmg" class="form-label">Макс атака</label>
                            <input id="edit_max_dmg" type="text" class="form-control" name="max_dmg" placeholder="250">
                        </div>

                        <div class="col-span-12 sm:col-span-12">
                            <label for="edit_hp" class="form-label">HP</label>
                            <input id="edit_hp" type="text" class="form-control" name="hp" placeholder="250" required>
                        </div>

                        <div class="col-span-12 sm:col-span-12">
                            <label for="edit_attack" class="form-label">Атака</label>
                            <input id="edit_attack" type="text" class="form-control" name="attack" placeholder="250" required>
                        </div>

                        <div class="col-span-12 sm:col-span-12">
                            <label for="edit_dodge" class="form-label">Уворот</label>
                            <input id="edit_dodge" type="text" class="form-control" name="dodge" placeholder="250" required>
                        </div>

                        <div class="col-span-12 sm:col-span-12">
                            <label for="edit_armor" class="form-label">Бронь</label>
                            <input id="edit_armor" type="text" class="form-control" name="armor" placeholder="250" required>
                        </div>

                        <div class="col-span-12 sm:col-span-12">
                            <label for="edit_image" class="form-label">Картинка</label>
                            <input id="edit_image" type="file" class="form-control" name="image">
                        </div>

                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button class="btn btn-primary w-20">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')
    <script>
        $(document).on('click', '.monster-edit', function () {
            let monsterId = $(this).data('id');

            $.ajax({
                method: "POST",
                url: '{{ route('admin.monster.get') }}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: { id: monsterId}
            }).done(function (response) {
                $('#edit_monster_id').val(monsterId);
                $('#edit_lvl').val(response.lvl);
                $('#edit_min_dmg').val(response.min_dmg);
                $('#edit_max_dmg').val(response.max_dmg);
                $('#edit_hp').val(response.hp);
                $('#edit_attack').val(response.attack);
                $('#edit_dodge').val(response.dodge);
                $('#edit_armor').val(response.armor);
            });
        })
    </script>
@endpush
