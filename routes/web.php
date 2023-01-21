<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Home;
use App\Http\Controllers\KelolaAdmin;
use App\Http\Controllers\Register;
use App\Http\Controllers\Login;
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
    });
});
