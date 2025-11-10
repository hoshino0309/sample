<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sample', [SampleController::class, 'showSample']);

// 一覧画面表示
Route::get('/index',[BlogController::class, 'index'])->name('index');

// 新規登録画面表示
Route::get('/create', [BlogController::class, 'create'])->name('create');

// 新規登録処理
Route::post('/store', [BlogController::class, 'store'])->name('store');

// 詳細画面表示
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('detail');

// 更新画面表示
Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('edit');

// 更新処理
Route::put('/blog/{id}', [BlogController::class, 'update'])->name('update');