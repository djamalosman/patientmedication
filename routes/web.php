<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ObatController;

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
Route::put('Obat/update/{number}', [ObatController::class, 'update'])->where('number', '.*')->name('Obat.update');
Route::put('Obat/delete/{id}', [ObatController::class, 'delete'])->name('Obat.delete');