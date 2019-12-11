<?php

use Illuminate\Support\Facades\Route;
use Vemcogroup\Charts\Http\Controller\ChartController;

Route::get('/data/{resource}', [ChartController::class, 'dashboardData']);
Route::get('/data/{resource}/{resourceId}', [ChartController::class, 'resourceData']);
