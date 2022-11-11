<?php

use App\Http\Controllers\DeadlineController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\JenisProyekController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return redirect('login');
});

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('data-master/user', UserController::class);
    Route::resource('data-master/jenis-proyek', JenisProyekController::class);
    Route::resource('data-master/proyek', ProyekController::class);
    Route::resource('data-master/dokumen', DocumentController::class);
    Route::resource('data-master/progress', ProgressController::class);
    Route::resource('data-master/deadline', DeadlineController::class);
    Route::resource('profile', ProfileController::class);

    Route::get('data-master/progress/form-email/{id}', [ProgressController::class, 'form_email']);
    // Route::get('data-master/progress/form-email/{id}', [ProgressController::class, 'form_email']);
});
