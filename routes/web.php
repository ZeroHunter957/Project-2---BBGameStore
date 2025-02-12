<?php

use App\Http\Controllers\AccessoryCategoryController;
use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\GameCategoryController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// game routes
Route::get('/game', [GameController::class,'index'])->name('game.index');
Route::get('/game/create', [GameController::class,'create'])->name('game.create');
Route::post('/game/create', [GameController::class,'store'])->name('game.store');
Route::get('/game/delete/{id}', [GameController::class,'delete'])->name('game.delete');
Route::get('/game/edit/{id}', [GameController::class,'edit'])->name('game.edit');
Route::post('/game/edit/{games}', [GameController::class, "update"])->name("game.update");

// game category routes
Route::get('/gamecate', [GameCategoryController::class,'index'])->name('gamecategory.index');
Route::get('/gamecate/create', [GameCategoryController::class,'create'])->name('gamecategory.create');
Route::post('/gamecate/create', [GameCategoryController::class,'store'])->name('gamecategory.store');

// accessory routes
Route::get('/accessory', [AccessoryController::class,'index'])->name('accessory.index');
Route::get('/accessory/create', [AccessoryController::class,'create'])->name('accessory.create');
Route::post('/accessory/create', [AccessoryController::class,'store'])->name('accessory.store');
Route::get('/accessory/delete/{id}', [AccessoryController::class,'delete'])->name('accessory.delete');
Route::get('/accessory/edit/{id}', [AccessoryController::class,'edit'])->name('accessory.edit');
Route::post('/accessory/edit/{accessories}', [AccessoryController::class, "update"])->name("accessory.update");

// accessory category routes
Route::get('/accessorycate', [AccessoryCategoryController::class,'index'])->name('accessorycategory.index');
Route::get('/accessorycate/create', [AccessoryCategoryController::class,'create'])->name('accessorycategory.create');
Route::post('/accessorycate/create', [AccessoryCategoryController::class,'store'])->name('accessorycategory.store');

// menu routes
Route::get('/menu', [MenuController::class,'menu'])->name('menu.index');
Route::get('/contact', [MenuController::class,'contact'])->name('menu.contact');
Route::get('/gameshop', [MenuController::class,'gameshop'])->name('menu.gameshop');
Route::get('/accessoryshop', [MenuController::class,'accessoryshop'])->name('menu.accessoryshop');
Route::get('/gamedetails/{id}', [MenuController::class,'gamedetails'])->name('menu.gamedetails');
Route::get('/accessorydetails/{id}', [MenuController::class,'accessorydetails'])->name('menu.accessorydetails');
Route::get('/dashboard', [MenuController::class,'dashboard'])->name('menu.dashboard');