<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestCategory extends Model
{
    use HasFactory;

    public function quests()
    {
        return $this->hasMany(Quest::class, 'quest_category_id');
    }
}
