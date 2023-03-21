<?php

use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('v1/index', [CategoryController::class, 'index']);
Route::post('v1/index/create', [CategoryController::class, 'store']);
Route::post('v1/index/update/{id}', [CategoryController::class, 'update_']);
Route::delete('v1/index/delete/{id}', [CategoryController::class, 'destroy']);
