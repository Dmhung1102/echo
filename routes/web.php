<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/detail/{slug}', [DetailController::class, 'detail'])->name('detail');
Route::get('/explore', [CategoryController::class, 'explore'])->name('explore');
Route::get('/category/{slug}', [CategoryController::class, 'archive'])->name('category');
Route::get('/tag/{slug}', [TagController::class, 'archive'])->name('tag');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
