<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ShopController::class,"index"])->middleware(['auth']);
Route::get('/detail/{id?}',[ShopController::class,"show"])->middleware(['auth']);
Route::post('/done',[ReservationController::class,"store"])->middleware(['auth']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get("/thanks",[UserController::class,"thanks"]);
Route::get("/mypage",[UserController::class,"mypage"]);

require __DIR__.'/auth.php';
