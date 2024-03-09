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
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Локация</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-nowrap"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($nps as $item)
                                    <tr>
                                        <td class="border-b dark:border-dark-5">{{$item->id}}</td>
                                        <td class="border-b dark:border-dark-5">{{$item->name}}</td>
                                        <td class="border-b dark:border-dark-5">{{$item->location_number}}</td>
                                        <td class="border-b dark:border-dark-5 text-right">
{{--                                            <div class="flex justify-end">--}}
{{--                                                <div class="dropdown">--}}
{{--                                                    <button class="dropdown-toggle btn btn-primary" aria-expanded="false">Меню</button>--}}
{{--                                                    <div class="dropdown-menu w-40">--}}
{{--                                                        <div class="dropdown-menu__content box dark:bg-dark-1 p-2">--}}
{{--                                                            <a href="{{ route('admin.parent.children', ['id' => $item->id]) }}" class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">Діти</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.nps.details', ['id' => $item->id]) }}">View</a>
{{--                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.sms_history', ['id' => $user->id]) }}">SMS</a>--}}
{{--                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.payment_history', ['id' => $user->id]) }}">Payment</a>--}}
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
            <form action="{{ route('admin.nps.create') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Додати бюджет</h2>
                </div>
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                    <div class="col-span-12 sm:col-span-12">
                        <label for="name" class="form-label">Название</label>
                        <input id="name" type="text" class="form-control" name="name" placeholder="" required>
                    </div>

                    <div class="col-span-12 sm:col-span-12">
                        <label for="location_number" class="form-label">Номер локации</label>
                        <input id="location_number" type="text" class="form-control" name="location_number" placeholder="">
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
