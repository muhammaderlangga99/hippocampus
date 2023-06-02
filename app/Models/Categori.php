<?php

namespace App\Models;

use App\Models\Items;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categori extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['items'];

    public function items()
    {
        return $this->hasMany(Items::class);
    }
}
