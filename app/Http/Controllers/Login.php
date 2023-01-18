<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ModelAuth;
use Illuminate\Contracts\Session\Session;

class Login extends Controller
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
            'title' => 'Login'
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
            'title' => 'Login Admin'
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
                    Session()->put('status', $cekEmail->status);
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
            Session()->forget('email');
            Session()->forget('status');
            Session()->forget('log');
            return redirect()->route('login')->with('berhasil', 'Logout berhasil!');
        } else if (Session()->get('status') === 'Admin') {
            Session()->forget('id_admin');
            Session()->forget('nama');
            Session()->forget('email');
            Session()->forget('status');
            Session()->forget('log');
            return redirect()->route('admin')->with('berhasil', 'Logout berhasil!');
        }
    }
}
