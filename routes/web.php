<?php

use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/questionnaires/create', [QuestionnaireController::class, 'create']);
Route::post('/questionnaires', [QuestionnaireController::class, 'store']);
Route::get('/questionnaires/{questionnaire}', [QuestionnaireController::class,'show']);

Route::get('/questionnaires/{questionnaire}/questions/create', [QuestionController::class,'create']);
Route::post('/questionnaires/{questionnaire}/questions', [QuestionController::class,'store']);
Route::delete('/questionnaires/{questionnaire}/questions/{question}', [QuestionController::class,'destroy']);

Route::get('/surveys/{questionnaire}-{slug}', [SurveyController::class,'show']);
Route::post('/surveys/{questionnaire}-{slug}', [SurveyController::class,'store']);
