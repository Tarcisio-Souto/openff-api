<?php

use App\Http\Controllers\API\ProductsController;
use App\Http\Controllers\API\ReadProductsGz;


Route::get('/', function () {
    return response()->json(['success' => 'Bem-vindo(a) ao Coodesh Challanger.']);
});


Route::get('/read-files', [ReadProductsGz::class, 'GetFields'])->name('read-files');

Route::get('/', [ProductsController::class, 'index'])->name('check-validate');
Route::get('/products/{code}', [ProductsController::class, 'show']);
Route::get('/products', [ProductsController::class, 'getAllProducts']);
Route::delete('/products/{code}', [ProductsController::class, 'destroy']);
Route::put('/products/{code}', [ProductsController::class, 'update']);