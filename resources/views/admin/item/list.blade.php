@extends('layout/' . $layout)
@section('subhead')
<title>Items</title>
@endsection

@section('subcontent')
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 ">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-end h-10">
                    <a href="javascript:;" class="btn btn-success box text-gray-700 dark:text-gray-300" data-toggle="modal" data-target="#addItem">
                        Додати
                    </a>
                </div>
                <div align="center">
                    <div>
                        <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="border-b-2 dark:border-dark-5 w-5">ID</th>
                                    <th class="border-b-2 dark:border-dark-5 w-40 whitespace-nowrap">Image</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Название</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Тип</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Описание</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $item)
                                    <tr>
                                        <td class="border-b dark:border-dark-5">{{$item->id}}</td>
                                        <td class="border-b dark:border-dark-5">
                                            <div class="flex">
                                                <div class="mt-0.5">
                                                    <img src="{{ asset($item->image) }}" alt="">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="border-b dark:border-dark-5">
                                            <a href="javascript:;" data-id="{{ $item->id }}" data-toggle="modal" data-target="#editItem" class="font-medium whitespace-nowrap item-edit">{{ $item->name }}</a>
                                        </td>
                                        <td class="border-b dark:border-dark-5">{{$item->type}}</td>
                                        <td class="border-b dark:border-dark-5">{{$item->description}}</td>
                                        <td class="border-b dark:border-dark-5 text-right">
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.item.view', ['id' => $item->id]) }}">Детали</a>
                                            <a class="btn btn-xs btn-danger" href="{{ route('admin.item.delete', ['id' => $item->id]) }}">Удалить</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="addItem" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.item.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Добавить предмет</h2>
                </div>
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-12">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-select" name="type" id="type">
                            @foreach(\App\Models\Item::$types as $key => $type)
                                <option value="{{ $key }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="name" class="form-label">Название</label>
                        <input id="name" type="text" class="form-control" name="name" placeholder="" required>
                    </div>

                    <div class="col-span-12 sm:col-span-12">
                        <label for="description" class="form-label">Описание</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="4"></textarea>
                    </div>

                    <div class="col-span-12 sm:col-span-12">
                        <label for="image" class="form-label">Картинка</label>
                        <input id="image" type="file" class="form-control" name="image">
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

<div id="editItem" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.item.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Изменить предмет</h2>
                </div>
                <input type="hidden" id="edit_item_id" name="id" value="">
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-12">
                        <label for="edit_type" class="form-label">Type</label>
                        <select class="form-select" name="type" id="edit_type">
                            @foreach(\App\Models\Item::$types as $key => $type)
                                <option value="{{ $key }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="edit_name" class="form-label">Название</label>
                        <input id="edit_name" type="text" class="form-control" name="name" placeholder="" required>
                    </div>

                    <div class="col-span-12 sm:col-span-12">
                        <label for="edit_description" class="form-label">Описание</label>
                        <textarea name="description" class="form-control" id="edit_description" cols="30" rows="4"></textarea>
                    </div>

                    <div class="col-span-12 sm:col-span-12">
                        <label for="edit_image" class="form-label">Картинка</label>
                        <input id="edit_image" type="file" class="form-control" name="image">
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                    <button class="btn btn-primary w-20">Изменить</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('footer_scripts')
    <script>
        $(document).on('click', '.item-edit', function () {
            let itemId = $(this).data('id');

            $.ajax({
                method: "POST",
                url: '{{ route('admin.item.get') }}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: { id: itemId}
            }).done(function (response) {
                $('#edit_item_id').val(itemId);
                $('#edit_name').val(response.name);
                $('#edit_description').val(response.description);
                $('#edit_type').val(response.type);
            });
        })
    </script>
@endpush
