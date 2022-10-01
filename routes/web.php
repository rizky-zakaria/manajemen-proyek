<?php

use App\Http\Controllers\client\ProgresController;
use App\Http\Controllers\client\ProyekController;
use App\Http\Controllers\PembangunanGedungController;
use App\Http\Controllers\PembangunanJalanController;
use App\Http\Controllers\PembangunanJembatanController;
use App\Http\Controllers\PembangunanSaluranController;
use App\Http\Controllers\PembangunanWadukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteGroup;
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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/user', UserController::class);
    Route::resource('client/proyek', ProyekController::class);
    Route::resource('client/progres', ProgresController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('data-master/pembangunan-jalan', PembangunanJalanController::class);
    Route::resource('data-master/pembangunan-waduk', PembangunanWadukController::class);
    Route::resource('date-master/pembangunan-jembatan', PembangunanJembatanController::class);
    Route::resource('data-master/pembangunan-gedung', PembangunanGedungController::class);
    Route::resource('data-master/pembangunan-saluran', PembangunanSaluranController::class);

    Route::get('data-master/pembangunan-jalan/accept/{id}', [PembangunanJalanController::class, 'accept']);
    Route::get('data-master/pembangunan-jalan/reject/{id}', [PembangunanJalanController::class, 'reject']);
    Route::get('data-master/pembangunan-jalan/grapich/{id}', [PembangunanJalanController::class, 'grapich']);
    Route::get('data-master/pembangunan-jalan/form-grapich/{id}', [PembangunanJalanController::class, 'formGrapich']);
});
