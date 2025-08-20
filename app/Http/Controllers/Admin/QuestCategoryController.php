<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Monster;
use App\Models\Nps;
use App\Models\QuestCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class QuestCategoryController extends Controller
{
    public function list(Request $request)
    {
        $categories = QuestCategory::all();

        return view('admin/quest_category/list', compact('categories'));
    }

    public function create(Request $request)
    {
        $category = new QuestCategory();
        $category->name = $request->get('name');
        $category->slug = Str::slug($request->get('name'));
        $category->save();

        return redirect()->back();
    }

    public function getMonster(Request $request)
    {
        $category = QuestCategory::findOrFail($request->get('id'));

        return response()->json($category);
    }

    public function update(Request $request)
    {
        $category = QuestCategory::findOrFail($request->get('id'));

        $category->name = $request->get('name');
        $category->save();

        return redirect()->back();
    }

    public function details($id)
    {
        $category = QuestCategory::findOrFail($id);

        return view('admin/quest_category/details', compact('category'));
    }

    public function delete($id)
    {
        $category = QuestCategory::findOrFail($id);
        $category->delete();

        return redirect()->back();
    }
}
