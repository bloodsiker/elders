<?php

namespace App\Http\Controllers;


use App\Models\Item;
use App\Models\ItemEquipment;
use App\Models\Location;
use App\Models\Monster;
use App\Models\Nps;
use App\Models\Quest;
use App\Models\QuestCategory;
use App\Services\SeoService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private SeoService $seoService;

    public function __construct(SeoService $seoService) {

        $this->seoService = $seoService;
    }

    public function main()
    {
        $locations = Location::whereNull('parent_id')->get();

        $seo = $this->seoService->addBeforeTitle(' / Онлайн игра CKA3AHИE');

        return view('homepage', compact('locations', 'seo'));
    }

    public function maps()
    {
        $locations = Location::whereNull('parent_id')->get();

        $seo = $this->seoService->addBeforeTitle(' / Карты вселенной Тэйл (игра Skazanie) / Браузерная онлайн игра / Сказание');

        return view('maps', compact('locations', 'seo'));
    }

    public function location($id)
    {
        $location = Location::find($id);

        $seo = $this->seoService
            ->addBeforeTitle(' / Тэйл (игра Skazanie) / Браузерная онлайн игра / Сказание')
            ->addAfterTitle('Локация ' . $location->name . ' / ');

        return view('location', compact('location', 'seo'));
    }

    public function monsters()
    {
        $monsters = Monster::whereNull('parent_id')->where('is_boss', false)->orderBy('name')->get();
        $boss = Monster::whereNull('parent_id')->where('is_boss', true)->orderBy('name')->get();

        $seo = $this->seoService->addBeforeTitle(' / Монстры вселенной Тэйл (игра Skazanie) / Браузерная онлайн игра / Сказание');

        return view('monsters', compact('monsters', 'boss', 'seo'));
    }

    public function monster($id)
    {
        $monster = Monster::findOrFail($id);

        $seo = $this->seoService
            ->addBeforeTitle(' / Тэйл (игра Skazanie) / Браузерная онлайн игра / Сказание')
            ->addAfterTitle('Монстер ' . $monster->name . ' / ');

        return view('monster', compact('monster', 'seo'));
    }

    public function monsterDetails($id, $child_id)
    {
        $parentMonster = Monster::findOrFail($id);
        $monster = Monster::findOrFail($child_id);

        $seo = $this->seoService
            ->addBeforeTitle(' / Тэйл (игра Skazanie) / Браузерная онлайн игра / Сказание')
            ->addAfterTitle('Информация о монстре ' . $monster->name . ' / ');

        return view('monster_details', compact('monster', 'parentMonster', 'seo'));
    }

    public function items()
    {
        $items = Item::query()->orderBy('name')->get();

        $seo = $this->seoService->addBeforeTitle(' / Предметы вселенной Тэйл (игра Skazanie) / Браузерная онлайн игра / Сказание');

        return view('items', compact('items', 'seo'));
    }

    public function itemDetails($id)
    {
        $item = Item::findOrFail($id);
        $revelationItems = [];
        if ($item->itemEquipment) {
            $revelationItems = ItemEquipment::where('skill_id', $item->itemEquipment->skill_id)->get();
        }

        $seo = $this->seoService
            ->addBeforeTitle(' / Тэйл (игра Skazanie) / Браузерная онлайн игра / Сказание')
            ->addAfterTitle('Информация о предмете ' . $item->name . ' / ');

        return view('item_details', compact('item', 'revelationItems', 'seo'));
    }

    public function nps()
    {
        $nps = Nps::query()->orderBy('name')->get();

        $seo = $this->seoService->addBeforeTitle(' / Нпс персонажи вселенной Тэйл (игра Skazanie) / Браузерная онлайн игра / Сказание');

        return view('nps', compact('nps', 'seo'));
    }

    public function artifacts()
    {
        $artifacts = Item::with('itemArtifact')
            ->where('type', Item::TYPE_ARTIFACT)
            ->get()
            ->sortBy(function ($item) {
                return optional($item->itemArtifact)->lvl;
            });

        $seo = $this->seoService->addBeforeTitle(' / Артефакты вселенной Тэйл (игра Skazanie) / Браузерная онлайн игра / Сказание');

        return view('artifacts', compact('artifacts', 'seo'));
    }

    public function categoryQuests(string $slug)
    {
        $seo = $this->seoService->addBeforeTitle(' / Квесты вселенной Тэйл (игра Skazanie) / Браузерная онлайн игра / Сказание');

        $categories = QuestCategory::all();
        $selectCategory = QuestCategory::where('slug', $slug)->firstOrFail();
        $quests = Quest::query()->where('quest_category_id', $selectCategory->id)->orderByDesc('sort_order')->get();

        return view('quests', compact('categories', 'quests', 'selectCategory', 'seo'));
    }

    public function quests()
    {
        $seo = $this->seoService->addBeforeTitle(' / Квесты вселенной Тэйл (игра Skazanie) / Браузерная онлайн игра / Сказание');

        $categories = QuestCategory::all();
        $quests = Quest::query()->orderByDesc('sort_order')->get();

        return view('quests', compact('categories', 'quests', 'seo'));
    }

    public function quest(int $id)
    {
        $seo = $this->seoService->addBeforeTitle(' / Квесты вселенной Тэйл (игра Skazanie) / Браузерная онлайн игра / Сказание');

        $categories = QuestCategory::all();
        $quest = Quest::findOrFail($id);

        return view('quest', compact('categories', 'quest', 'seo'));
    }

    public function search(Request $request)
    {
        $seo = $this->seoService->addBeforeTitle(' / Квесты вселенной Тэйл (игра Skazanie) / Браузерная онлайн игра / Сказание');

        $categories = QuestCategory::all();

        $search = $request->get('search');

        $quests = Quest::query()
            ->select('*')
            ->selectRaw("MATCH(title, description) AGAINST(? IN BOOLEAN MODE) AS relevance", [$search])
            ->whereRaw("MATCH(title, description) AGAINST(? IN BOOLEAN MODE)", [$search])
            ->orderByDesc('relevance')
            ->orderByDesc('sort_order')
            ->get();

        return view('quests', compact('categories', 'quests', 'seo'));
    }
}
