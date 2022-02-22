<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Area::create([
            "id" => 4,
            "name" => "東京都"
        ]);
        Area::create([
            "id" => 14,
            "name" => "大阪府"
        ]);
        Area::create([
            "id" => 24,
            "name" => "福岡県"
        ]);
    }
}
