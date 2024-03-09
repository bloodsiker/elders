<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemArtifact;
use App\Models\Location;
use App\Models\Monster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ItemController extends Controller
{
    public function list(Request $request)
    {
        $items = Item::all();

        return view('admin/item/list', compact('items'));
    }

    public function create(Request $request)
    {
        $item = new Item();
        $item->name = $request->get('name');
        $item->type = $request->get('type');
        $item->description = $request->get('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file = Storage::disk('public')->putFile('back/items', $image);
            $item->image = Storage::url($file);
        }

        $item->save();

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $item = Item::findOrFail($request->get('id'));
        $item->name = $request->get('name');
        $item->description = $request->get('description');
        $item->type = $request->get('type');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file = Storage::disk('public')->putFile('back/items', $image);
            $item->image = Storage::url($file);
        }

        $item->save();

        return redirect()->back()->with('success', 'Предмет измененно');
    }

    public function getItem(Request $request)
    {
        $item = Item::findOrFail($request->get('id'));

        return response()->json($item);
    }

    public function details($id)
    {
        $item = Item::findOrFail($id);
        $locations = Location::all();
        $monsters = Monster::whereNull('parent_id')->get();

        return view('admin/item/details', compact('item', 'locations', 'monsters'));
    }

    public function addLocation($id, Request $request)
    {
        $item = Item::findOrFail($id);
        $item->locations()->syncWithoutDetaching([$request->get('location_id') => ['quantity' => $request->get('quantity')]]);
        $item->save();

        return redirect()->back();
    }

    public function addArtifact($id, Request $request)
    {
        $item = Item::findOrFail($id);
        $artifact = new ItemArtifact();
        $artifact->fill($request->all());
        $item->itemArtifact()->save($artifact);

        return redirect()->back();
    }

    public function addMonster($id, Request $request)
    {
        $item = Item::findOrFail($id);
        $item->monsters()->syncWithoutDetaching([$request->get('monster_id') => ['quantity' => $request->get('quantity')]]);
        $item->save();

        return redirect()->back();
    }

    public function deleteLocation($id, $location_id)
    {
        $item = Item::findOrFail($id);
        $item->locations()->detach($location_id);
        $item->save();

        return redirect()->back();
    }

    public function deleteMonster($id, $monster_id)
    {
        $item = Item::findOrFail($id);
        $item->monsters()->detach($monster_id);
        $item->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->back();
    }
}
