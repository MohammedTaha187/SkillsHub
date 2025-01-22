<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\LangController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['lang' , 'auth'])->group(function () {
    Route::get('/', [HomeController::class,'index']);
    Route::get('/categories/show/{id}' , [CatController::class,'show']);
    Route::get('/skills/show/{id}' , [SkillController::class,'show']);
    Route::get('/exams/show/{id}' , [ExamController::class,'show']);
    Route::get('/exams/questions/{id}' , [ExamController::class,'questions']);

    Route::get('/messages' , [MessageController::class,'index']);
    Route::post('/messages/send' , [MessageController::class,'send']);
   
});



Route::get('lang/set/{lang}' ,[LangController::class , 'setLang']);