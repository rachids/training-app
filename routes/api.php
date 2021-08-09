<?php

use App\Http\Controllers\Api\LastTrainingController;
use Illuminate\Support\Facades\Route;

Route::get('training/last', LastTrainingController::class)->name('api.training.last');
