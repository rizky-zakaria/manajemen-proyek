<?php

use App\Http\Controllers\DeadlineController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\JenisProyekController;
use App\Http\Controllers\KalenderController;
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
    Route::get('kalender-event/', [KalenderController::class, 'index']);
    Route::post('kalender-event/', [KalenderController::class, 'store'])->name('kalender.store');
    Route::resource('data-master/user', UserController::class);
    Route::resource('data-master/jenis-proyek', JenisProyekController::class);
    Route::resource('data-master/proyek', ProyekController::class);
    Route::resource('data-master/dokumen', DocumentController::class);
    Route::resource('data-master/progress', ProgressController::class);
    Route::resource('data-master/deadline', DeadlineController::class);
    Route::resource('profile', ProfileController::class);
    Route::get('data-master/proyek/detail/{id}', [ProyekController::class, 'detail'])->name('proyek.detail');
    Route::get('data-master/progress/form-email/{id}', [ProgressController::class, 'form_email']);
    Route::post('data-master/progress/send-email', [ProgressController::class, 'send_email']);
    Route::get('data-master/deadline/send-email/{id}', [DeadlineController::class, 'send_email']);
    Route::get('data-master/proyek/gantt-chart/{id}', [ProyekController::class, 'gantt']);
    Route::post('data-master/proyek/downloadByDate', [ProyekController::class, 'downloadByDate'])->name('download');
    Route::post('form-input/gantt', [ProyekController::class, 'ganttPost']);
    Route::get('data-master/proyek/gantt-chart/gantt-by-project/{id}', [ProyekController::class, 'ganttByProject']);
    Route::get('data-master/proyek/update-progres/{id}', [ProyekController::class, 'formUpdateProgres']);
    Route::post('data-master/proyek/update-percent-progres', [ProyekController::class, 'updateProgres']);
});
