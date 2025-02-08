<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('blogs', BlogController::class);

Route::get('/shop', [WelcomeController::class, 'shop'])->name('shop.index');

Route::get('/blogs/detail/{id}', [WelcomeController::class, 'detail'])->name('blog.detail');
