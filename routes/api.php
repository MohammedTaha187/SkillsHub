<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CatController;
use App\Http\Controllers\Api\SkillsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// cats
Route::get('/cats', [CatController::class, 'index']);
Route::get('/cats/{id}', [CatController::class, 'show']);
Route::post('cats/store', [CatController::class, 'store']);
Route::put('/cats/{id}', [CatController::class, 'update']);
Route::delete('/cats/{id}', [CatController::class, 'destroy']);

//skills
Route::get('/skills', [SkillsController::class, 'index']);
Route::get('/skills/{id}', [SkillsController::class, 'show']);
Route::post('skills/store', [SkillsController::class, 'store']);
Route::put('/skills/{id}', [SkillsController::class, 'update']);
Route::delete('/skills/{id}', [SkillsController::class, 'destroy']);

