<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {

            Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

            //Pages routes
            Route::get('green-guide', [\App\Http\Controllers\PagesController::class, 'index'])->name('pages.index');
            Route::get('green-guide/create', [\App\Http\Controllers\PagesController::class, 'create'])->name('pages.create');
            Route::get('green-guide/{slug}/edit', [\App\Http\Controllers\PagesController::class, 'edit'])->name('pages.edit');

            //posts routes
            Route::get('contributions', [\App\Http\Controllers\PostsController::class, 'index'])->name('posts.index');
            Route::get('contributions/{id}', [\App\Http\Controllers\PostsController::class, 'show'])->name('posts.view');

             //users routes
             Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
             Route::get('users/{id}', [\App\Http\Controllers\UserController::class, 'show'])->name('users.view');

             //News routes
            Route::get('news', [\App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
            Route::get('news/create', [\App\Http\Controllers\NewsController::class, 'create'])->name('news.create');
            Route::get('news/{slug}/edit', [\App\Http\Controllers\NewsController::class, 'edit'])->name('news.edit');
    });
