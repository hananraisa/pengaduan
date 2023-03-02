<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

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

//masyarakat
Route::get('/', [UserController::class, 'index'])->name('pengaduan.index');
Route::get('/masyarakat', [UserController::class,'masyarakat'])->name('pengaduan.masyarakat');

Route::get('/login', [UserController::class, 'formLogin'])->name('pengaduan.formLogin');
Route::post('/login/auth', [UserController::class, 'login'])->name('pengaduan.login');

Route::get('/register', [UserController::class, 'formRegister'])->name('pengaduan.formRegister');
Route::post('/register/auth', [UserController::class, 'register'])->name('pengaduan.register');

Route::get('/logout', [UserController::class, 'logout'])->name('pengaduan.logout');
// Route::get('/isipengaduan', [MasyarakatController::class,'isipengaduan'])->name('isipengaduan');

//admin
Route::get('/admin', function () {
    return view('admin.dashboard');
}); 
