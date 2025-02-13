<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BannedWordController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\CommentController;

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('blogs', BlogController::class);

Route::get('/shop', [WelcomeController::class, 'shop'])->name('shop.index');

Route::get('/blogs/detail/{id}', [WelcomeController::class, 'detail'])->name('blogs.detail');

Route::resource('words', BannedWordController::class);
Route::resource('comments', CommentController::class);

Route::post('/blogs/{blog_id}/comments', [CommentController::class, 'store'])->name('comments.store');


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::post('comment/{comment}/like', [CommentController::class, 'like'])->name('comment.like');

Route::post('comment/{comment}/reply', [CommentController::class, 'reply'])->name('comment.reply');

Route::delete('/comment/{commentId}', [CommentController::class, 'delete'])->name('comment.delete');
Route::delete('/comment/reply/{replyId}', [CommentController::class, 'deleteReply'])->name('comment.deleteReply');

Route::post('/comment/reply/{replyId}/like', [CommentController::class, 'likeReply'])->name('comment.likeReply');
