<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nps extends Model
{
    use HasFactory;

    protected $table = 'nps';

    protected $guarded = [];

    public function locations()
    {
        return $this->belongsToMany(Location::class);
    }
}
