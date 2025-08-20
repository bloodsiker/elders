@extends('layout/' . $layout)
@section('subhead')
<title>Quest Category</title>
@endsection

@section('subcontent')
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 ">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <a href="javascript:;" class="btn btn-success box flex items-center text-gray-700 dark:text-gray-300" data-toggle="modal" data-target="#addMonster">
                        Додати
                    </a>
                </div>
                <div align="center">
                    <div>
                        <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="border-b-2 dark:border-dark-5">ID</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Название</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td class="border-b dark:border-dark-5">{{$category->id}}</td>
                                        <td class="border-b dark:border-dark-5">{{$category->name}}</td>
                                        <td class="border-b dark:border-dark-5 text-right">
                                            <a href="javascript:;" data-toggle="modal" class="btn btn-xs btn-primary category-edit" data-id="{{ $category->id }}" data-target="#editMonster">
                                               Edit
                                            </a>
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

<div id="addMonster" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.quest_category.create') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Додати монстра</h2>
                </div>
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-12">
                        <label for="name" class="form-label">Название</label>
                        <input id="name" type="text" class="form-control" name="name" placeholder="" required>
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

<div id="editMonster" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.quest_category.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" id="category-id">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Додати монстра</h2>
                </div>
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-12">
                        <label for="name-edit" class="form-label">Название</label>
                        <input id="name-edit" type="text" class="form-control" name="name" placeholder="" required>
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
        $(document).on('click', '.category-edit', function () {
            let categoryId = $(this).data('id');

            $.ajax({
                method: "POST",
                url: '{{ route('admin.quest_category.get') }}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: { id: categoryId}
            }).done(function (response) {
                $('#category-id').val(response.id);
                $('#name-edit').val(response.name);
            });
        })
    </script>
@endpush

