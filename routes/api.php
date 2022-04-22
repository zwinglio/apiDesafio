<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\SheetController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\SheetLevelsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('sheet_levels', SheetLevelsController::class);
Route::apiResource('sheets', SheetController::class);
Route::apiResource('series', SerieController::class);
Route::apiResource('exercises', ExerciseController::class);
