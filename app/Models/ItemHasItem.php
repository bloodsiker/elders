<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ItemHasItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'item_has_items';

    public function item()
    {
        return $this->belongsTo(Item::class, 'parent_id');
    }
}
