<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\LangController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\admin\CatController as AdminCatController;
use App\Http\Controllers\admin\ExamController as AdminExamController;
use App\Http\Controllers\admin\SkillController as AdminSkillController;


Route::middleware(['lang', 'auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/categories/show/{id}', [CatController::class, 'show']);
    Route::get('/skills/show/{id}', [SkillController::class, 'show']);
    Route::get('/exams/show/{id}', [ExamController::class, 'show']);
    Route::get('/exams/questions/{id}', [ExamController::class, 'questions']);

Route::post('/exam/{id}/submit', [ExamController::class, 'submit'])->name('exam.submit');
Route::get('/exam/{examId}/result', [ExamController::class, 'showResult'])->name('exams.result');
    Route::get('/messages', [MessageController::class, 'index']);
    Route::post('/messages/send', [MessageController::class, 'send']);


    
    Route::prefix('dashboard/')->middleware(['auth', 'isAdmin'])->group(function () {
        Route::get('categories', [AdminCatController::class, 'index']);
        Route::get('categories/create', [AdminCatController::class, 'create']);
        Route::post('categories/store', [AdminCatController::class, 'store']);
        Route::get('categories/edit/{id}', [AdminCatController::class, 'edit']);
        Route::post('categories/update/{id}', [AdminCatController::class, 'update']);
        Route::get('categories/delete/{id}', [AdminCatController::class, 'delete']);
        
        Route::get('skills', [AdminSkillController::class, 'index']);
        Route::get('skills/create' , [AdminSkillController::class , 'create']);
       Route::post('skills/store' , [AdminSkillController::class , 'store']);
       Route::get('skills/edit/{id}', [AdminSkillController::class, 'edit']);
        Route::post('skills/update/{id}', [AdminSkillController::class, 'update']);
        Route::get('skills/delete/{id}', [AdminSkillController::class, 'delete']);

        
        Route::get('exams', [AdminExamController::class, 'index']);
        Route::get('exams/create' , [AdminExamController::class , 'create']);
       Route::post('exams/store' , [AdminExamController::class , 'store']);
       Route::get('exams/edit/{id}', [AdminExamController::class, 'edit']);
        Route::post('exams/update/{id}', [AdminExamController::class, 'update']);
        Route::get('exams/delete/{id}', [AdminExamController::class, 'delete']);
        Route::post('/exams/submit/{exam}', [ExamController::class, 'submit'])->name('exams.submit');


        
        Route::get('questions', [QuestionController::class, 'index']);
        Route::get('questions/create' , [QuestionController::class , 'create']);
       Route::post('questions/store' , [QuestionController::class , 'store']);
       Route::get('questions/edit/{id}', [QuestionController::class, 'edit']);
        Route::post('questions/update/{id}', [QuestionController::class, 'update']);
        Route::get('questions/delete/{id}', [QuestionController::class, 'delete']);

        
        Route::get('users', [UserController::class, 'index']);
        Route::get('users/edit/{id}', [UserController::class, 'edit'])->middleware('isSuperadmin');
        Route::post('users/update/{id}', [UserController::class, 'update'])->middleware('isSuperadmin');
        Route::get('users/delete/{id}', [UserController::class, 'delete'])->middleware('isSuperadmin');






    });









    Route::get('lang/set/{lang}', [LangController::class, 'setLang']);
});