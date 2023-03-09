<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\TanggapanController;
use App\Http\Controllers\Admin\PetugasController;

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

//Masyarakat
Route::get('/', [UserController::class, 'index']);
Route::get('/masyarakat', [UserController::class,'masyarakat'])->name('pengaduan.masyarakat');

Route::get('/login', [UserController::class, 'formLogin'])->name('pengaduan.formLogin');
Route::post('/login/auth', [UserController::class, 'login'])->name('pengaduan.login');

Route::get('/register', [UserController::class, 'formRegister'])->name('pengaduan.formRegister');
Route::post('/register/auth', [UserController::class, 'register'])->name('pengaduan.register');

Route::post('/store', [UserController::class, 'storePengaduan'])->name('pengaduan.stores');

Route::get('/logout', [UserController::class, 'logout'])->name('pengaduan.logout');
Route::get('/isipengaduan', [UserController::class,'isipengaduan'])->name('pengaduan.isipengaduan');
Route::get('/historipengaduan/{siapa?}', [UserController::class,'historipengaduan'])->name('pengaduan.historipengaduan');

//Admin
Route::prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'formlogin'])->name('admin.formlogin');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
    
    Route::resource('pengaduan', PengaduanController::class);
    Route::resource('petugas', PetugasController::class);
    Route::resource('masyarakat', MasyarakatController::class);

    Route::post('tanggapan/createOrUpdate', [TanggapanController::class, 'createOrUpdate'])->name('tanggapan.createOrUpdate');
});

