@extends('layout/' . $layout)
@section('subhead')
<title>Новини</title>
@endsection

@section('subcontent')
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 ">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <a href="javascript:;" class="btn btn-success box flex items-center text-gray-700 dark:text-gray-300" data-toggle="modal" data-target="#addBudget">
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
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Родительская</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Link</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($locations as $location)
                                    <tr>
                                        <td class="border-b dark:border-dark-5">{{$location->id}}</td>
                                        <td class="border-b dark:border-dark-5">{{$location->name}}</td>
                                        <td class="border-b dark:border-dark-5">{{$location->parent?->name}}</td>
                                        <td class="border-b dark:border-dark-5">
                                            @if($location->link)
                                                <a href="{{ $location->link }}">Link</a>
                                            @endif
                                        </td>
                                        <td class="border-b dark:border-dark-5 text-right">
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.location.monsters', ['id' => $location->id]) }}">Monster</a>
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.location.items', ['id' => $location->id]) }}">Items</a>
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.location.nps', ['id' => $location->id]) }}">Nps</a>
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

<div id="addBudget" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.location.create') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Додати бюджет</h2>
                </div>
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-12">
                        <label for="parent" class="form-label">Родительская категория</label>
                        <select class="form-select" name="parent_id" id="parent">
                            <option value=""></option>
                            @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-12 sm:col-span-12">
                        <label for="name" class="form-label">Название</label>
                        <input id="name" type="text" class="form-control" name="name" placeholder="" required>
                    </div>

                    <div class="col-span-12 sm:col-span-12">
                        <label for="link" class="form-label">Link</label>
                        <input id="link" type="text" class="form-control" name="link" placeholder="">
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
