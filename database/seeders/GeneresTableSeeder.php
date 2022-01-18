<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genere;

class GeneresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Genere::create([
            "name" => "寿司"
        ]);
        Genere::create([
            "name" => "焼肉"
        ]);
        Genere::create([
            "name" => "居酒屋"
        ]);
        Genere::create([
            "name" => "イタリアン"
        ]);
        Genere::create([
            "name" => "ラーメン"
        ]);
    }
}
