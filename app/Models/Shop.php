<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genere;

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

    public function genere()
    {
        return $this->belongsTo(Genere::class);
    }
}
