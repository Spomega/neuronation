<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SessionController;


Route::get('/users/{userId}/sessions/history', [SessionController::class, 'getHistory']);
Route::get('/users/{userId}/sessions/lastest/categories', [SessionController::class, 'getLastSessionCategories']);
