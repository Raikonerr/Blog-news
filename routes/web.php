<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;


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

Route::get('/',[PostController::class,'index'])->name('post.index');

Route::middleware(['auth'])->group(function(){

    Route::resource('posts', PostController::class)->except('index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('comment', CommentController::class)->only('destroy','update');
    Route::post('comment/create/{post}', [CommentController::class, 'addPostComment'])->name('comments.addPostComment');
});








require __DIR__.'/auth.php';
