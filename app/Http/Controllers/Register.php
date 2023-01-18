<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\ModelAuth;

class Register extends Controller
{

    private $ModelAuth;

    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        if (Session()->get('email')) {
            if (Session()->get('status') === 'User') {
                return redirect()->route('home');
            } else {
                return redirect()->route('dashboard');
            }
        }

        $data = [
            'title' => 'Register'
        ];

        return view('auth.register', $data);
    }

    public function prosesRegister()
    {
        Request()->validate([
            'nama'              => 'required',
            'nomor_telepon'     => 'required|numeric',
            'alamat'            => 'required',
            'nama_perusahaan'   => 'required',
            'alamat_perusahaan' => 'required',
            'email'             => 'required|unique:user,email|email',
            'password'          => 'min:6|required',
        ], [
            'nama.required'             => 'Nama lengkap harus diisi!',
            'nomor_telepon.required'    => 'Nomor telepon harus diisi!',
            'nomor_telepon.numeric'     => 'Nomor telepon harus angka!',
            'alamat.required'           => 'Alamat harus diisi!',
            'nama_perusahaan.required'  => 'Nama perusahaan harus diisi!',
            'alamat_perusahaan.required' => 'Alamat perusahaan harus diisi!',
            'email.required'            => 'Email harus diisi!',
            'email.unique'              => 'Email sudah digunakan!',
            'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
            'password.required'         => 'Password harus diisi!',
            'password.min'              => 'Password minimal 6 karakter!',
        ]);

        $data = [
            'nama'              => Request()->nama,
            'nomor_telepon'     => Request()->nomor_telepon,
            'alamat'            => Request()->alamat,
            'nama_perusahaan'   => Request()->nama_perusahaan,
            'alamat_perusahaan' => Request()->alamat_perusahaan,
            'email'             => Request()->email,
            'password'          => Hash::make(Request()->password),
        ];

        $this->ModelAuth->register($data);
        return redirect()->route('login')->with('berhasil', 'Anda berhasil membuat akun !');
    }
}
