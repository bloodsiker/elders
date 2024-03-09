<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monster extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(Monster::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Monster::class, 'parent_id')->orderBy('lvl');
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'monster_item')->withPivot('quantity');
    }
}
