<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminContorller;

Route::get('/index',[AdminContorller::class,'index'])->middleware(['auth:admin']);

Route::get('/email',[AdminContorller::class,'createEmail'])->middleware(['auth:admin']);
Route::post('/email',[AdminContorller::class,'storeEmail'])->middleware(['auth:admin']);

Route::get('/genre',[AdminContorller::class,'createGenre'])->middleware(['auth:admin']);
Route::post('/genre',[AdminContorller::class,'storeGenre'])->middleware(['auth:admin']);

Route::get('/area',[AdminContorller::class,'createArea'])->middleware(['auth:admin']);
Route::post('/area',[AdminContorller::class,'storeArea'])->middleware(['auth:admin']);


Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth:admin')
                ->name('logout');

