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
        $location = new Monster();
        $location->name = $request->get('name');
        $location->is_boss = $request->get('is_boss');
        $location->save();

        return redirect()->back();
    }

    public function addMonster($id, Request $request)
    {
        $monsterParent = Monster::findOrFail($id);

        $location = new Monster();
        $location->parent_id = $id;
        $location->name = $monsterParent->name;
        $location->lvl = $request->get('lvl');
        $location->hp = $request->get('hp');
        $location->attack = $request->get('attack');
        $location->dodge = $request->get('dodge');
        $location->armor = $request->get('armor');
        $location->min_dmg = $request->get('min_dmg');
        $location->max_dmg = $request->get('max_dmg');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file = Storage::disk('public')->putFile('back/monsters', $image);
            $location->image = Storage::url($file);
        }

        $location->is_boss = $monsterParent->is_boss;
        $location->save();

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
