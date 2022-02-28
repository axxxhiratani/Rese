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
        Genre::create([
            "name" => "寿司",
            "image" => "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg",
        ]);
        Genre::create([
            "name" => "焼肉",
            "image" => "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg",

        ]);
        Genre::create([
            "name" => "居酒屋",
            "image" => "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg",
        ]);
        Genre::create([
            "name" => "イタリアン",
            "image" => "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg",
        ]);
        Genre::create([
            "name" => "ラーメン",
            "image" => "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg",
        ]);
    }
}
