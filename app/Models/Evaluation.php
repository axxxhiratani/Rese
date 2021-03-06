<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "shop_id",
        "evaluation",
        "comment",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
