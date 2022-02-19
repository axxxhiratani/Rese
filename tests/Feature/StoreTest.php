<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Owner;
use App\Models\Admin;
use App\Models\Genre;
use App\Models\Area;
use App\Models\Shop;
use App\Models\Reservation;
use App\Models\Favorite;
use App\Models\Evaluation;

class StoreTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_modle_insert()
    {
        //user test
        User::create([
            'name'=>'aaa',
            'email'=>'bbb@ccc.com',
            'password'=>'test12345'
        ]);
        $this->assertDatabaseHas('users',[
            'name'=>'aaa',
            'email'=>'bbb@ccc.com',
            'password'=>'test12345'
        ]);

        //owner test
        Owner::create([
            'name'=>'coachtech',
            'email'=>'coachtech@tech.com',
            'password'=>'test12345'
        ]);
        $this->assertDatabaseHas('owners',[
            'name'=>'coachtech',
            'email'=>'coachtech@tech.com',
            'password'=>'test12345'
        ]);

        //admin test
        Admin::create([
            'name'=>'root',
            'email'=>'root@root.com',
            'password'=>'test12345'
        ]);
        $this->assertDatabaseHas('admins',[
            'name'=>'root',
            'email'=>'root@root.com',
            'password'=>'test12345'
        ]);

        //genre test
        Genre::create([
            'name'=>'test',
        ]);
        $this->assertDatabaseHas('genres',[
            'name'=>'test',
        ]);

        //area test
        Area::create([
            'name'=>'test',
        ]);
        $this->assertDatabaseHas('areas',[
            'name'=>'test',
        ]);

        //shop test
        Shop::create([
            'owner_id'=>1,
            'genre_id'=>1,
            'area_id'=>1,
            'name'=>'test',
            'overview'=>'test',
            'image'=>'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg',
        ]);
        $this->assertDatabaseHas('shops',[
            'owner_id'=>1,
            'genre_id'=>1,
            'area_id'=>1,
            'name'=>'test',
            'overview'=>'test',
            'image'=>'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg',
        ]);

        //reservation test
        Reservation::create([
            'user_id'=>1,
            'shop_id'=>1,
            'visited_on'=>"2022-01-01 05:00:00",
            'number_of_people'=>3,
        ]);
        $this->assertDatabaseHas('reservations',[
            'user_id'=>1,
            'shop_id'=>1,
            'visited_on'=>"2022-01-01 05:00:00",
            'number_of_people'=>3,
        ]);

        //favorite test
        Favorite::create([
            'user_id'=>1,
            'shop_id'=>1,
        ]);
        $this->assertDatabaseHas('favorites',[
            'user_id'=>1,
            'shop_id'=>1,
        ]);

        //evaluation test
        Evaluation::create([
            'user_id'=>1,
            'shop_id'=>1,
            'evaluation' => 1,
            'comment' => 'test',
        ]);
        $this->assertDatabaseHas('evaluations',[
            'user_id'=>1,
            'shop_id'=>1,
            'evaluation' => 1,
            'comment' => 'test',
        ]);
    }
}
