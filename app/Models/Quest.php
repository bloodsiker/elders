<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(QuestCategory::class, 'quest_category_id');
    }

    public function npc()
    {
        return $this->belongsTo(Nps::class, 'npc_id');
    }
}
