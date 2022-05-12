<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('products',
    \App\Http\Controllers\ProductController::class
)->middleware('auth:sanctum');

Route::post('sanctum/post',  \App\Http\Controllers\UserTokenController::class);