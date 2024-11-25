<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EvaluationEleveController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('eleves', EleveController::class);

Route::resource('modules', ModuleController::class);

Route::resource('evaluations', EvaluationController::class);

Route::resource('evaluation_eleve', EvaluationEleveController::class);