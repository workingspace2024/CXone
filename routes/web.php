<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/evaluation-summay-report', [ReportController::class, 'EvaluationSummaryReport'])->name('EvaluationSummaryReport');
Route::get('/daily-end-call-recommend-to-service', [ReportController::class, 'DailyEndCallRecommendToService'])->name('DailyEndCallRecommendToService');