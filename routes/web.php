<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;



Route::post('/add', [App\Http\Controllers\UrlController::class,'store'])->name('add');
Route::get('/', [App\Http\Controllers\UrlController::class,'index'])->name('home');
Route::get('{code}', [App\Http\Controllers\UrlController::class,'shortLink'])->name('code');
























// Route::get('/route',[App\Http\Controllers\abc::class,'index']);
// Route::get('/route',[abc::class,'index']);