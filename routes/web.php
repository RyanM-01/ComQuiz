<?php

use Illuminate\Support\Facades\Route;

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


use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CustomizeController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\BabController;
use App\Http\Controllers\CreateQuizController;









Route::get('/', [SignUpController::class, 'index']);
Route::post('/signup', [SignUpController::class, 'signup']);


Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/adminscoreboard', [AdminController::class, 'scoreboard'])->name('admin.scoreboard');
Route::get('/shop', [AdminController::class, 'GetShop'])->name('admin.shop');
Route::get('/adminprofile',[AdminController::class, 'profile'])->name('admin.profile');



Route::get('/welcome', [UserController::class, 'index'])->name('welcome');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');






Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

Route::get('/scoreboard', [LeaderboardController::class, 'scoreboard']);

Route::get('/store', [StoreController::class, 'store']);

Route::get('/customize', [CustomizeController::class, 'customize']);

Route::get('/subject', [SubjectController::class, 'bab']);


Route::get('/matkul/create', [MatkulController::class, 'create'])->name('matkul.create');
Route::post('/matkul', [MatkulController::class, 'store'])->name('matkul.store');
Route::get('matkul/{id}/edit', [MatkulController::class, 'edit'])->name('matkul.edit');
Route::put('matkul/{id}', [MatkulController::class, 'update'])->name('matkul.update');
Route::delete('matkul/{id}', [MatkulController::class, 'destroy'])->name('matkul.destroy');



Route::get('/admin/bab/{matkulCode}', [BabController::class, 'index'])->name('bab.index');
Route::post('/admin/bab/{matkulCode}/store', [BabController::class, 'store'])->name('bab.store');
Route::post('/admin/bab/{id}/update', [BabController::class, 'update'])->name('bab.update');


Route::get('/admin/bab/{matkulCode}/quiz/create/{bab_id}', [CreateQuizController::class, 'create'])->name('quiz.create');
Route::get('/admin/bab/{matkulCode}/quiz/create/{bab_id}/{quiz_id}', [CreateQuizController::class, 'edit'])->name('quiz.edit');

Route::post('/quiz', [CreateQuizController::class, 'store'])->name('quiz.store');




Route::get('/getquiz',[QuizController::class, 'GetQuiz']);