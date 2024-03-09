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
                                {{ $nps->name }}
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
                                    <th class="text-center whitespace-nowrap"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($nps->locations as $location)
                                    <tr class="intro-x">
                                        <td class="w-40">
                                            <a href="javascript:;" data-id="{{ $location->id }}" data-toggle="modal" data-target="#editTransaction" class="font-medium whitespace-nowrap transaction-edit">{{ $location->id }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.location.nps', ['id' => $location->id]) }}" class="font-medium whitespace-nowrap transaction-edit">
                                                @if($location->parent)
                                                    [{{ $location->parent->name }}]
                                                @endif
                                                {{ $location->name }}
                                            </a>
                                        </td>
                                        <td class="w-5 table-report__action">
                                            <a class="flex items-center text-theme-6" href="{{ route('admin.nps.delete_location', ['id' => $nps->id, 'location_id' => $location->id]) }}">
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
                                            <div class="font-medium">{{ $nps->name }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="intro-x">
                                <a href="javascript:;" class="budget-edit" data-category-id="" data-toggle="modal" data-target="#editBudget">
                                    <div class="box px-3 py-3 mb-3 flex items-center zoom-in ">
                                        <div class="">
                                            <div class="text-gray-600 text-xs mt-0.5">Номер локации</div>
                                            <div class="font-medium">{{ $nps->location_number }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
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
                <form action="{{ route('admin.nps.add_location', ['id' => $nps->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="nps_id" value="{{ $nps->id }}">
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
                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button class="btn btn-primary w-20">Додати</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="editTransaction" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Змінити транзакцію</h2>
                    </div>
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="edit_category" class="form-label">Категорія</label>
                            <select class="form-select" name="category_id" id="edit_category">
                                <option value="1">1</option>
                            </select>
                        </div>

                        <div class="col-span-12 sm:col-span-12">
                            <label for="edit_title" class="form-label">Опис</label>
                            <input id="edit_title" type="text" class="form-control" name="title" placeholder="Покупка продуктів" required>
                        </div>

                        <div class="col-span-12 sm:col-span-12">
                            <label for="edit_amount" class="form-label">Ціна</label>
                            <input id="edit_amount" type="number" class="form-control" step="0.01" name="amount" placeholder="250" required>
                        </div>

                        <div class="col-span-12 sm:col-span-12">
                            <label for="edit_type" class="form-label">Тип</label>
                            <select class="form-select" name="type" id="edit_type">
                                <option value="card">Карта</option>
                                <option value="cash">Налічка</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="edit_created_at" class="form-label">Дата</label>
                            <input id="edit_created_at" type="datetime-local" class="form-control" name="created_at" value="" placeholder="01.01.2024 " required>
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

    <div id="addBudget" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Додати бюджет</h2>
                    </div>
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="category" class="form-label">Категорія</label>
                            <select class="form-select" name="category_id" id="category" required>
                                <option value="1">1</option>
                            </select>
                        </div>

                        <div class="col-span-12 sm:col-span-12">
                            <label for="budget" class="form-label">Бюджет</label>
                            <input id="budget" type="number" class="form-control" name="budget" placeholder="2000" required>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="budget_analytics" class="form-label">Бюджет розрахований на попередніх витратах за рік</label>
                            <input id="budget_analytics" type="number" class="form-control budget_analytics" name="budget_analytics" value="0" placeholder="2000" readonly>
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
