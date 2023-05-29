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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//pasien
Route::get('pasien/index', [PasienController::class, 'index'])->name('pasien/index');
Route::get('/viewsave', [PasienController::class, 'viewsSave'])->name('viewsave');
Route::get('/viewupdate/{id_pasien}', [PasienController::class, 'viewsUpdate'])->name('viewupdate');
Route::get('/detailspasien/{id_pasien}', [PasienController::class, 'detailpasien'])->name('detailspasien');
Route::post('pasiensave', [PasienController::class, 'store'])->name('pasiensave');
Route::put('/pasienupdate/{id_pasien}', [PasienController::class, 'update'])->name('pasienupdate');

//obat
Route::get('obat/index', [ObatController::class, 'index'])->name('obat/index');
Route::get('/viewsaveobat', [ObatController::class, 'viewsSave'])->name('viewsaveobat');
Route::post('obatsave', [ObatController::class, 'store'])->name('obatsave');
Route::get('/detailsobat/{id_obat}', [ObatController::class, 'detailobat'])->name('detailsobat');
Route::get('/viewupdateobat/{id_obat}', [ObatController::class, 'viewsUpdate'])->name('viewupdateobat');
Route::put('/obatupdate/{id_obat}', [ObatController::class, 'update'])->name('obatupdate');