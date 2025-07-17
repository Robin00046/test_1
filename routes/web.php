<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Kabupaten routes
Route::resource('kabupaten', App\Http\Controllers\KabupatenController::class);

// provinsi routes
Route::resource('provinsi', App\Http\Controllers\ProvinsiController::class);

// penduduk routes
Route::resource('penduduk', App\Http\Controllers\PendudukController::class);

// laporan routes
Route::get('laporan', [App\Http\Controllers\Laporan::class, 'index'])->name('laporan.index');
Route::get('laporan/kabupaten', [App\Http\Controllers\Laporan::class, 'indexKabupaten'])->name('laporan.kabupaten');
