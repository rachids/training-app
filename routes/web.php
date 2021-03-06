<?php

use App\Http\Controllers\ExerciceController;
use App\Http\Controllers\Stats\StatisticsController;
use App\Http\Controllers\TrainingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('training.index');
});

Route::resource('exercices', ExerciceController::class);

Route::get('/training', [TrainingController::class, 'index'])->name('training.index');
Route::post('/training/save', [TrainingController::class, 'store'])->name('training.store');
Route::patch('/training/update', [TrainingController::class, 'update'])->name('training.update');

Route::get('/stats', StatisticsController::class)->name('stats.index');
