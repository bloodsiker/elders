@extends('layout/' . $layout)
@section('subhead')
<title>Створити мастер пароль</title>
@endsection

@section('subcontent')
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 ">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10"></div>
                <div class="intro-y box">
                    <div class="p-5">
                        <div class="preview">
                            <form action="{{ route('admin.quest.create') }}" method="POST">
                                @csrf
                                <div class="mt-3">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select class="form-select select2" name="category_id" id="monster_id">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="npc_id" class="form-label">NPC</label>
                                    <select class="form-select select2" name="npc_id" id="npc_id">
                                        @foreach($npcs as $npc)
                                            <option value="{{ $npc->id }}">{{ $npc->name }} {{ $npc->location_number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input id="title" name="title" type="text" class="form-control" placeholder="Title" required>
                                </div>
                                <div class="mt-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description"  class="form-control ckeditor" cols="30" rows="10"></textarea>
                                </div>
                                <div class="mt-3">
                                    <label for="reward" class="form-label">Reward</label>
                                    <textarea name="reward" id="reward"  class="form-control ckeditor" cols="30" rows="5"></textarea>
                                </div>
                                <div class="mt-3">
                                    <label for="sort_order" class="form-label">Sort</label>
                                    <input id="sort_order" name="sort_order" type="number" class="form-control" placeholder="Sort">
                                </div>
                                <div class="mt-5 flex justify-between">
                                    <button class="btn btn-primary mt-5">Зберегти</button>
                                    <a href="{{ route('admin.quest.list') }}" class="btn btn-success mt-5">Назад</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
