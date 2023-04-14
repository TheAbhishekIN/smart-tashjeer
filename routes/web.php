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
            Route::get('/dashboard', function () {
                return view('dashboard');
            })->name('dashboard');

            //Pages routes
            Route::get('pages', [\App\Http\Controllers\PagesController::class, 'index'])->name('pages.index');
            Route::get('pages/create', [\App\Http\Controllers\PagesController::class, 'create'])->name('pages.create');
            Route::get('pages/{slug}/edit', [\App\Http\Controllers\PagesController::class, 'edit'])->name('pages.edit');

            //posts routes
            Route::get('posts', [\App\Http\Controllers\PostsController::class, 'index'])->name('posts.index');
            Route::get('posts/{id}', [\App\Http\Controllers\PostsController::class, 'show'])->name('posts.view');
    });
