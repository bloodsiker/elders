<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemEquipment extends Model
{
    use HasFactory;

    protected $table = 'item_equipment';

    protected $guarded = [];

    protected $appends = ['type_string'];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class);
    }

    public function getTypeStringAttribute()
    {
        return self::$types[$this->type] ? self::$types[$this->type] : null;
    }

    public function minReq()
    {
        return ($this->min_str || $this->min_agility || $this->min_mudrost || $this->min_intellect || $this->skill_lvl);
    }

    public static $types = [
        'weapon' => 'оружие',
        'body' => 'на туловище',
        'lats' => 'латы',
        'head' => 'на голову',
        'hands' => 'на руки',
        'in_hand' => 'в руки',
    ];
}
