<?php

use Illuminate\Support\Facades\Route;
use Vemcogroup\Charts\Http\Controller\ChartController;

Route::get('/data', [ChartController::class, 'dashboardData']);
Route::get('/data/{resourceId}', [ChartController::class, 'resourceData']);
