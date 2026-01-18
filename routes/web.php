<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HistoryController;

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('pesan/{id}', [PesanController::class, 'index']);
Route::post('pesan/{id}', [PesanController::class, 'pesan']);
Route::get('check-out', [PesanController::class, 'check_out']);
Route::delete('check-out/{id}', [PesanController::class, 'delete']);
Route::get('konfirmasi-check-out', [PesanController::class, 'konfirmasi']);

Route::get('profile', [ProfileController::class, 'index']);
Route::post('profile', [ProfileController::class, 'update']);

Route::get('history', [HistoryController::class, 'index'])->name('history.index');
Route::get('history/{id}', [HistoryController::class, 'detail'])->name('history.detail');

Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::get('admin/barang', [AdminController::class, 'index'])->name('admin.barang.index');
Route::get('admin/barang/create', [AdminController::class, 'create'])->name('admin.barang.create');
Route::post('admin/barang', [AdminController::class, 'store'])->name('admin.barang.store');
Route::delete('admin/barang/{id}', [AdminController::class, 'destroy'])->name('admin.barang.destroy');
Route::get('admin/barang/{id}/edit', [AdminController::class, 'edit'])->name('admin.barang.edit');
Route::put('admin/barang/{id}', [AdminController::class, 'update'])->name('admin.barang.update');

