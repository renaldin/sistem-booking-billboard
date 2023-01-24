<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelKonfirmasiPembayaran;
use Illuminate\Contracts\Session\Session;

class KonfirmasiPembayaran extends Controller
{

    private $ModelKonfirmasiPembayaran;

    public function __construct()
    {
        $this->ModelKonfirmasiPembayaran = new ModelKonfirmasiPembayaran();
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Konfirmasi Pembayaran',
            'subTitle'  => 'Kelola Konfirmasi Pembayaran',
            'order'     => $this->ModelKonfirmasiPembayaran->dataKonfirmasiPembayaran(),
        ];

        return view('admin.konfirmasiPembayaran.dataKonfirmasiPembayaran', $data);
    }
}
