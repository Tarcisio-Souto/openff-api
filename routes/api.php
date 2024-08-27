<?php

use App\Http\Controllers\API\InfosController;
use App\Http\Controllers\API\ProductsController;
use App\Http\Controllers\API\ReadProductsGz;


Route::get('/', [InfosController::class, 'getInfos']);
Route::get('/read-files', [ReadProductsGz::class, 'GetFields'])->name('read-files');
Route::get('/products/{code}', [ProductsController::class, 'show']);
Route::get('/products', [ProductsController::class, 'getAllProducts']);
Route::delete('/products/{code}', [ProductsController::class, 'destroy']);
Route::put('/products/{code}', [ProductsController::class, 'update']);