<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Monster;
use App\Models\Nps;
use App\Models\Quest;
use App\Models\QuestCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class QuestController extends Controller
{
    public function list(Request $request)
    {
        $quests = Quest::all();

        return view('admin/quest/list', compact('quests'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $quest = new Quest();
            $quest->quest_category_id = $request->get('category_id');
            $quest->npc_id = $request->get('npc_id');
            $quest->title = $request->get('title');
            $quest->description = $request->get('description');
            $quest->reward = $request->get('reward');
            $quest->sort_order = $request->get('sort_order');
            $quest->save();

            return redirect()->route('admin.quest.list');
        }

        $categories = QuestCategory::all();
        $npcs = Nps::all();

        return view('admin/quest/create', compact('categories', 'npcs'));
    }

    public function getQuest(Request $request)
    {
        $quest = Quest::findOrFail($request->get('id'));

        return response()->json($quest);
    }

    public function edit(int $id)
    {
        $quest = Quest::findOrFail($id);
        $categories = QuestCategory::all();
        $npcs = Nps::all();

        return view('admin/quest/edit', compact('quest', 'categories', 'npcs'));
    }

    public function update(int $id, Request $request)
    {
        $quest = Quest::findOrFail($id);

        $quest->quest_category_id = $request->get('category_id');
        $quest->npc_id = $request->get('npc_id');
        $quest->title = $request->get('title');
        $quest->description = $request->get('description');
        $quest->reward = $request->get('reward');
        $quest->sort_order = $request->get('sort_order');
        $quest->save();

        return redirect()->back();
    }

    public function details($id)
    {
        $quest = Quest::findOrFail($id);

        return view('admin/quest_category/details', compact('quest'));
    }

    public function delete($id)
    {
        $quest = Quest::findOrFail($id);
        $quest->delete();

        return redirect()->back();
    }
}
