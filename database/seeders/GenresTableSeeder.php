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
            "name" => "寿司",
            "image" => "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg",
        ]);
        Genre::create([
            "id" => 14,
            "name" => "焼肉",
            "image" => "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg",

        ]);
        Genre::create([
            "id" => 24,
            "name" => "居酒屋",
            "image" => "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg",
        ]);
        Genre::create([
            "id" => 34,
            "name" => "イタリアン",
            "image" => "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg",
        ]);
        Genre::create([
            "id" => 44,
            "name" => "ラーメン",
            "image" => "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg",
        ]);
    }
}
