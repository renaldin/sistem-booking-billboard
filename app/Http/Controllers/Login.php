<?php

namespace App\Http\Controllers;

use App\Mail\kirimEmail;
use Illuminate\Support\Facades\Hash;
use App\Models\ModelAuth;
use App\Models\ModelUser;
use App\Models\ModelAdmin;
use App\Models\ModelBiodataWeb;
use Illuminate\Support\Facades\Mail;

class Login extends Controller
{

    private $ModelAuth;
    private $ModelBiodataWeb;
    private $ModelUser;
    private $ModelAdmin;

    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
        $this->ModelBiodataWeb = new ModelBiodataWeb();
        $this->ModelUser = new ModelUser();
        $this->ModelAdmin = new ModelAdmin();
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
            'title' => 'Login',
            'biodata'  => $this->ModelBiodataWeb->detail(1),
        ];

        return view('auth.login', $data);
    }

    public function admin()
    {
        if (Session()->get('email')) {
            if (Session()->get('status') === 'User') {
                return redirect()->route('home');
            } else {
                return redirect()->route('dashboard');
            }
        }

        $data = [
            'title' => 'Login Admin',
            'biodata'  => $this->ModelBiodataWeb->detail(1),
        ];

        return view('auth.loginAdmin', $data);
    }

    public function prosesLogin()
    {
        Request()->validate([
            'email'             => 'required|email',
            'password'          => 'min:6|required',
        ], [
            'email.required'            => 'Email harus diisi!',
            'email.email'               => 'Email harus sesuai format! Contoh: contoh@gmail.com',
            'password.required'         => 'Password harus diisi!',
            'password.min'              => 'Password minimal 6 karakter!',
        ]);

        if (Request()->status === "User") {
            $cekEmail = $this->ModelAuth->cekEmailUser(Request()->email);

            if ($cekEmail) {
                if (Hash::check(Request()->password, $cekEmail->password)) {
                    Session()->put('id_member', $cekEmail->id_member);
                    Session()->put('nama', $cekEmail->nama);
                    Session()->put('email', $cekEmail->email);
                    Session()->put('nama_perusahaan', $cekEmail->nama_perusahaan);
                    Session()->put('alamat_perusahaan', $cekEmail->alamat_perusahaan);
                    Session()->put('foto_perusahaan', $cekEmail->foto_perusahaan);
                    Session()->put('status', $cekEmail->status);
                    Session()->put('foto_user', $cekEmail->foto_user);
                    Session()->put('log', true);

                    return redirect()->route('home');
                } else {
                    return back()->with('gagal', 'Login gagal! Password tidak sesuai.');
                }
            } else {
                return back()->with('gagal', 'Login gagal! Email belum terdaftar.');
            }
        } else if (Request()->status === "Admin") {
            $cekEmail = $this->ModelAuth->cekEmailAdmin(Request()->email);

            if ($cekEmail) {
                if (Hash::check(Request()->password, $cekEmail->password)) {
                    Session()->put('id_admin', $cekEmail->id_admin);
                    Session()->put('nama', $cekEmail->nama);
                    Session()->put('email', $cekEmail->email);
                    Session()->put('status', $cekEmail->status);
                    Session()->put('foto', $cekEmail->foto);
                    Session()->put('log', true);

                    return redirect()->route('dashboard');
                } else {
                    return back()->with('gagal', 'Login gagal! Password tidak sesuai.');
                }
            } else {
                return back()->with('gagal', 'Login gagal! Email belum terdaftar.');
            }
        }
    }

    public function logout()
    {
        if (Session()->get('status') === "User") {
            Session()->forget('id_member');
            Session()->forget('nama');
            Session()->forget('nama_perusahaan');
            Session()->forget('alamat_perusahaan');
            Session()->forget('foto_perusahaan');
            Session()->forget('email');
            Session()->forget('status');
            Session()->forget('foto_user');
            Session()->forget('log');
            return redirect()->route('login')->with('berhasil', 'Logout berhasil!');
        } else if (Session()->get('status') === 'Admin') {
            Session()->forget('id_admin');
            Session()->forget('nama');
            Session()->forget('email');
            Session()->forget('status');
            Session()->forget('foto');
            Session()->forget('log');
            return redirect()->route('admin')->with('berhasil', 'Logout berhasil!');
        }
    }

    public function lupaPassword()
    {
        if (Session()->get('email')) {
            if (Session()->get('status') === 'User') {
                return redirect()->route('home');
            } else {
                return redirect()->route('dashboard');
            }
        }

        $data = [
            'title' => 'Lupa Password',
            'biodata'  => $this->ModelBiodataWeb->detail(1),
        ];

        return view('auth.lupaPassword', $data);
    }

    public function lupaPasswordAdmin()
    {
        if (Session()->get('email')) {
            if (Session()->get('status') === 'User') {
                return redirect()->route('home');
            } else {
                return redirect()->route('dashboard');
            }
        }

        $data = [
            'title' => 'Lupa Password',
            'biodata'  => $this->ModelBiodataWeb->detail(1),
        ];

        return view('auth.lupaPasswordAdmin', $data);
    }

    public function resetPassword($id_member)
    {
        if (Session()->get('email')) {
            if (Session()->get('status') === 'User') {
                return redirect()->route('home');
            } else {
                return redirect()->route('dashboard');
            }
        }

        $data = [
            'title'     => 'Reset Password',
            'dataUser'  => $this->ModelUser->detail($id_member),
            'biodata'   => $this->ModelBiodataWeb->detail(1),
        ];

        return view('auth.resetPassword', $data);
    }

    public function resetPasswordAdmin($id_admin)
    {
        if (Session()->get('email')) {
            if (Session()->get('status') === 'User') {
                return redirect()->route('home');
            } else {
                return redirect()->route('dashboard');
            }
        }

        $data = [
            'title'     => 'Reset Password',
            'dataUser'  => $this->ModelAdmin->detail($id_admin),
            'biodata'   => $this->ModelBiodataWeb->detail(1),
        ];

        return view('auth.resetPasswordAdmin', $data);
    }

    public function prosesEmailLupaPassword()
    {
        $email = Request()->email;
        $status = Request()->status;

        if ($status === 'User') {
            $data = $this->ModelUser->detailByEmail($email);

            if ($data) {

                $data_email = [
                    'subject'       => 'Lupa Password',
                    'sender_name'   => 'renaldinoviandi1@gmail.com',
                    'urlUtama'      => 'http://127.0.0.1:8000',
                    'urlReset'      => 'http://127.0.0.1:8000/reset-password/' . $data->id_member,
                    'dataUser'      => $data,
                    'biodata'       => $this->ModelBiodataWeb->detail(1),
                ];

                Mail::to($data->email)->send(new kirimEmail($data_email));
                return redirect()->route('login')->with('berhasil', 'Kami sudah kirim pesan ke email Anda. Silahkan cek email Anda!');
            } else {
                return back()->with('gagal', 'Email belum terdaftar. Silahkan daftar terlebih dahulu!');
            }
        } elseif ($status === 'Admin') {
            $data = $this->ModelAdmin->detailByEmail($email);

            if ($data) {

                $data_email = [
                    'subject'       => 'Lupa Password',
                    'sender_name'   => 'renaldinoviandi1@gmail.com',
                    'urlUtama'      => 'http://127.0.0.1:8000',
                    'urlReset'      => 'http://127.0.0.1:8000/reset-password-admin/' . $data->id_admin,
                    'dataUser'      => $data,
                    'biodata'       => $this->ModelBiodataWeb->detail(1),
                ];

                Mail::to($data->email)->send(new kirimEmail($data_email));
                return redirect()->route('admin')->with('berhasil', 'Kami sudah kirim pesan ke email Anda. Silahkan cek email Anda!');
            } else {
                return back()->with('gagal', 'Email belum terdaftar. Silahkan daftar terlebih dahulu!');
            }
        }
    }

    public function prosesUbahPassword()
    {
        Request()->validate([
            'password' => 'min:6|required|confirmed',
        ], [
            'password.required'    => 'Password baru harus diisi!',
            'password.min'         => 'Password baru minimal 6 karakter!',
            'password.confirmed'   => 'Password baru tidak sama!',
        ]);

        $data = [
            'id_member'         => Request()->id_member,
            'password'          => Hash::make(Request()->password)
        ];

        $this->ModelUser->edit($data);
        return redirect()->route('login')->with('berhasil', 'Anda baru saja merubah password. Silahkan login!');
    }

    public function prosesUbahPasswordAdmin()
    {
        Request()->validate([
            'password' => 'min:6|required|confirmed',
        ], [
            'password.required'    => 'Password baru harus diisi!',
            'password.min'         => 'Password baru minimal 6 karakter!',
            'password.confirmed'   => 'Password baru tidak sama!',
        ]);

        $data = [
            'id_admin'         => Request()->id_admin,
            'password'          => Hash::make(Request()->password)
        ];

        $this->ModelAdmin->edit($data);
        return redirect()->route('admin')->with('berhasil', 'Anda baru saja merubah password. Silahkan login!');
    }
}
