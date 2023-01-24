<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ModelAdmin;
use Illuminate\Contracts\Session\Session;

class KelolaAdmin extends Controller
{

    private $ModelAdmin;

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Admin',
            'subTitle'  => 'Kelola Admin',
            'admin'     => $this->ModelAdmin->dataAdmin()
        ];

        return view('admin.kelolaAdmin.dataAdmin', $data);
    }

    public function tambah()
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Admin',
            'subTitle'  => 'Tambah Admin'
        ];

        return view('admin.kelolaAdmin.tambah', $data);
    }

    public function prosesTambah()
    {
        Request()->validate([
            'nama'              => 'required',
            'nomor_telepon'     => 'required|numeric',
            'email'             => 'required|unique:admin,email|email',
            'password'          => 'min:6|required',
        ], [
            'nama.required'             => 'Nama lengkap harus diisi!',
            'nomor_telepon.required'    => 'Nomor telepon harus diisi!',
            'nomor_telepon.numeric'     => 'Nomor telepon harus angka!',
            'email.required'            => 'Email harus diisi!',
            'email.unique'              => 'Email sudah digunakan!',
            'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
            'password.required'         => 'Password harus diisi!',
            'password.min'              => 'Password minimal 6 karakter!',
        ]);

        $data = [
            'nama'              => Request()->nama,
            'nomor_telepon'     => Request()->nomor_telepon,
            'email'             => Request()->email,
            'password'          => Hash::make(Request()->password),
        ];

        $this->ModelAdmin->tambah($data);
        return redirect()->route('kelola-admin')->with('berhasil', 'Data admin berhasil ditambahkan !');
    }

    public function edit($id_admin)
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Admin',
            'subTitle'  => 'Edit Admin',
            'admin'     => $this->ModelAdmin->detail($id_admin)
        ];

        return view('admin.kelolaAdmin.edit', $data);
    }

    public function prosesEdit($id_admin)
    {
        Request()->validate([
            'nama'              => 'required',
            'nomor_telepon'     => 'required|numeric',
            'email'             => 'required|email',
        ], [
            'nama.required'             => 'Nama lengkap harus diisi!',
            'nomor_telepon.required'    => 'Nomor telepon harus diisi!',
            'nomor_telepon.numeric'     => 'Nomor telepon harus angka!',
            'email.required'            => 'Email harus diisi!',
            'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
        ]);

        if (Request()->password) {
            $data = [
                'id_admin'          => $id_admin,
                'nama'              => Request()->nama,
                'nomor_telepon'     => Request()->nomor_telepon,
                'email'             => Request()->email,
                'password'          => Hash::make(Request()->password),
            ];
        } else {
            $data = [
                'id_admin'          => $id_admin,
                'nama'              => Request()->nama,
                'nomor_telepon'     => Request()->nomor_telepon,
                'email'             => Request()->email,
            ];
        }

        $this->ModelAdmin->edit($data);
        return redirect()->route('kelola-admin')->with('berhasil', 'Data admin berhasil diedit !');
    }

    public function prosesHapus($id_admin)
    {
        $this->ModelAdmin->hapus($id_admin);
        return redirect()->route('kelola-admin')->with('berhasil', 'Data admin berhasil dihapus !');
    }

    public function profil()
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => '',
            'subTitle'  => 'Profil Admin',
            'admin'     => $this->ModelAdmin->detail(Session()->get('id_admin'))
        ];

        return view('admin.profil.profil', $data);
    }

    public function ubahProfil($id_admin)
    {
        Request()->validate([
            'nama'              => 'required',
            'nomor_telepon'     => 'required|numeric',
            'email'             => 'required|email',
        ], [
            'nama.required'             => 'Nama lengkap harus diisi!',
            'nomor_telepon.required'    => 'Nomor telepon harus diisi!',
            'nomor_telepon.numeric'     => 'Nomor telepon harus angka!',
            'email.required'            => 'Email harus diisi!',
            'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
        ]);


        $data = [
            'id_admin'          => $id_admin,
            'nama'              => Request()->nama,
            'nomor_telepon'     => Request()->nomor_telepon,
            'email'             => Request()->email,
        ];


        $this->ModelAdmin->edit($data);
        return redirect()->route('profil-admin')->with('berhasil', 'Profil berhasil diedit !');
    }

    public function ubahPassword($id_admin)
    {
        Request()->validate([
            'passwordLama'  => 'required|min:6',
            'passwordBaru'  => 'required|min:6',
        ], [
            'passwordLama.required' => 'Password Lama harus diisi!',
            'passwordLama.max'      => 'Password Lama minimal 6 karakter!',
            'passwordBaru.required' => 'Password Baru harus diisi!',
            'passwordBaru.max'      => 'Password Baru minimal 6 karakter!',
        ]);

        $admin = $this->ModelAdmin->detail($id_admin);

        if (Hash::check(Request()->passwordLama, $admin->password)) {
            $data = [
                'id_admin'          => $id_admin,
                'password'          => Hash::make(Request()->passwordBaru)
            ];

            $this->ModelAdmin->edit($data);
            return redirect()->route('profil-admin')->with('berhasil', 'Profil berhasil diedit !');
        } else {
            return back()->with('gagal', 'Password Lama tidak sesuai.');
        }
    }
}
