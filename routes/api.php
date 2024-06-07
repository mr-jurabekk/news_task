<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('user', [AuthController::class, 'user'])->name('user');

Route::get('categories', [CategoryController::class, 'index'])->name('categories');
Route::get('category/{slug}', [CategoryController::class, 'show'])->name('category.show');
Route::put('category/{slug}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('category/{slug}', [CategoryController::class, 'destroy'])->name('category.delete');
Route::post('category', [CategoryController::class, 'store'])->name('category.store');


    Route::get('get-news', [NewsController::class, 'index'])->name('news');
    Route::post('news', [NewsController::class, 'store'])->name('news.store');
    Route::get('news/{slug}', [NewsController::class, 'show'])->name('news.show');
    Route::put('news/{slug}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('news/{slug}', [NewsController::class, 'destroy'])->name('news.delete');



Route::resources([
   'role' => RoleController::class,
]);
