<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Home;
use App\Http\Controllers\KelolaAdmin;
use App\Http\Controllers\KelolaUser;
use App\Http\Controllers\Register;
use App\Http\Controllers\Login;
use App\Http\Controllers\Reklame;
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

Route::group(['middleware' => 'revalidate'], function () {

    // Home
    Route::get('/', [Home::class, 'index'])->name('home');

    // Register
    Route::get('/register', [Register::class, 'index'])->name('register');
    Route::post('/register', [Register::class, 'prosesRegister']);

    // Login User
    Route::get('/login', [Login::class, 'index'])->name('login');
    Route::post('/login', [Login::class, 'prosesLogin']);
    // Login Admin
    Route::get('/admin', [Login::class, 'admin'])->name('admin');

    // Logout
    Route::get('/logout', [Login::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

        // Kelola Admin
        Route::get('/kelola-admin', [KelolaAdmin::class, 'index'])->name('kelola-admin');
        Route::get('/tambah-admin', [KelolaAdmin::class, 'tambah'])->name('tambah-admin');
        Route::post('/tambah-admin', [KelolaAdmin::class, 'prosesTambah']);
        Route::get('/edit-admin/{id}', [KelolaAdmin::class, 'edit'])->name('edit-admin');
        Route::post('/edit-admin/{id}', [KelolaAdmin::class, 'prosesEdit']);
        Route::get('/hapus-admin/{id}', [KelolaAdmin::class, 'prosesHapus']);

        // Kelola User
        Route::get('/kelola-user', [KelolaUser::class, 'index'])->name('kelola-user');
        Route::get('/tambah-user', [KelolaUser::class, 'tambah'])->name('tambah-user');
        Route::post('/tambah-user', [KelolaUser::class, 'prosesTambah']);
        Route::get('/edit-user/{id}', [KelolaUser::class, 'edit'])->name('edit-user');
        Route::post('/edit-user/{id}', [KelolaUser::class, 'prosesEdit']);
        Route::get('/detail-user/{id}', [KelolaUser::class, 'detail'])->name('detail-user');
        Route::get('/hapus-user/{id}', [KelolaUser::class, 'prosesHapus']);

        // Kelola Reklame
        Route::get('/kelola-reklame', [Reklame::class, 'index'])->name('kelola-reklame');
        Route::get('/tambah-reklame', [Reklame::class, 'tambah'])->name('tambah-reklame');
        Route::post('/tambah-reklame', [Reklame::class, 'prosesTambah']);
        Route::get('/edit-reklame/{id}', [Reklame::class, 'edit'])->name('edit-reklame');
        Route::post('/edit-reklame/{id}', [Reklame::class, 'prosesEdit']);
        Route::get('/detail-reklame/{id}', [Reklame::class, 'detail'])->name('detail-reklame');
        Route::get('/hapus-reklame/{id}', [Reklame::class, 'hapus']);
    });
});
