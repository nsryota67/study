<?php

use App\Http\Controllers\ChoiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\QuizController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/learners/{learner}', [StudyController::class, 'index']);

Route::get('/learners/note/{note}', [NoteController::class, 'show']);

Route::get('/learners/note/edit_note/{note}', [NoteController::class, 'edit']);

Route::get('/learners/learners/create_note/{learner}', [NoteController::class, 'create']);

Route::get('/learners/create_choice/{quiz}', [ChoiceController::class, 'create']);

Route::get('/learners/goal/{goal}', [GoalController::class, 'show']);

Route::get('/learners/goals/goal/{learner}', [GoalController::class, 'create']);

Route::get('/learners/goal/edit_goal/{goal}', [GoalController::class, 'edit']);

Route::get('/learners/create_quiz/{learner}', [QuizController::class, 'create']);

Route::get('/learners/quizzes/edit_quiz/{quiz}', [QuizController::class, 'edit']);

Route::get('/learners/choice/edit_choice/{choice}', [ChoiceController::class, 'edit']);

Route::get('/learners/quizzes/challenge_quiz/{quiz}', [QuizController::class, 'challenge']);

Route::get('/learners/quizzes/{quiz}', [QuizController::class, 'show']);

Route::post('/quizzes', [QuizController::class, 'store']);

Route::post('/notes', [NoteController::class, 'store']);

Route::post('/choices', [ChoiceController::class, 'store']);

Route::post('/goals', [GoalController::class, 'store']);

Route::put('/edit_note/{note}', [NoteController::class, 'update']);

Route::put('/edit_quizzes/{quiz}', [QuizController::class, 'update']);

Route::put('/edit_goal/{goal}', [GoalController::class, 'update']);

Route::put('/edit_choice/{choice}', [ChoiceController::class, 'update']);

Route::delete('/learners/notes/{note}', [NoteController::class, 'delete']);

Route::delete('/learners/quizzes/{quiz}', [QuizController::class, 'delete']);

Route::delete('/learners/goals/{goal}', [GoalController::class, 'delete']);

Route::delete('/learners/choices/{choice}', [ChoiceController::class, 'delete']);



