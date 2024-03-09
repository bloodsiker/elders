<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(Location::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Location::class, 'parent_id');
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'location_item')->withPivot('quantity');
    }

    public function monsters()
    {
        return $this->belongsToMany(Monster::class)->orderBy('name')->orderBy('lvl');
    }

    public function nps()
    {
        return $this->belongsToMany(Nps::class);
    }
}
