<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Genre::create([
            "id" => 4,
            "name" => "寿司"
        ]);
        Genre::create([
            "id" => 14,
            "name" => "焼肉"
        ]);
        Genre::create([
            "id" => 24,
            "name" => "居酒屋"
        ]);
        Genre::create([
            "id" => 34,
            "name" => "イタリアン"
        ]);
        Genre::create([
            "id" => 44,
            "name" => "ラーメン"
        ]);
    }
}
