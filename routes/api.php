<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// get kabupaten from provinsi
Route::get('/kabupaten/{provinsi}', [App\Http\Controllers\KabupatenController::class, 'getKabupatenByProvinsiId'])
    ->name('kabupaten.getByProvinsiId');
