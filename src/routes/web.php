<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('index');
});

Route::middleware('auth')->group(function(){
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
});

Route::get('/history', [UserController::class, 'showHistory'])->name('history.show');
Route::post('/history', [UserController::class, 'storeLike'])->name('like.store');

    Route::get('/admin.login',function(){ return view('admin/login');});
    Route::post('/admin.login',[AdminController::class,'adminLogin'])->name('admin.login');
// adminルート
    Route::get('/admin.index',[AdminController::class,'adminIndex'])->name('admin.index');
    Route::get('/member/register', [AdminController::class,'register'])->name('register');
    Route::post('/member/register',[AdminController::class,'storeUser'])->name('register.store');
    Route::get('/practiceJadge',[AdminController::class,'showTest'])->name('practiceJadge.show');
    Route::post('/practiceJadge',[AdminController::class,'storeHistory'])->name('practiceJadge.store');
    Route::post('/practiceJadge/decrease',[AdminController::class,'decreaseHistory'])->name('practiceJadge.decrease');
    Route::post('/practiceJadge/fail',[AdminController::class,'failChallenge'])->name('practiceJadge.fail');

Route::get('/delete',[AdminController::class,'showDelete'])->name('delete.show');
Route::post('/delete/{id}',[AdminController::class,'delete'])->name('delete');

Route::get('/profile',[UserController::class, 'showProfile'])->name('profile.show');
Route::get('/edit',[UserController::class,'showEdit'])->name('profile.edit');
Route::patch('/edit',[UserController::class,'update'])->name('profile.update');

Route::get('/ranking',[PracticeController::class,'showRanking'])->name('ranking.show');

Route::get('/animal',[PracticeController::class, 'showAnimal'])->name('animal.show');

Route::get('/technical',[PracticeController::class,'showSkills'])->name('technical.show');

