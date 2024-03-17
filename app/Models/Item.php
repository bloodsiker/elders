<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    use HasFactory;

    const TYPE_RESOURCE = 'resource';
    const TYPE_KEY = 'key';
    const TYPE_WEAPON = 'weapon';
    const TYPE_ARMOR = 'armor';
    const TYPE_RING = 'ring';
    const TYPE_NECKLACE = 'necklace';
    const TYPE_QUEST = 'quest';
    const TYPE_ARTIFACT = 'artifact';

    protected $guarded = [];

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'location_item')->withPivot(['quantity', 'number_location']);
    }

    public function monsters()
    {
        return $this->belongsToMany(Monster::class, 'monster_item')->withPivot('quantity');
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_has_items', 'parent_id')->withPivot(['quantity']);
    }

    public function parent_items()
    {
        return $this->hasMany(ItemHasItem::class, 'item_id', 'id');
    }

    public function itemArtifact(): HasOne
    {
        return $this->hasOne(ItemArtifact::class);
    }

    public function itemEquipment(): HasOne
    {
        return $this->hasOne(ItemEquipment::class);
    }

    public static $types = [
        self::TYPE_RESOURCE => 'Resource',
        self::TYPE_KEY => 'Key',
        self::TYPE_WEAPON => 'Weapon',
        self::TYPE_ARMOR => 'Armor',
        self::TYPE_RING => 'Ring',
        self::TYPE_NECKLACE => 'Necklace',
        self::TYPE_QUEST => 'Quest',
        self::TYPE_ARTIFACT => 'Artifact',
    ];
}
