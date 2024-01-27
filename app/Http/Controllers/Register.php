<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\ModelAuth;
use App\Models\ModelBiodataWeb;

class Register extends Controller
{

    private $ModelAuth;
    private $ModelBiodataWeb, $publicPathPerusahaan;

    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
        $this->ModelBiodataWeb = new ModelBiodataWeb();
        $this->publicPathPerusahaan = 'foto_perusahaan';
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
            'title' => 'Register',
            'biodata'  => $this->ModelBiodataWeb->detail(1),
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
            'foto_perusahaan'   => 'required|mimes:jpeg,png,jpg|max:2048',
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
            'foto_perusahaan.required'  => 'Logo Perusahaan harus diisi!',
            'foto_perusahaan.mimes'     => 'Format Logo Perusahaan harus jpg/jpeg/png!',
            'foto_perusahaan.max'       => 'Ukuran Logo Perusahaan maksimal 2 mb',
        ]);

        $file = Request()->foto_perusahaan;
        $fileName = date('mdYHis') . Request()->nama_perusahaan . '.' . $file->extension();
        $file->move(public_path($this->publicPathPerusahaan), $fileName);

        $data = [
            'nama'              => Request()->nama,
            'nomor_telepon'     => Request()->nomor_telepon,
            'alamat'            => Request()->alamat,
            'nama_perusahaan'   => Request()->nama_perusahaan,
            'alamat_perusahaan' => Request()->alamat_perusahaan,
            'foto_perusahaan'   => $fileName,
            'email'             => Request()->email,
            'password'          => Hash::make(Request()->password),
        ];

        $this->ModelAuth->register($data);
        return redirect()->route('login')->with('berhasil', 'Anda berhasil membuat akun !');
    }
}
