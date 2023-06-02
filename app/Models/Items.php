<?php

namespace App\Models;

use App\Models\Categori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Items extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function categori()
    {
        return $this->belongsTo(Categori::class);
    }
}
