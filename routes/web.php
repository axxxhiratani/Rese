<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\OwnerController;
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
Route::get("/thanks",[UserController::class,"thanks"]);
Route::get("/mypage",[UserController::class,"mypage"])->middleware(['auth']);

Route::get('/update/{id?}',[ReservationController::class,"show"])->middleware(['auth']);
Route::post('/update',[ReservationController::class,"update"])->middleware(['auth']);

Route::get('/evaluation/{id?}',[EvaluationController::class,"show"])->middleware(['auth']);
Route::post('/evaluation',[EvaluationController::class,"store"])->middleware(['auth']);







//owner
Route::get('/owner/register', [OwnerController::class, 'create'])
                ->middleware('guest');
Route::post('/owner/register', [OwnerController::class, 'store'])
                ->middleware('guest');

Route::get('/owner/login', [OwnerController::class, 'createLogin'])
                ->middleware('guest');

Route::post('/owner/login', [OwnerController::class, 'storeLogin'])
                ->middleware('guest');


require __DIR__.'/auth.php';
