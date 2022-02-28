<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            "name" => "root",
            "email" => "root@gmail.com",
            'email_verified_at' => now(),
            "password" => Hash::make("1223334444"),
            "remember_token" => Str::random(10),
        ]);
    }
}
