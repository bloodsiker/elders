@extends('layout/' . $layout)
@section('subhead')
<title>Monsters</title>
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
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Мобов</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Босс</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($monsters as $monster)
                                    <tr>
                                        <td class="border-b dark:border-dark-5">{{$monster->id}}</td>
                                        <td class="border-b dark:border-dark-5">{{$monster->name}}</td>
                                        <td class="border-b dark:border-dark-5">{{$monster->children()->count()}}</td>
                                        <td class="border-b dark:border-dark-5 w-40">
                                            <div class="flex text-theme-9">
                                                {{ $monster->is_boss ? 'Да' : 'Нет' }}
                                            </div>
                                        </td>
                                        <td class="border-b dark:border-dark-5 text-right">
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.monster.details', ['id' => $monster->id]) }}">Детали</a>
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
            <form action="{{ route('admin.monster.create') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Додати монстра</h2>
                </div>
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-12">
                        <label for="name" class="form-label">Название</label>
                        <input id="name" type="text" class="form-control" name="name" placeholder="" required>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="is_boss" class="form-label">Босс</label>
                        <select class="form-select" name="is_boss" id="is_boss">
                            <option value="0">Нет</option>
                            <option value="1">Да</option>
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
@endsection
