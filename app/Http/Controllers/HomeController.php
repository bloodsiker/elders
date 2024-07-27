<?php

namespace App\Http\Controllers;


use App\Models\Item;
use App\Models\ItemEquipment;
use App\Models\Location;
use App\Models\Monster;
use App\Models\Nps;

class HomeController extends Controller
{

    public function main()
    {
        $locations = Location::whereNull('parent_id')->get();

        return view('homepage', compact('locations'));
    }

    public function maps()
    {
        $locations = Location::whereNull('parent_id')->get();

        return view('maps', compact('locations'));
    }

    public function location($id)
    {
        $location = Location::find($id);

        return view('location', compact('location'));
    }

    public function monsters()
    {
        $monsters = Monster::whereNull('parent_id')->where('is_boss', false)->orderBy('name')->get();
        $boss = Monster::whereNull('parent_id')->where('is_boss', true)->orderBy('name')->get();

        return view('monsters', compact('monsters', 'boss'));
    }

    public function monster($id)
    {
        $monster = Monster::findOrFail($id);

        return view('monster', compact('monster'));
    }

    public function monsterDetails($id, $child_id)
    {
        $parentMonster = Monster::findOrFail($id);
        $monster = Monster::findOrFail($child_id);

        return view('monster_details', compact('monster', 'parentMonster'));
    }

    public function items()
    {
        $items = Item::query()->orderBy('name')->get();

        return view('items', compact('items'));
    }

    public function itemDetails($id)
    {
        $item = Item::findOrFail($id);
        $revelationItems = [];
        if ($item->itemEquipment) {
            $revelationItems = ItemEquipment::where('skill_id', $item->itemEquipment->skill_id)->get();
        }

        return view('item_details', compact('item', 'revelationItems'));
    }

    public function nps()
    {
        $nps = Nps::query()->orderBy('name')->get();

        return view('nps', compact('nps'));
    }

    public function artifacts()
    {
        $artifacts = Item::with('itemArtifact')
            ->where('type', Item::TYPE_ARTIFACT)
            ->get()
            ->sortBy(function ($item) {
                return optional($item->itemArtifact)->lvl;
            });

        return view('artifacts', compact('artifacts'));
    }

    public function quests()
    {
        return view('quests');
    }
}
