<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use App\Models\Area;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        "owner_id",
        "genere_id",
        "name",
        "area",
        "overview",
        "image"
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
