<?php

use App\Http\Controllers\Owner\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Owner\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;

Route::get('/index',function(){
    return view("owner.owner_page");
})->middleware(['auth:owner']);

Route::get('/reservation',function(){
    return view("owner.reservation");
})->middleware(['auth:owner']);

Route::get('/shop',[OwnerController::class, 'createShop'])->middleware(['auth:owner']);
Route::post('/shop',[OwnerController::class, 'storeShop'])->middleware(['auth:owner']);
Route::get('/detail/{id?}',[OwnerController::class, 'edit'])->middleware(['auth:owner']);
Route::post('/detail',[OwnerController::class, 'updateShop'])->middleware(['auth:owner']);
Route::post('/delete',[OwnerController::class, 'deleteShop'])->middleware(['auth:owner']);

Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware(['auth:admin'])
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('auth:admin');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware(['auth:owner'])
                ->name('logout');

