<?php

use App\Http\Controllers\Booking;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Home;
use App\Http\Controllers\KelolaAdmin;
use App\Http\Controllers\KelolaUser;
use App\Http\Controllers\KonfirmasiPembayaran;
use App\Http\Controllers\Register;
use App\Http\Controllers\Login;
use App\Http\Controllers\Order;
use App\Http\Controllers\Reklame;
use App\Http\Controllers\Partner;
use App\Http\Controllers\Faq;
use App\Http\Controllers\BiodataWeb;
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

    // Reklame
    Route::get('/reklame', [Reklame::class, 'reklameUser'])->name('reklame');
    Route::post('/reklame', [Reklame::class, 'reklameUser']);
    Route::get('/reklame-booking', [Reklame::class, 'reklameBookingUser'])->name('reklame-booking');
    Route::get('/reklame/{id}', [Reklame::class, 'detailReklameUser']);
    Route::get('/review/{id}', [Reklame::class, 'review']);

    // FAQ
    Route::post('/pertanyaan', [Faq::class, 'tambahFaqUser']);
    // FAQ
    Route::get('/faq', [Faq::class, 'faqUser']);

    // Register
    Route::get('/register', [Register::class, 'index'])->name('register');
    Route::post('/register', [Register::class, 'prosesRegister']);

    // Login User
    Route::get('/login', [Login::class, 'index'])->name('login');
    Route::post('/login', [Login::class, 'prosesLogin']);
    Route::get('/lupa-password', [Login::class, 'lupaPassword']);
    Route::post('/prosesEmailLupaPassword', [Login::class, 'prosesEmailLupaPassword']);
    Route::get('/reset-password/{id}', [Login::class, 'resetPassword']);
    Route::post('/ubah-password', [Login::class, 'prosesUbahPassword']);

    // Login Admin
    Route::get('/admin', [Login::class, 'admin'])->name('admin');
    Route::get('/lupa-password-admin', [Login::class, 'lupaPasswordAdmin']);
    Route::get('/reset-password-admin/{id}', [Login::class, 'resetPasswordAdmin']);
    Route::post('/ubah-password-admin', [Login::class, 'prosesUbahPasswordAdmin']);

    // Logout
    Route::get('/logout', [Login::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'user'], function () {

        // booking
        Route::get('/booking', [Booking::class, 'index'])->name('booking');
        Route::post('/booking/{id}', [Booking::class, 'prosesBooking']);
        Route::get('/detail-booking/{id}', [Booking::class, 'detailBooking']);
        Route::get('/batal-booking/{id}', [Booking::class, 'batalBooking']);
        Route::get('/riwayat-booking', [Booking::class, 'riwayatBooking'])->name('riwayat-booking');
        Route::get('/download-invoice/{id}', [Booking::class, 'downloadInvoice']);

        // Konfirmasi Pembayarans
        Route::get('/pembayaran/{id}', [KonfirmasiPembayaran::class, 'pembayaran']);
        Route::post('/pembayaran/{id}', [KonfirmasiPembayaran::class, 'prosesPembayaran']);

        // Profil User
        Route::get('/profil', [KelolaUser::class, 'profil'])->name('profil');
        Route::post('/edit-profil-user/{id}', [KelolaUser::class, 'editProfil']);
        Route::get('/ubah-password/{id}', [KelolaUser::class, 'ubahPassword']);
        Route::post('/ubah-password-user/{id}', [KelolaUser::class, 'prosesUbahPassword']);
    });

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

        Route::get('/biodata-website', [BiodataWeb::class, 'index'])->name('biodata-web');
        Route::post('/biodata-website/{id}', [BiodataWeb::class, 'prosesEdit']);

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

        // Kelola Partner
        Route::get('/kelola-partner', [Partner::class, 'index'])->name('kelola-partner');
        Route::get('/tambah-partner', [Partner::class, 'tambah'])->name('tambah-partner');
        Route::post('/tambah-partner', [Partner::class, 'prosesTambah']);
        Route::get('/edit-partner/{id}', [Partner::class, 'edit'])->name('edit-partner');
        Route::post('/edit-partner/{id}', [Partner::class, 'prosesEdit']);
        Route::get('/detail-partner/{id}', [Partner::class, 'detail'])->name('detail-partner');
        Route::get('/hapus-partner/{id}', [Partner::class, 'hapus']);

        // Kelola faq
        Route::get('/kelola-faq', [Faq::class, 'index'])->name('kelola-faq');
        Route::get('/tambah-faq', [Faq::class, 'tambah'])->name('tambah-faq');
        Route::post('/tambah-faq', [Faq::class, 'prosesTambah']);
        Route::get('/edit-faq/{id}', [Faq::class, 'edit'])->name('edit-faq');
        Route::post('/edit-faq/{id}', [Faq::class, 'prosesEdit']);
        Route::get('/hapus-faq/{id}', [Faq::class, 'hapus']);

        // Profil Admin
        Route::get('/profil-admin', [KelolaAdmin::class, 'profil'])->name('profil-admin');
        Route::post('/profil-admin/{id}', [KelolaAdmin::class, 'ubahProfil']);
        Route::post('/ubah-password/{id}', [KelolaAdmin::class, 'ubahPassword']);

        // Data Order
        Route::get('/kelola-order', [Order::class, 'index'])->name('kelola-order');
        Route::get('/beri-harga/{id}', [Order::class, 'beriHarga']);
        Route::get('/edit-harga/{id}', [Order::class, 'editHarga']);
        Route::post('/beri-harga/{id}', [Order::class, 'prosesBeriHarga']);
        Route::get('/detail-order/{id}', [Order::class, 'detail']);

        // Data Konfirmasi Pembayaran
        Route::get('/konfirmasi-pembayaran', [KonfirmasiPembayaran::class, 'index'])->name('konfirmasi-pembayaran');
        Route::get('/detail-pembayaran/{id}', [KonfirmasiPembayaran::class, 'detail']);
    });
});
