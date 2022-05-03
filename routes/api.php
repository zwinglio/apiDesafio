<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\SheetController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\LevelsController;

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

Route::apiResource('levels', LevelsController::class);
Route::apiResource('sheets', SheetController::class);
Route::apiResource('sheets/{sheet}/series', SerieController::class);
Route::apiResource('sheets/{sheet}/series/{serie}/exercises', ExerciseController::class);

Route::post('sheets/import', [SheetController::class, 'importSheets']);
