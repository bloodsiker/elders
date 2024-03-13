<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Monster;
use App\Models\Nps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MonsterController extends Controller
{
    public function list(Request $request)
    {
        $monsters = Monster::whereNull('parent_id')->get();

        return view('admin/monster/list', compact('monsters'));
    }

    public function create(Request $request)
    {
        $monster = new Monster();
        $monster->name = $request->get('name');
        $monster->is_boss = $request->get('is_boss');
        $monster->save();

        return redirect()->back();
    }

    public function addMonster($id, Request $request)
    {
        $monsterParent = Monster::findOrFail($id);

        $monster = new Monster();
        $monster->parent_id = $id;
        $monster->name = $monsterParent->name;
        $monster->lvl = $request->get('lvl');
        $monster->hp = $request->get('hp');
        $monster->attack = $request->get('attack');
        $monster->dodge = $request->get('dodge');
        $monster->armor = $request->get('armor');
        $monster->min_dmg = $request->get('min_dmg');
        $monster->max_dmg = $request->get('max_dmg');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file = Storage::disk('public')->putFile('back/monsters', $image);
            $monster->image = Storage::url($file);
        }

        $monster->is_boss = $monsterParent->is_boss;
        $monster->save();

        return redirect()->back();
    }

    public function getMonster(Request $request)
    {
        $monster = Monster::findOrFail($request->get('id'));

        return response()->json($monster);
    }

    public function update(Request $request)
    {
        $monster = Monster::findOrFail($request->get('id'));

        $monster->lvl = $request->get('lvl');
        $monster->hp = $request->get('hp');
        $monster->attack = $request->get('attack');
        $monster->dodge = $request->get('dodge');
        $monster->armor = $request->get('armor');
        $monster->min_dmg = $request->get('min_dmg');
        $monster->max_dmg = $request->get('max_dmg');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file = Storage::disk('public')->putFile('back/monsters', $image);
            $monster->image = Storage::url($file);
        }

        $monster->save();

        return redirect()->back();
    }

    public function details($id)
    {
        $monster = Monster::findOrFail($id);

        return view('admin/monster/details', compact('monster'));
    }

    public function delete($id)
    {
        $monster = Monster::findOrFail($id);
        $monster->delete();

        return redirect()->back();
    }
}
