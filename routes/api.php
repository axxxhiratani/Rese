<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("v1/shop")->group(function(){
    Route::get("/",[ShopController::class,"showAll"]);
    Route::get("/search",[ShopController::class,"search"]);
});

Route::prefix("v1/genre")->group(function(){
    Route::get("/",[GenreController::class,"index"]);
});

Route::prefix("v1/area")->group(function(){
    Route::get("/",[AreaController::class,"index"]);
});

Route::prefix("v1/user")->group(function(){
    Route::get("/{id?}",[UserController::class,"show"]);
});

Route::prefix("v1/reservation")->group(function(){
    Route::delete("/{id?}",[ReservationController::class,"destroy"]);
});

Route::prefix("v1/favorite")->group(function(){
    Route::get("/{id?}",[FavoriteController::class,"show"]);
    Route::post("/",[FavoriteController::class,"store"]);
    Route::delete("/",[FavoriteController::class,"destroy"]);
});
