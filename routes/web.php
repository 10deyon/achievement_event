<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AchievementsController;
use App\Http\Controllers\CommentsController;

Route::get('/users/{user}/achievements', [AchievementsController::class, 'index']);
Route::post('/api/comments', [CommentsController::class, 'create']);
Route::post('/watch', [LessonsController::class, 'create']);

