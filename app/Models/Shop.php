<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use App\Models\Area;
use App\Models\Evaluation;
use App\Models\Reservation;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        "owner_id",
        "genre_id",
        "area_id",
        "name",
        "area",
        "overview",
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}
