<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\GetDataApiController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/detail/{slug}', [DetailController::class, 'detail'])->name('detail');
Route::get('/categories', [CategoryController::class, 'categories'])->name('categories');
Route::get('/category/{slug}', [CategoryController::class, 'category'])->name('category');
Route::get('/test', [DetailController::class, 'test'])->name('test');
