<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\ModelAdmin;
use App\Models\ModelBiodataWeb;

class KelolaAdmin extends Controller
{

    private $ModelAdmin;
    private $ModelBiodataWeb;

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelBiodataWeb = new ModelBiodataWeb();
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $data = [
            'title'     => 'Data Admin',
            'subTitle'  => 'Kelola Admin',
            'biodata'   => $this->ModelBiodataWeb->detail(1),
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
            'biodata'   => $this->ModelBiodataWeb->detail(1),
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
            'foto'              => 'required|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama.required'             => 'Nama lengkap harus diisi!',
            'nomor_telepon.required'    => 'Nomor telepon harus diisi!',
            'nomor_telepon.numeric'     => 'Nomor telepon harus angka!',
            'email.required'            => 'Email harus diisi!',
            'email.unique'              => 'Email sudah digunakan!',
            'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
            'password.required'         => 'Password harus diisi!',
            'password.min'              => 'Password minimal 6 karakter!',
            'foto.required'             => 'Foto harus diisi!',
            'foto.mimes'                => 'Format Foto harus jpg/jpeg/png/bmp!',
            'foto.max'                  => 'Ukuran Foto maksimal 2 mb',
        ]);

        $file = Request()->foto;
        $fileName = date('mdYHis') . Request()->nama . '.' . $file->extension();
        $file->move(public_path('foto_admin'), $fileName);

        $data = [
            'nama'              => Request()->nama,
            'nomor_telepon'     => Request()->nomor_telepon,
            'email'             => Request()->email,
            'password'          => Hash::make(Request()->password),
            'foto'              => $fileName,
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
            'biodata'   => $this->ModelBiodataWeb->detail(1),
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
            'foto'              => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama.required'             => 'Nama lengkap harus diisi!',
            'nomor_telepon.required'    => 'Nomor telepon harus diisi!',
            'nomor_telepon.numeric'     => 'Nomor telepon harus angka!',
            'email.required'            => 'Email harus diisi!',
            'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
            'foto.mimes'                => 'Format Foto harus jpg/jpeg/png/bmp!',
            'foto.max'                  => 'Ukuran Foto maksimal 5 mb',
        ]);

        if (Request()->foto <> "") {
            $admin = $this->ModelAdmin->detail($id_admin);
            if ($admin->foto <> "") {
                unlink(public_path('foto_admin') . '/' . $admin->foto);
            }

            $file = Request()->foto;
            $fileName = date('mdYHis') . Request()->nama . '.' . $file->extension();
            $file->move(public_path('foto_admin'), $fileName);

            if (Request()->password) {
                $data = [
                    'id_admin'          => $id_admin,
                    'nama'              => Request()->nama,
                    'nomor_telepon'     => Request()->nomor_telepon,
                    'email'             => Request()->email,
                    'password'          => Hash::make(Request()->password),
                    'foto'              => $fileName
                ];
            } else {
                $data = [
                    'id_admin'          => $id_admin,
                    'nama'              => Request()->nama,
                    'nomor_telepon'     => Request()->nomor_telepon,
                    'email'             => Request()->email,
                    'foto'              => $fileName
                ];
            }
        } else {
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
        }

        $this->ModelAdmin->edit($data);
        return redirect()->route('kelola-admin')->with('berhasil', 'Data admin berhasil diedit !');
    }

    public function prosesHapus($id_admin)
    {
        $admin = $this->ModelAdmin->detail($id_admin);
        if ($admin->foto <> "") {
            unlink(public_path('foto_admin') . '/' . $admin->foto);
        }

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
            'biodata'   => $this->ModelBiodataWeb->detail(1),
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
            'foto'              => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama.required'             => 'Nama lengkap harus diisi!',
            'nomor_telepon.required'    => 'Nomor telepon harus diisi!',
            'nomor_telepon.numeric'     => 'Nomor telepon harus angka!',
            'email.required'            => 'Email harus diisi!',
            'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
            'foto.mimes'                => 'Format Foto harus jpg/jpeg/png/bmp!',
            'foto.max'                  => 'Ukuran Foto maksimal 2 mb',
        ]);

        if (Request()->foto <> "") {
            $admin = $this->ModelAdmin->detail($id_admin);
            if ($admin->foto <> "") {
                unlink(public_path('foto_admin') . '/' . $admin->foto);
            }

            $file = Request()->foto;
            $fileName = date('mdYHis') . Request()->nama . '.' . $file->extension();
            $file->move(public_path('foto_admin'), $fileName);


            $data = [
                'id_admin'          => $id_admin,
                'nama'              => Request()->nama,
                'nomor_telepon'     => Request()->nomor_telepon,
                'email'             => Request()->email,
                'foto'              => $fileName
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
        return redirect()->route('profil-admin')->with('berhasil', 'Profil berhasil diedit !');
    }

    public function ubahPassword($id_admin)
    {
        Request()->validate([
            'passwordLama'  => 'required|min:6',
            'passwordBaru'  => 'required|min:6',
        ], [
            'passwordLama.required' => 'Password Lama harus diisi!',
            'passwordLama.min'      => 'Password Lama minimal 6 karakter!',
            'passwordBaru.required' => 'Password Baru harus diisi!',
            'passwordBaru.min'      => 'Password Baru minimal 6 karakter!',
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
