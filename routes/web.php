<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageIzinController;
use App\Http\Controllers\PerizinanController;
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
    return view('auth/login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/absen/store', [AbsensiController::class, 'store'])->name('absen.store');
    Route::get('/perizinan', [PerizinanController::class, 'index'])->name('perizinan');
    Route::post('/perizinan/store', [PerizinanController::class, 'store'])->name('perizinan.store');

    Route::get('/manage-perizinan', [ManageIzinController::class, 'index'])->name('manageizin');
    Route::post('/manage-perizinan/{id}', [ManageIzinController::class, 'update'])->name('manageizin.update');
    Route::post('/manage-perizinann/{id}', [ManageIzinController::class, 'tolak'])->name('manageizin.tolak');

    Route::get('/laporan-karyawan', [AbsensiController::class, 'index'])->name('absensi.laporan');
});

require __DIR__.'/auth.php';
