<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Location;
use App\Models\Monster;
use App\Models\User;
use Illuminate\Http\Request;


class LocationController extends Controller
{
    public function list(Request $request)
    {
        $locations = Location::all();

        return view('admin/location/list', compact('locations'));
    }

    public function create(Request $request)
    {
        $location = new Location();
        $location->parent_id = $request->get('parent_id');
        $location->name = $request->get('name');
        $location->link = $request->get('link');
        $location->save();

        return redirect()->back();
    }

    public function monsters($id, Request $request)
    {
        $location = Location::findOrFail($id);
        $monsters = Monster::whereNull('parent_id')->orderBy('name')->get();

        return view('admin/location/monsters', compact('location', 'monsters'));
    }

    public function addMonster($id, Request $request)
    {
        $location = Location::findOrFail($id);
        $location->monsters()->syncWithoutDetaching([$request->get('monster_id')]);
        $location->save();

        return redirect()->back();
    }

    public function deleteMonster($id, $monster_id)
    {
        $location = Location::findOrFail($id);
        $location->monsters()->detach($monster_id);
        $location->save();

        return redirect()->back();
    }

    public function items($id, Request $request)
    {
        $location = Location::findOrFail($id);
        $items = Item::all();

        return view('admin/location/items', compact('location', 'items'));
    }

    public function addItem($id, Request $request)
    {
        $location = Location::findOrFail($id);
        $location->items()->syncWithoutDetaching([$request->get('item_id') => ['quantity' => $request->get('quantity')]]);
        $location->save();

        return redirect()->back();
    }

    public function deleteItem($id, $item_id)
    {
        $location = Location::findOrFail($id);
        $location->items()->detach($item_id);
        $location->save();

        return redirect()->back();
    }

    public function nps($id, Request $request)
    {
        $location = Location::findOrFail($id);
        $npsList = Monster::all();

        return view('admin/location/nps', compact('location', 'npsList'));
    }

    public function addNps($id, Request $request)
    {
        $location = Location::findOrFail($id);
        $location->nps()->syncWithoutDetaching([$request->get('nps_id')]);
        $location->save();

        return redirect()->back();
    }

    public function deleteNps($id, $nps_id)
    {
        $location = Location::findOrFail($id);
        $location->nps()->detach($nps_id);
        $location->save();

        return redirect()->back();
    }
}
