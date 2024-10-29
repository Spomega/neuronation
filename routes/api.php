<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SessionController;
use Prometheus\CollectorRegistry;
use Prometheus\RenderTextFormat;

Route::get('/metrics', function(CollectorRegistry $registry){
    $renderer = new RenderTextFormat();
    $result = $renderer->render($registry->getMetricFamilySamples());
    return response($result, 200)->header('Content-Type',RenderTextFormat::MIME_TYPE);
});
Route::get('/users/{userId}/sessions/history', [SessionController::class, 'getHistory'])->name('sessions.history');
Route::get('/users/{userId}/sessions/lastest/categories', [SessionController::class, 'getLastSessionCategories']);
