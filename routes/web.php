<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\JadwalController;

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
    return view('welcome');
});
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');


// Pasien
Route::get('Pasien', [PasienController::class, 'index'])->name('Pasien');
Route::get('Pasien/create', [PasienController::class, 'create'])->name('Pasien.create');
Route::post('Pasien/store', [PasienController::class, 'store'])->name('Pasien.store');
Route::get('/Pasien/edit/{id}', [PasienController::class, 'edit']);
Route::put('Pasien/update/{id}', [PasienController::class, 'update'])->name('Pasien.update');
Route::put('Pasien/delete/{id}', [PasienController::class, 'delete'])->name('Pasien.delete');

// Obat
Route::get('Obat', [ObatController::class, 'index'])->name('Obat');
Route::get('Obat/create', [ObatController::class, 'create'])->name('Obat.create');
Route::post('Obat/store', [ObatController::class, 'store'])->name('Obat.store');
Route::get('/Obat/edit/{id}', [ObatController::class, 'edit'])->where('number', '.*');
//Route::put('Obat/update/{id}', [ObatController::class, 'update'])->where('id', '.*')->name('Obat.update');
Route::put('Obat/update/{id}', [ObatController::class, 'update'])->name('Obat.update');
Route::put('Obat/delete/{id}', [ObatController::class, 'delete'])->name('Obat.delete');

// schedule
Route::get('Schedule', [ScheduleController::class, 'index'])->name('Schedule');
Route::get('Schedule/create', [ScheduleController::class, 'create'])->name('Schedule.create');
Route::post('Schedule/store', [ScheduleController::class, 'store'])->name('Schedule.store');
Route::get('/Schedule/edit/{id}', [ScheduleController::class, 'edit'])->where('number', '.*');
Route::put('Schedule/update/{id}', [ScheduleController::class, 'update'])->name('Schedule.update');
Route::put('Schedule/delete/{id}', [ScheduleController::class, 'delete'])->name('Schedule.delete');

Route::get('Jadwal', [JadwalController::class, 'index'])->name('Jadwal');
Route::get('Jadwal/create', [JadwalController::class, 'create'])->name('Jadwal.create');