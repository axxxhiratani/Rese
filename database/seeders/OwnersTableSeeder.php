<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Owner;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class OwnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Owner::create([
            "name" => "CoachTech",
            "email" => "coachtech@tech.co.jp",
            'email_verified_at' => now(),
            "password" => Hash::make("1223334444"),
            "remember_token" => Str::random(10),
        ]);

    }
}
