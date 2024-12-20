<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\BasisPengetahuanController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\pasienController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\userController;
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


Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    Route::get('/login',[authController::class,'login'])->name('auth.login');
    Route::get('/daftar',[authController::class,'daftar'])->name('auth.daftar');
    Route::post('/login/process',[authController::class,'loginProcess'])->name('auth.login.process');
    Route::post('/daftar/process',[authController::class,'daftarProcess'])->name('auth.daftar.process');
});
Route::get('/logout',[authController::class,'logout'])->name('auth.logout');

Route::middleware(['authLogin:admin'])->group(function () {
    Route::get('/dashboard',[adminController::class, 'index'])->name('admin.dashboard');
    Route::put('/profile/{id}',[adminController::class,'profile'])->name('admin.profile');
    Route::resource('/penyakit',PenyakitController::class)->except('edit','show','create');
    Route::resource('/pengguna',pasienController::class)->except('edit','show','create');
    Route::resource('/gejala',GejalaController::class)->except('edit','show','create');
    Route::resource('/basis',BasisPengetahuanController::class)->except('edit','show','create');
});

Route::middleware(['authLogin:user'])->group(function () {
    Route::get('/mydashboard',[userController::class, 'myDashboard'])->name('user.dashboard');
    Route::put('/myprofile/{id}',[userController::class,'myProfile'])->name('user.profile');
    Route::put('/change/{id}',[userController::class,'change'])->name('change');
    Route::get('/diagnosa',[userController::class,'diagnosa'])->name('diagnosa');
    Route::post('/diagnosa/process',[userController::class, 'diagnosaProcess'])->name('diagnosa.process');
    Route::get('/riwayat',[userController::class,'riwayat'])->name('riwayat');
    Route::delete('/riwayat/delete/{id}',[userController::class,'deleteHistory'])->name('hapus.riwayat');
});